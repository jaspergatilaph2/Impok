<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Applicants\ApplicantsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/home');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    $user = auth()->user();

    if (!$user) {
        return redirect('/login');
    }

    switch (strtolower($user->role)) {
        case 'admin':
        case 'staff':
            return redirect()->route('Admin.dashboard');

        case 'user':
            return redirect()->route('applicants.dashboard');

        default:
            return redirect('/login');
    }
})->middleware('auth');

// Applicants Routes
Route::group(['middleware' => ['auth', 'IfIMSUsers']], function () {

    Route::get('/dashboard', [ApplicantsController::class, 'index'])
        ->name('applicants.dashboard');

    Route::prefix('/applicants')->name('applicants.accounts.')->group(function () {
        Route::get('/view', [ApplicantsController::class, 'viewAccounts'])
            ->name('viewAccount');
        Route::get('/update-accounts', [ApplicantsController::class, 'updateAccounts'])
            ->name('updateAccount');
        Route::put('/updated-accounts', [ApplicantsController::class, 'updatedAccounts'])
            ->name('updatedAccount');
    });

    Route::prefix('/applicans-settings')->name('applicants.settings.')->group(function () {
        Route::get('/view', [ApplicantsController::class, 'viewSettings'])
            ->name('viewSettings');
        Route::put('/password-update', [ApplicantsController::class, 'updatePassword'])
            ->name('passwordUpdate');
    });

    Route::prefix('/applicants-wallet')->name('applicants.wallet.')->group(function () {
        Route::get('/view', [ApplicantsController::class, 'viewWallet'])
            ->name('viewWallet');
        Route::get('/interest', [ApplicantsController::class, 'viewInterest'])
            ->name('viewInterest');
        Route::get('/loans', [ApplicantsController::class, 'userLoans'])
            ->name('loans');
    });

    Route::prefix('/transactions')->name('applicants.transactions.')->group(function () {
        Route::get('/view', [ApplicantsController::class, 'viewTransactions'])
            ->name('viewTransactions');
    });

    Route::prefix('/notifications')->name('users.notifications.')->group(function () {
        Route::get('/view-notif', [ApplicantsController::class, 'ViewNotif'])
            ->name('viewMessages');
    });

    Route::prefix('/under-maintenance')->name('users.under-maintenance.')->group(function () {
        Route::get('/view-under-maintenance', [ApplicantsController::class, 'UnderMaintenance'])
            ->name('undermaintenance');
    });

    Route::prefix('/applicants-logs')->name('applicants.logs.')->group(function () {
        Route::get('/view-logs', [ApplicantsController::class, 'viewLogs'])
            ->name('viewLogs');
    });
});


// Admin Routes
Route::group(['middleware' => ['auth', 'IfIMSAdmin']], function () {
    Route::get('/admin-dashboard', [AdminController::class, 'adminDashboardIndex'])
        ->name('Admin.dashboard');

    Route::prefix('/list')->name('users.list.')->group(function () {
        Route::get('/view', [AdminController::class, 'viewUsers'])
            ->name('viewUsers');
    });

    Route::prefix('/wallet')->name('users.wallet.')->group(function () {
        Route::get('/cash-in', [AdminController::class, 'viewCashIn'])
            ->name('viewCashIn');
        Route::post('/cash-in', [AdminController::class, 'cashIn'])
            ->name('cashIn');
        Route::get('/amount', [AdminController::class, 'viewAmount'])
            ->name('viewAmount');
        Route::get('/loans', [AdminController::class, 'viewLoans'])
            ->name('viewLoans');
        Route::post('/get-loans', [AdminController::class, 'getLoans'])
            ->name('getLoans');
        Route::get('/interest', [AdminController::class, 'viewInterest'])
            ->name('viewInterest');
        Route::post('/loans-payment', [AdminController::class, 'loansPayment'])
            ->name('loansPayment');
    });

    Route::prefix('/transactions')->name('users.transactions.')->group(function () {
        Route::get('/all-balance', [AdminController::class, 'viewAllBalance'])
            ->name('viewAllBalance');
        Route::get('/all-interest', [AdminController::class, 'adminViewInterest'])
            ->name('adminViewInterest');
        Route::get('/all-loans', [AdminController::class, 'ViewAllLoans'])
            ->name('viewAllLoans');
    });

    Route::prefix('/accounts')->name('users.accounts.')->group(function () {
        Route::get('/view', [AdminController::class, 'viewAccounts'])
            ->name('viewAccounts');
        Route::get('/update-accounts', [AdminController::class, 'updateAccounts'])
            ->name('updateAccounts');
        Route::put('/updated-accounts', [AdminController::class, 'updatedAccounts'])
            ->name('updatedAccounts');
    });

    Route::prefix('/admin-calendar')->name('admin.calendar.')->group(function () {
        Route::get('/view', [AdminController::class, 'viewCalendar'])
            ->name('viewCalendar');
        Route::post('/store', [AdminController::class, 'storeCalendar'])
            ->name('storeCalendar');
        Route::get('/events', [AdminController::class, 'calendarEvents'])
            ->name('eventsCalendars');
    });

    Route::prefix('/messages')->name('users.messages.')->group(function () {
        Route::get('/new-message', [AdminController::class, 'NewMessages'])
            ->name('newmassage');
        Route::get('/inbox-message', [AdminController::class, 'usersInbox'])
            ->name('usersinbox');
        Route::post('/new-messages', [AdminController::class, 'messages'])
            ->name('new-message');
        Route::get('/trash-bin', [AdminController::class, 'TrashBin'])
            ->name('trashbin');
        Route::delete('/trash/{id}', [AdminController::class, 'Trashcan'])
            ->name('trashcan');
    });

    Route::prefix('/admin-logs')->name('admin.logs.')->group(function () {
        Route::get('/view-logs', [AdminController::class, 'viewLogs'])
            ->name('viewLogs');
    });
});
