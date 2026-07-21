<?php

namespace App\Http\Controllers\Applicants;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Models\ProfileInformation;
use App\Models\Wallet;
use App\Models\Messages;

class ApplicantsController extends Controller
{
    public function index()
    {
        $accounts = auth()->user();
        $walletBalance = Wallet::where('user_id', $accounts->id)
            ->orderBy('transaction_date', 'desc')
            ->get()
            ->sum(function ($tx) {
                if ($tx->type === 'cash_in' || $tx->type === 'interest') {
                    return $tx->amount;
                } elseif ($tx->type === 'cash_out') {
                    return -$tx->amount;
                }
                return 0;
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
            $query->where('receiver_id', $accounts->id) // ✅ FIXED
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

        return view(
            'Applicants.Accounts.view',
            compact('accounts'),
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
        return view(
            'Applicants.Accounts.update',
            compact('accounts'),
            [
                'ActiveTabMenu' => 'account',
                'SubActiveTab' => 'update'
            ]
        );
    }

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
            return back()->withErrors([
                'first_name' => 'This first name is already taken by another user.'
            ])->withInput();
        }

        //UPDATE AVATAR
        if ($request->hasFile('avatar')) {

            if ($account->avatar && Storage::disk('public')->exists($account->avatar)) {
                Storage::disk('public')->delete($account->avatar);
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            $account->avatar = $path;
        }

        //UPDATE USER
        $account->name = $request->name;
        $account->email = $request->email;
        $account->save();

        // ✅ UPDATE PROFILE
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
            // ❌ interest is ignored
        }

        return view(
            'Applicants.Wallet.balance-money',
            compact('transactions', 'balance'),
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

        foreach ($transactions as $tx) {
            if ($tx->type === 'cash_in' || $tx->type === 'interest') {
                $balance += $tx->amount;
            } elseif ($tx->type === 'cash_out') {
                $balance -= $tx->amount;
            }
        }

        return view(
            'Applicants.Transaction.history',
            compact('transactions', 'balance'),
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

        return view('Applicants.wallet.interest', [
            'transactions' => $interestTransactions,
            'balance' => $balance,
            'hasCashIn' => $hasCashIn, // 🔥 IMPORTANT
            'ActiveTabMenu' => 'wallet',
            'SubActiveTab' => 'interest'
        ]);
    }

    public function userLoans()
    {
        $user = auth()->user();
        $loanTransaction = Loan::where('user_id', $user->id)
            ->orderBy('transaction_date', 'desc')
            ->get();
        return view(
            'Applicants.wallet.loans',
            compact('user', 'loanTransaction'),
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
}
