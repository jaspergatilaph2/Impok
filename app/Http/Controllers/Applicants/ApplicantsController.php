<?php

namespace App\Http\Controllers\Applicants;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Logs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Models\ProfileInformation;
use App\Models\Wallet;
use App\Models\Messages;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class ApplicantsController extends Controller
{
    public function index()
    {
        $accounts = auth()->user();
        $walletBalance = Wallet::where('user_id', $accounts->id)
            ->get()
            ->sum(function ($tx) {
                return match ($tx->type) {
                    'cash_in' => $tx->amount,
                    'cash_out' => -$tx->amount,
                    default => 0,
                };
            });

        $totalAmount = Loan::where('user_id', $accounts->id)
            ->sum('amount');

        $wallet = Wallet::where('user_id', $accounts->id)
            ->whereNotNull('transaction_date')
            ->where('type', '!=', 'interest')
            ->count();

        $nextDate = DB::table('open_transaction_dates')
            ->where('date', '>=', Carbon::today())
            ->orderBy('date', 'asc')
            ->first();

        $messages = Messages::where(function ($query) use ($accounts) {
            $query->where('receiver_id', $accounts->id)
                ->orWhereNull('receiver_id');
        })
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // $messages = Messages::withTrashed()->latest()->get();

        // dd($messages);

        $unreadCount = Messages::where(function ($query) use ($accounts) {
            $query->where('receiver_id', $accounts->id) //FIXED
                ->orWhereNull('receiver_id');
        })
            ->where('is_read', false)
            ->count();

        return view('Applicants.Dashboard.index', [
            'accounts' => $accounts,
            'walletBalance' => $walletBalance,
            'wallet' => $wallet,
            'ActiveTabMenu' => 'dashboard',
            'SubActiveTab' => 'dashboard',
            'nextdate' => $nextDate ? Carbon::parse($nextDate->date)->format('F d, Y') : null,
            'totalAmount' => $totalAmount,
            'messages' => $messages,
            'unreadCount' => $unreadCount
        ]);
    }

    // view the accounts
    public function viewAccounts()
    {
        $accounts = User::with('profile_information')->find(auth()->id());

        $unreadCount = Messages::where(function ($query) use ($accounts) {
            $query->where('receiver_id', $accounts->id) // ✅ FIXED
                ->orWhereNull('receiver_id');
        })
            ->where('is_read', false)
            ->count();

        $messages = Messages::where(function ($query) use ($accounts) {
            $query->where('receiver_id', $accounts->id)
                ->orWhereNull('receiver_id');
        })
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view(
            'Applicants.Accounts.view',
            compact('accounts', 'unreadCount', 'messages'),
            [
                'ActiveTabMenu' => 'account',
                'SubActiveTab' => 'view'
            ]
        );
    }

    // view the update accounts
    public function updateAccounts()
    {
        $accounts = auth()->user();

        $unreadCount = Messages::where(function ($query) use ($accounts) {
            $query->where('receiver_id', $accounts->id) //FIXED
                ->orWhereNull('receiver_id');
        })
            ->where('is_read', false)
            ->count();

        $profile = $accounts->profileInformation;

        $messages = Messages::where(function ($query) use ($accounts) {
            $query->where('receiver_id', $accounts->id)
                ->orWhereNull('receiver_id');
        })
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();


        return view(
            'Applicants.Accounts.update',
            compact('accounts', 'unreadCount', 'messages', 'profile'),
            [
                'ActiveTabMenu' => 'account',
                'SubActiveTab' => 'update'
            ]
        );
    }

    // Laravel's built-in logging facade
    public function updatedAccounts(Request $request)
    {
        $account = auth()->user();

        // VALIDATION (PREVENT DUPLICATES)
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'name')->ignore($account->id),
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($account->id),
            ],

            'phone' => [
                'nullable',
                Rule::unique('profile_information', 'phone')->ignore($account->id, 'user_id'),
            ],
        ], [
            'name.unique' => 'This username is already taken.',
            'email.unique' => 'This email is already registered.',
            'phone.unique' => 'This phone number is already used.',
        ]);

        // OPTIONAL: FULL NAME (FIRST + LAST) DUPLICATE CHECK
        $exists = DB::table('profile_information')
            ->where('first_name', $request->first_name)
            ->where('last_name', $request->last_name)
            ->where('user_id', '!=', $account->id)
            ->exists();

        if ($exists) {
            Log::warning('Profile update blocked: duplicate full name.', [
                'user_id' => $account->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
            ]);

            return back()->withErrors([
                'first_name' => 'This first name is already taken by another user.'
            ])->withInput();
        }

        DB::transaction(function () use ($request, $account) {

            // UPDATE AVATAR
            if ($request->hasFile('avatar')) {

                if ($account->avatar && Storage::disk('public')->exists($account->avatar)) {
                    Storage::disk('public')->delete($account->avatar);
                }

                $path = $request->file('avatar')->store('avatars', 'public');
                $account->avatar = $path;

                // ACTIVITY LOG: AVATAR UPDATED
                $account->logs()->create([
                    'description' => 'Updated profile avatar.',
                ]);
            }

            // TRACK CHANGES BEFORE OVERWRITING (for a more detailed log entry)
            $nameChanged = $account->name !== $request->name;
            $emailChanged = $account->email !== $request->email;

            // UPDATE USER
            $account->name = $request->name;
            $account->email = $request->email;
            $account->save();

            // ACTIVITY LOG: ACCOUNT DETAILS UPDATED
            if ($nameChanged || $emailChanged) {
                Logs::create([
                    'user_id' => $account->id,
                    'description' => 'Updated account details (' .
                        collect([
                            $nameChanged ? 'name' : null,
                            $emailChanged ? 'email' : null,
                        ])->filter()->implode(', ') . ').',
                ]);
            }

            // UPDATE PROFILE
            $account->profile_information()->updateOrCreate(
                ['user_id' => $account->id],
                [
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'phone'      => $request->phone,
                    'birthdate'  => $request->birthdate,
                    'address'    => $request->address,
                ]
            );

            // ACTIVITY LOG: PROFILE INFORMATION UPDATED
            $account->logs()->create([
                'description' => 'Updated profile information.',
            ]);
        });

        // APPLICATION LOG (for debugging / audit trail)
        // Logs::info('User account updated.', [
        //     'user_id' => $account->id,
        //     'email' => $account->email,
        // ]);

        return redirect()->back()
            ->with('success', 'Account updated successfully.');
    }

    public function viewWallet()
    {
        $user = auth()->user();

        // get all transactions of the user
        $transactions = Wallet::where('user_id', $user->id)
            ->orderBy('transaction_date', 'desc')
            ->get();

        // compute balance (WITHOUT INTEREST)
        $balance = 0;

        foreach ($transactions as $tx) {
            if ($tx->type === 'cash_in') {
                $balance += $tx->amount;
            } elseif ($tx->type === 'cash_out') {
                $balance -= $tx->amount;
            }
            //    interest is ignored
        }

        $unreadCount = Messages::where(function ($query) use ($user) {
            $query->where('receiver_id', $user->id) // FIXED
                ->orWhereNull('receiver_id');
        })
            ->where('is_read', false)
            ->count();

        $messages = Messages::where(function ($query) use ($user) {
            $query->where('receiver_id', $user->id)
                ->orWhereNull('receiver_id');
        })
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view(
            'Applicants.Wallet.balance-money',
            compact('transactions', 'balance', 'messages', 'unreadCount'),
            [
                'ActiveTabMenu' => 'wallet',
                'SubActiveTab' => 'view'
            ]
        );
    }

    public function viewTransactions()
    {
        $user = auth()->user();

        // get all transactions of the user
        $transactions = Wallet::where('user_id', $user->id)
            ->orderBy('transaction_date', 'desc')
            ->get();
        $balance = 0;

        $unreadCount = Messages::where(function ($query) use ($user) {
            $query->where('receiver_id', $user->id) //FIXED
                ->orWhereNull('receiver_id');
        })
            ->where('is_read', false)
            ->count();

        $messages = Messages::where(function ($query) use ($user) {
            $query->where('receiver_id', $user->id)
                ->orWhereNull('receiver_id');
        })
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();


        foreach ($transactions as $tx) {
            if ($tx->type === 'cash_in' || $tx->type === 'interest') {
                $balance += $tx->amount;
            } elseif ($tx->type === 'cash_out') {
                $balance -= $tx->amount;
            }
        }

        return view(
            'Applicants.Transaction.history',
            compact(
                'transactions',
                'balance',
                'unreadCount',
                'messages'
            ),
            [
                'ActiveTabMenu' => 'transactions',
                'SubActiveTab' => 'view'
            ]
        );
    }

    public function viewInterest()
    {
        $userId = auth()->id();

        $interestTransactions = DB::table('wallet')
            ->where('user_id', $userId)
            ->where('type', 'interest')
            ->orderBy('transaction_date', 'desc')
            ->get();

        $hasCashIn = DB::table('wallet')
            ->where('user_id', $userId)
            ->where('type', 'cash_in')
            ->exists();

        $balance = $interestTransactions->sum('amount');


        $unreadCount = Messages::where(function ($query) use ($userId) {
            $query->where('receiver_id', $userId)
                ->orWhereNull('receiver_id');
        })
            ->where('is_read', false)
            ->count();

        $messages = Messages::where(function ($query) use ($userId) {
            $query->where('receiver_id', $userId)
                ->orWhereNull('receiver_id');
        })
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('Applicants.wallet.interest', [
            'transactions' => $interestTransactions,
            'balance' => $balance,
            'hasCashIn' => $hasCashIn, // IMPORTANT
            'ActiveTabMenu' => 'wallet',
            'SubActiveTab' => 'interest',
            'messages' => $messages,
            'unreadCount' => $unreadCount
        ]);
    }

    public function userLoans()
    {
        $user = auth()->user();
        $loanTransaction = Loan::where('user_id', $user->id)
            ->orderBy('transaction_date', 'desc')
            ->get();

        $unreadCount = Messages::where(function ($query) use ($user) {
            $query->where('receiver_id', $user->id) //FIXED
                ->orWhereNull('receiver_id');
        })
            ->where('is_read', false)
            ->count();

        $messages = Messages::where(function ($query) use ($user) {
            $query->where('receiver_id', $user->id)
                ->orWhereNull('receiver_id');
        })
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view(
            'Applicants.wallet.loans',
            compact('user', 'loanTransaction', 'messages', 'unreadCount'),
            [
                'ActiveTabMenu' => 'view',
                'SubActiveTab' => 'loans'
            ]
        );
    }

    public function ViewNotif()
    {
        $user = auth()->user();

        Messages::where('receiver_id', auth()->id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $messages = Messages::where('receiver_id', auth()->id())
            ->latest()
            ->get();

        return view(
            'Applicants.Notifications.messages',
            compact('user', 'messages'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'messages'
            ]
        );
    }

    public function UnderMaintenance()
    {
        $accounts = auth()->user();

        return view(
            'Applicants.under-maintenance.under-maintenance',
            compact('accounts')
        );
    }

    public function viewSettings()
    {
        $accounts = auth()->user();

        return view(
            'Applicants.Settings.settings',
            compact('accounts'),
            [
                'ActiveTabMenu' => 'settings',
                'SubActiveTab' => 'view'
            ]
        );
    }

    public function viewLogs()
    {
        $account = auth()->user();

        $logs = $account->logs()
            ->latest()
            ->paginate(10);

        return view('Applicants.Logs.logs', [
            'accounts' => $account,
            'logs' => $logs,
            'ActiveTabMenu' => 'logs',
            'SubActiveTab' => 'view',
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Please enter your current password',
            'password.required' => 'Please enter new password',
            'password.min' => 'The new password must at least 8 characters',
            'password.confirmed' => 'The new password confirmation does not match',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()
                ->withErrors([
                    'current_password' => 'Current password is incorrect.'
                ])
                ->withInput();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        Logs::create([
            'user_id' => $user->id,
            'description' => 'User updated their password.',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Password updated successfully.');
    }
}
