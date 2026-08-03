<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Wallet;
use App\Models\Loan;
use Carbon\Carbon;
use App\Models\Messages;

class AdminController extends Controller
{
    public function adminDashboardIndex()
    {
        $accounts = auth()->user();

        $userCounts = User::where('role', 'user')->count();

        $totalBalance = Wallet::select(
            DB::raw("
            SUM(
                CASE 
                    WHEN type = 'cash_in' THEN amount
                    WHEN type = 'cash_out' THEN -amount
                    ELSE 0
                END
            ) as total
        ")
        )->value('total');

        $adminwalletTransactions = Wallet::whereNotNull('transaction_date')->count();

        // FIXED: Get ALL approved loans (not just admin)
        $TotalLoans = Loan::where('status', 'approved')
            ->count();

        $nextDate = DB::table('open_transaction_dates')
            ->where('date', '>=', Carbon::today())
            ->orderBy('date', 'asc')
            ->first();

        $loanSum = Loan::whereHas('user', function ($query) {
            $query->where('role', 'user');
        })->sum('amount');

        return view(
            'Admin.Dashboard.index',
            compact(
                'accounts',
                'userCounts',
                'totalBalance',
                'adminwalletTransactions',
                'TotalLoans',
                'nextDate',
                'loanSum'
            )
        );
    }

    public function viewUsers()
    {
        $accounts = auth()->user();
        $users = User::where('role', 'user')->get();
        return view(
            'Admin.user-management.list',
            compact('accounts', 'users'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'users'
            ]
        );
    }

    public function viewCashIn()
    {
        $accounts = auth()->user();
        $users = User::with('profile_information')
            ->where('role', 'user')
            ->orderBy('name', 'ASC')
            ->take(10)
            ->get();
        return view(
            'Admin.wallet.cash-in',
            compact('accounts', 'users'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'wallet'
            ]
        );
    }

    public function cashIn(Request $request)
    {
        try {

            $date = Carbon::parse($request->transaction_date);

            if ($date->dayOfWeek !== 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Only Sunday transactions are allowed.'
                ]);
            }

            if ($request->amount < 100) {
                return response()->json([
                    'success' => false,
                    'message' => 'Minimum amount is ₱100.'
                ]);
            }

            $hasPreviousCashIn = Wallet::where('user_id', $request->user_id)
                ->where('type', 'cash_in')
                ->exists();

            $interestRate = 0.02;

            $interest = 0;

            if ($hasPreviousCashIn) {
                $interest = $request->amount * $interestRate;
            }

            Wallet::create([
                'user_id' => $request->user_id,
                'type' => 'cash_in',
                'amount' => $request->amount,
                'transaction_date' => $request->transaction_date,
                'note' => $request->note
            ]);

            if ($interest > 0) {
                Wallet::create([
                    'user_id' => $request->user_id,
                    'type' => 'interest',
                    'amount' => $interest,
                    'transaction_date' => $request->transaction_date,
                    'note' => 'Interest earned (2%)'
                ]);
            }


            $balance = Wallet::where('user_id', $request->user_id)->sum('amount');

            return response()->json([
                'success' => true,
                'message' => $hasPreviousCashIn
                    ? 'Cash in successful with interest!'
                    : 'Cash in successful (no interest for first deposit).',
                'interest_earned' => number_format($interest, 2),
                'new_balance' => number_format($balance, 2)
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error saving wallet data: ' . $e->getMessage()
            ]);
        }
    }

    public function viewAmount()
    {
        $accounts = auth()->user();
        $users = User::with('profile_information')
            ->where('role', 'user')
            ->orderBy('name', 'ASC')
            ->take(10)
            ->get();
        foreach ($users as $user) {
            $user->wallet_balance = Wallet::where('user_id', $user->id)->sum('amount');
        }
        return view(
            'Admin.wallet.user-cash-in',
            compact('accounts', 'users'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'wallet'
            ]
        );
    }

    public function viewAllBalance()
    {
        $accounts = auth()->user();

        $users = User::with('wallet')
            ->where('role', 'user')
            ->orderBy('name', 'ASC')
            ->paginate(10);

        // COMPUTE BALANCE PER USER (EXCLUDE INTEREST)
        $users->getCollection()->transform(function ($user) {
            $user->balance = $user->wallet->reduce(function ($carry, $item) {
                return ($item->type === 'cash_in')
                    ? $carry + $item->amount
                    : ($item->type === 'cash_out' ? $carry - $item->amount : $carry);
            }, 0);

            return $user;
        });

        return view(
            'Admin.transactions.all-balance',
            compact('accounts', 'users'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'transactions'
            ]
        );
    }

    public function viewAccounts()
    {
        $accounts = auth()->user();
        $users = User::where('role', 'admin')->get();
        return view(
            'Admin.accounts.view-accounts',
            compact('accounts', 'users'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'accounts'
            ]
        );
    }

    public function viewCalendar()
    {
        $accounts = auth()->user();

        $users = User::with('wallet', 'profile_information')
            ->where('role', 'user')
            ->orderBy('name', 'ASC')
            ->paginate(10);

        return view(
            'Admin.transactions.date-transactions',
            compact('accounts', 'users'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'calendar'
            ]
        );
    }

    public function storeCalendar(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        // Check if the date already exists
        $existingDate = DB::table('open_transaction_dates')->where('date', $request->date)->first();
        if ($existingDate) {
            return response()->json(['success' => false, 'message' => 'This date is already open for transactions.']);
        }

        // Store the new open transaction date
        DB::table('open_transaction_dates')->insert([
            'date' => $request->date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true, 'message' => 'Transaction date opened successfully.']);
    }

    public function calendarEvents()
    {
        $dates = DB::table('open_transaction_dates')->get();

        $events = [];

        foreach ($dates as $date) {
            $events[] = [
                'id' => $date->id, // important
                'title' => 'Open',
                'start' => $date->date,
                'end' => $date->date, // important for background events
                'display' => 'background',
                'backgroundColor' => '#198754', //Bootstrap green
                'borderColor' => '#198754',
                'allDay' => true, //REQUIRED
                'extendedProps' => [
                    'type' => 'saved' // used in JS checking
                ],
            ];
        }

        return response()->json($events);
    }

    public function adminViewInterest()
    {
        $accounts = auth()->user();

        $users = User::with('wallet')
            ->where('role', 'user')
            ->orderBy('name', 'ASC')
            ->paginate(10);

        // COMPUTE BALANCE PER USER (EXCLUDE INTEREST)
        $users->getCollection()->transform(function ($user) {
            $user->balance = $user->wallet->reduce(function ($carry, $item) {
                return ($item->type === 'interest')
                    ? $carry + $item->amount
                    : ($item->type === 'cash_out' ? $carry - $item->amount : $carry);
            }, 0);

            return $user;
        });

        return view(
            'Admin.transactions.all-interest',
            compact('accounts', 'users'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'interest'
            ]
        );
    }
    public function updateAccounts()
    {
        $accounts = auth()->user();
        return view('Admin.accounts.update', compact('accounts'), [
            'ActiveTabMenu' => 'view',
            'SubActiveTab' => 'accounts'
        ]);
    }

    public function updatedAccounts(Request $request)
    {
        $user = auth()->user();

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Update basic info
        $user->name = $request->name;
        $user->email = $request->email;

        // Handle avatar upload
        if ($request->hasFile('avatar')) {

            // delete old avatar (optional)
            if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                Storage::delete('public/' . $user->avatar);
            }

            // store new avatar
            $path = $request->file('avatar')->store('avatars', 'public');

            $user->avatar = $path;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

    public function viewLoans()
    {
        $users = User::with('profile_information')
            ->where('role', 'user') // only normal users
            ->get();

        return view('Admin.wallet.loans', compact('users'), [
            'ActiveTabMenu' => 'Loans',
            'SubActiveTab' => 'view'
        ]);
    }

    public function getLoans(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'transaction_date' => 'required|date',
        ]);

        // Create Loan
        $loan = Loan::create([
            'user_id' => $request->user_id,
            'type' => 'loan',
            'amount' => $request->amount,
            'transaction_date' => $request->transaction_date,
            'note' => $request->note,
            'status' => 'approved'
        ]);

        // Calculate total loans (NEW BALANCE)
        $newBalance = Loan::where('user_id', $request->user_id)->sum('amount');

        return response()->json([
            'success' => true,
            'message' => 'Loan added successfully!',
            'new_balance' => $newBalance
        ]);
    }

    public function NewMessages()
    {
        $users = User::with('profileInformation')
            ->where('role', 'user')
            ->get();

        return view(
            'Admin.message.new-messages',
            compact('users'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'New Message'
            ]
        );
    }

    public function usersInbox()
    {
        $user = auth()->user();

        $messages = Messages::with(['sender.profileInformation'])->get();

        return view(
            'Admin.message.inbox',
            compact('user', 'messages'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'Inbox'
            ]
        );
    }

    public function messages(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $senderId = auth()->id();

        // SEND TO ALL USERS (single row only)
        if (!$request->user_id) {

            Messages::create([
                'sender_id' => $senderId,
                'receiver_id' => null,
                'title' => $request->title,
                'message' => $request->message,
            ]);
        } else {

            // SEND TO ONE USER
            Messages::create([
                'sender_id' => $senderId,
                'receiver_id' => $request->user_id,
                'title' => $request->title,
                'message' => $request->message,
            ]);
        }

        return back()->with('success', 'Message sent successfully!');
    }

    public function Trashcan($id)
    {
        $message = Messages::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Messages is temporarily deleted');
    }

    public function TrashBin()
    {
        $messages = Messages::onlyTrashed()->with('sender.profileInformation')->get();
        return view(
            'Admin.message.trash-bin',
            compact('messages'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'Trash-bin'
            ]
        );
    }

    public function ViewAllLoans()
    {
        $accounts = auth()->user();

        $users = User::with('loans')
            ->where('role', 'user')
            ->orderBy('name', 'ASC')
            ->paginate(10);

        //COMPUTE TOTAL LOANS PER USER
        $users->getCollection()->transform(function ($user) {
            $user->total_loans = $user->loans->sum('amount');
            return $user;
        });

        return view(
            'Admin.transactions.all-loans',
            compact('accounts', 'users'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'loans'
            ]
        );
    }
}
