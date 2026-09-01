<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLogs;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Wallet;
use App\Models\Loan;
use Carbon\Carbon;
use App\Models\Messages;

class AdminController extends Controller
{
    public function adminDashboardIndex()
    {
        $accounts = auth()->user();

        // Total registered users
        $userCounts = User::where('role', 'user')->count();

        // Total wallet balance
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

        // Total wallet transactions
        $adminwalletTransactions = Wallet::whereNotNull('transaction_date')->count();

        // Total approved loans
        $TotalLoans = Loan::where('status', 'approved')->count();

        // Next transaction date
        $nextDate = DB::table('open_transaction_dates')
            ->where('date', '>=', Carbon::today())
            ->orderBy('date', 'asc')
            ->first();

        // Total loan amount
        $loanSum = Loan::whereHas('user', function ($query) {
            $query->where('role', 'user');
        })
            ->where('status', 'approved')
            ->sum('amount');

        // Total interest from approved loans
        $interestSum = Loan::whereHas('user', function ($query) {
            $query->where('role', 'user');
        })
            ->where('status', 'approved')
            ->sum('interest');

        return view(
            'Admin.Dashboard.index',
            compact(
                'accounts',
                'userCounts',
                'totalBalance',
                'adminwalletTransactions',
                'TotalLoans',
                'nextDate',
                'loanSum',
                'interestSum'
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

        $openTransactionDates = DB::table('open_transaction_dates')
            ->orderBy('date', 'asc')
            ->pluck('date')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y-m-d');
            });

        return view(
            'Admin.wallet.cash-in',
            compact('accounts', 'users', 'openTransactionDates'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'wallet'
            ]
        );
    }

    // Cash In Functionality
    // Added logs history for admin actions
    public function cashIn(Request $request)
    {
        try {

            // Validate request
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'amount' => 'required|numeric|min:100',
                'transaction_date' => 'required|date',
            ]);

            /*
        |--------------------------------------------------------------------------
        | Check if Transaction Date is Open
        |--------------------------------------------------------------------------
        */

            $isOpenDate = \DB::table('open_transaction_dates')
                ->whereDate('date', $request->transaction_date)
                ->exists();

            if (!$isOpenDate) {
                return response()->json([
                    'success' => false,
                    'message' => 'The selected transaction date is not open.'
                ]);
            }

            /*
        |--------------------------------------------------------------------------
        | Check Minimum Amount
        |--------------------------------------------------------------------------
        */

            if ($request->amount < 100) {
                return response()->json([
                    'success' => false,
                    'message' => 'Minimum amount is ₱100.'
                ]);
            }

            /*
        |--------------------------------------------------------------------------
        | Check Previous Cash In
        |--------------------------------------------------------------------------
        */

            $hasPreviousCashIn = Wallet::where('user_id', $request->user_id)
                ->where('type', 'cash_in')
                ->exists();

            /*
        |--------------------------------------------------------------------------
        | Interest
        |--------------------------------------------------------------------------
        */

            $interestRate = 0.5;

            $interest = 0;

            if ($hasPreviousCashIn) {
                $interest = $request->amount * $interestRate;
            }

            /*
        |--------------------------------------------------------------------------
        | Save Cash In
        |--------------------------------------------------------------------------
        */

            Wallet::create([
                'user_id' => $request->user_id,
                'type' => 'cash_in',
                'amount' => $request->amount,
                'transaction_date' => $request->transaction_date,
                'note' => $request->note
            ]);

            /*
        |--------------------------------------------------------------------------
        | Save Interest
        |--------------------------------------------------------------------------
        */

            if ($interest > 0) {
                Wallet::create([
                    'user_id' => $request->user_id,
                    'type' => 'interest',
                    'amount' => $interest,
                    'transaction_date' => $request->transaction_date,
                    'note' => 'Interest earned (5%)'
                ]);
            }

            /*
        |--------------------------------------------------------------------------
        | Get Balance
        |--------------------------------------------------------------------------
        */

            $balance = Wallet::where('user_id', $request->user_id)
                ->sum('amount');

            /*
        |--------------------------------------------------------------------------
        | Get User
        |--------------------------------------------------------------------------
        */

            $user = User::find($request->user_id);

            /*
        |--------------------------------------------------------------------------
        | Admin Activity Log
        |--------------------------------------------------------------------------
        */

            AdminLogs::create([
                'admin_id' => auth()->id(),

                'description' =>
                'Processed cash-in of ₱' .
                    number_format($request->amount, 2) .
                    ' for ' .
                    ($user->name ?? 'Unknown User') .
                    ($interest > 0
                        ? ' (interest earned: ₱' . number_format($interest, 2) . ')'
                        : ' (no interest, first deposit)') .
                    '.',
            ]);

            /*
        |--------------------------------------------------------------------------
        | Response
        |--------------------------------------------------------------------------
        */

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

    // Store the open transaction date in the database
    // Added logs history for admin actions
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

        // ADMIN ACTIVITY LOG: TRANSACTION DATE OPENED
        AdminLogs::create([
            'admin_id' => auth()->id(),
            'description' => 'Opened transaction date: ' . $request->date . '.',
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

    // Store the updated account information in the database
    // Added logs history for admin actions
    public function updatedAccounts(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $nameChanged = $user->name !== $request->name;
        $emailChanged = $user->email !== $request->email;

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                Storage::delete('public/' . $user->avatar);
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;

            AdminLogs::create([
                'admin_id' => $user->id,
                'description' => 'Admin updated profile avatar.',
            ]);
        }

        $user->save();

        if ($nameChanged || $emailChanged) {
            AdminLogs::create([
                'admin_id' => $user->id,
                'description' => 'Admin updated account details (' .
                    collect([
                        $nameChanged ? 'name' : null,
                        $emailChanged ? 'email' : null,
                    ])->filter()->implode(', ') . ').',
            ]);
        }

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
            'note' => 'nullable|string|max:255',
        ]);

        // Loan amount
        $loanAmount = (float) $request->amount;

        // Interest rate: 5%
        $interestRate = 0.05;

        // Calculate interest
        $interest = $loanAmount * $interestRate;

        // Calculate total amount
        $totalAmount = $loanAmount + $interest;

        // Create loan
        $loan = Loan::create([
            'user_id' => $request->user_id,
            'type' => 'loan',

            // Original amounts
            'amount' => $loanAmount,
            'interest' => $interest,
            'total_amount' => $totalAmount,

            // Payment tracking
            'paid_interest' => 0,
            'remaining_interest' => $interest,
            'paid_principal' => 0,
            'paid_amount' => 0,

            'transaction_date' => $request->transaction_date,
            'note' => $request->note,
            'status' => 'approved',
        ]);

        // Calculate total outstanding loans for this user
        $newBalance = Loan::where('user_id', $request->user_id)
            ->where('status', 'approved')
            ->sum('total_amount');

        // Get borrower
        $borrower = User::find($request->user_id);

        // Admin activity log
        AdminLogs::create([
            'admin_id' => auth()->id(),
            'description' => 'Approved loan of ₱' .
                number_format($loanAmount, 2) .
                ' with ₱' .
                number_format($interest, 2) .
                ' interest for ' .
                ($borrower->name ?? 'Unknown User') .
                '. Total amount: ₱' .
                number_format($totalAmount, 2) . '.',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Loan added successfully!',
            'loan_amount' => number_format($loanAmount, 2, '.', ''),
            'interest_rate' => '5%',
            'interest' => number_format($interest, 2, '.', ''),
            'remaining_interest' => number_format($interest, 2, '.', ''),
            'total_amount' => number_format($totalAmount, 2, '.', ''),
            'new_balance' => number_format($newBalance, 2, '.', ''),
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

    // Store the new message in the database
    // Added logs history for admin actions
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

            // ADMIN ACTIVITY LOG: BROADCAST MESSAGE SENT
            AdminLogs::create([
                'admin_id' => $senderId,
                'description' => 'Sent broadcast message to all users: "' . $request->title . '".',
            ]);
        } else {

            // SEND TO ONE USER
            Messages::create([
                'sender_id' => $senderId,
                'receiver_id' => $request->user_id,
                'title' => $request->title,
                'message' => $request->message,
            ]);

            // ADMIN ACTIVITY LOG: DIRECT MESSAGE SENT
            $receiver = \App\Models\User::find($request->user_id);

            AdminLogs::create([
                'admin_id' => $senderId,
                'description' => 'Sent message to ' . ($receiver->name ?? 'Unknown User') . ': "' . $request->title . '".',
            ]);
        }

        return back()->with('success', 'Message sent successfully!');
    }

    public function Trashcan($id)
    {
        $message = Messages::findOrFail($id);
        $message->delete();

        AdminLogs::create([
            'admin_id' => auth()->id(),
            'action' => 'Deleted Messages',
            'description' => 'Temporary deleted message ID: ' . $id . ' with title: "' . $message->title . '"',
        ]);

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


    public function viewLogs()
    {
        $account = auth()->user();

        $logs = AdminLogs::with('admin')
            ->latest()
            ->paginate(10);

        return view('Admin.logs.logs', [
            'accounts' => $account,
            'logs' => $logs,
            'ActiveTabMenu' => 'View',
            'SubActiveTab' => 'logs',
        ]);
    }

    public function viewInterest()
    {
        $accounts = auth()->user();

        $users = User::with('wallet')
            ->where('role', 'user')
            ->orderBy('name', 'ASC')
            ->paginate(10);

        // COMPUTE INTEREST PER USER
        $users->getCollection()->transform(function ($user) {
            $user->interest = $user->wallet->where('type', 'interest')->sum('amount');
            return $user;
        });

        return view(
            'Admin.wallet.interest',
            compact('accounts', 'users'),
            [
                'ActiveTabMenu' => 'View',
                'SubActiveTab' => 'interest'
            ]
        );
    }

    public function loansPayment(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'transaction_date' => 'required|date',
            'note' => 'nullable|string|max:255',
        ]);

        $paymentAmount = (float) $request->amount;

        /*
    |--------------------------------------------------------------------------
    | Get approved loans with outstanding balances
    |--------------------------------------------------------------------------
    */
        $loans = Loan::where('user_id', $request->user_id)
            ->where('status', 'approved')
            ->where(function ($query) {
                $query->whereColumn('paid_amount', '<', 'total_amount')
                    ->orWhereNull('paid_amount');
            })
            ->orderBy('transaction_date', 'asc')
            ->get();

        /*
    |--------------------------------------------------------------------------
    | Check outstanding loans
    |--------------------------------------------------------------------------
    */
        if ($loans->isEmpty()) {
            return back()->withErrors([
                'amount' => 'This user has no outstanding loans.'
            ]);
        }

        /*
    |--------------------------------------------------------------------------
    | Calculate total outstanding balance
    |--------------------------------------------------------------------------
    */
        $totalOutstanding = $loans->sum(function ($loan) {

            $totalAmount = (float) ($loan->total_amount ?? 0);
            $paidAmount = (float) ($loan->paid_amount ?? 0);

            return max(0, $totalAmount - $paidAmount);
        });

        /*
    |--------------------------------------------------------------------------
    | Prevent overpayment
    |--------------------------------------------------------------------------
    */
        if ($paymentAmount > $totalOutstanding) {
            return back()->withErrors([
                'amount' => 'Payment cannot exceed the outstanding loan balance of ₱' .
                    number_format($totalOutstanding, 2) . '.'
            ]);
        }

        $remainingPayment = $paymentAmount;

        /*
    |--------------------------------------------------------------------------
    | Apply payment to loans
    |--------------------------------------------------------------------------
    */
        foreach ($loans as $loan) {

            if ($remainingPayment <= 0) {
                break;
            }

            /*
        |--------------------------------------------------------------------------
        | Convert NULL values to 0
        |--------------------------------------------------------------------------
        */
            $loanAmount = (float) ($loan->amount ?? 0);
            $interest = (float) ($loan->interest ?? 0);

            $paidInterest = (float) ($loan->paid_interest ?? 0);
            $paidPrincipal = (float) ($loan->paid_principal ?? 0);

            /*
        |--------------------------------------------------------------------------
        | Calculate remaining interest
        |--------------------------------------------------------------------------
        */
            $remainingInterest = max(
                0,
                $interest - $paidInterest
            );

            /*
        |--------------------------------------------------------------------------
        | 1. PAY INTEREST FIRST
        |--------------------------------------------------------------------------
        */
            if ($remainingInterest > 0 && $remainingPayment > 0) {

                $interestPayment = min(
                    $remainingPayment,
                    $remainingInterest
                );

                $paidInterest += $interestPayment;

                $remainingPayment -= $interestPayment;
            }

            /*
        |--------------------------------------------------------------------------
        | 2. PAY PRINCIPAL AFTER INTEREST
        |--------------------------------------------------------------------------
        */
            if ($remainingPayment > 0) {

                $remainingPrincipal = max(
                    0,
                    $loanAmount - $paidPrincipal
                );

                if ($remainingPrincipal > 0) {

                    $principalPayment = min(
                        $remainingPayment,
                        $remainingPrincipal
                    );

                    $paidPrincipal += $principalPayment;

                    $remainingPayment -= $principalPayment;
                }
            }

            /*
        |--------------------------------------------------------------------------
        | 3. Update loan values
        |--------------------------------------------------------------------------
        */
            $loan->paid_interest = $paidInterest;
            $loan->paid_principal = $paidPrincipal;

            $loan->remaining_interest = max(
                0,
                $interest - $paidInterest
            );

            /*
        |--------------------------------------------------------------------------
        | 4. Calculate total paid
        |--------------------------------------------------------------------------
        */
            $loan->paid_amount =
                $paidInterest +
                $paidPrincipal;

            /*
        |--------------------------------------------------------------------------
        | 5. Check if loan is fully paid
        |--------------------------------------------------------------------------
        */
            if (
                $paidInterest >= $interest &&
                $paidPrincipal >= $loanAmount
            ) {

                $loan->paid_interest = $interest;
                $loan->remaining_interest = 0;
                $loan->paid_principal = $loanAmount;

                $loan->paid_amount =
                    $loan->total_amount;

                $loan->status = 'paid';
            }

            $loan->save();
        }

        /*
    |--------------------------------------------------------------------------
    | Get borrower
    |--------------------------------------------------------------------------
    */
        $borrower = User::find($request->user_id);

        /*
    |--------------------------------------------------------------------------
    | Admin activity log
    |--------------------------------------------------------------------------
    */
        AdminLogs::create([
            'admin_id' => auth()->id(),

            'description' =>
            'Received loan payment of ₱' .
                number_format($paymentAmount, 2) .
                ' from ' .
                ($borrower->name ?? 'Unknown User') .
                '.',
        ]);

        /*
    |--------------------------------------------------------------------------
    | Success response
    |--------------------------------------------------------------------------
    */
        return back()->with(
            'success',
            'Loan payment of ₱' .
                number_format($paymentAmount, 2) .
                ' received successfully.'
        );
    }

    public function viewSettings()
    {
        $accounts = auth()->user();
        return view('Admin.settings.settings', compact('accounts'), [
            'ActiveTabMenu' => 'View',
            'SubActiveTab' => 'settings'
        ]);
    }

    // Updating the pass of the admin
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        // Log the password change
        AdminLogs::create([
            'admin_id' => $user->id,
            'description' => 'Admin updated their account password.',
        ]);

        return back()->with('success', 'Password updated successfully!');
    }

    public function ViewAllLoanInterest()
    {
        $accounts =  User::with([
            'profile_information',
            'loans'
        ])->where('role', 'user')->paginate(10);

        foreach ($accounts as $account) {

            $loans = $account->loans
                ->where('status', 'approved');

            $account->total_amount = $loans->sum('total_amount');

            $account->interest = $loans->sum('interest');

            $account->paid_amount = $loans->sum('paid_amount');

            $paidInterest = 0;
            $paidPrincipal = 0;

            foreach ($loans as $loan) {

                $loanInterest = (float) $loan->interest;
                $loanPrincipal = (float) $loan->amount;
                $loanPaidAmount = (float) $loan->paid_amount;

                $loanPaidInterest = min(
                    $loanPaidAmount,
                    $loanInterest
                );

                $loanPaidPrincipal = max(
                    0,
                    $loanPaidAmount - $loanPaidInterest
                );

                $paidInterest += $loanPaidInterest;

                $paidPrincipal += min(
                    $loanPaidPrincipal,
                    $loanPrincipal
                );
            }

            $account->paid_interest = $paidInterest;

            $account->paid_principal = $paidPrincipal;

            $account->remaining_interest = max(
                0,
                $account->interest - $account->paid_interest
            );
        }

        return view(
            'Admin.transactions.all-loan-interest',
            compact('accounts'),
            [
                'ActiveTabMenu' => 'interest',
                'SubActiveTab' => 'view'
            ]
        );
    }
}
