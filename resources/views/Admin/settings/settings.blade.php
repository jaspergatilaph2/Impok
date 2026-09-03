@extends('layouts.app')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="{{ route('Admin.dashboard') }}" class="app-brand-link">
                    <span class="app-brand-logo demo">
                    </span>
                    <img src="{{asset('images/Logo.png')}}" alt="" style="width: 50px;">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform:uppercase">Impoks</span>
                </a>

                <!-- <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                  <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
                </a> -->
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="{{ route('Admin.dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-envelope"></i>
                        <div data-i18n="Layouts">Messages</div>
                    </a>

                    <ul class="menu-sub">

                        <li class="menu-item">
                            <a href="{{ route('users.messages.newmassage') }}" class="menu-link">
                                <div data-i18n="Without navbar">New Messages</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('users.messages.usersinbox') }}" class="menu-link">
                                <div data-i18n="Without navbar">Inbox</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('users.messages.trashbin') }}" class="menu-link">
                                <div data-i18n="Without navbar">Trash</div>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Layouts -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-users"></i>
                        <div data-i18n="Layouts">User Management</div>
                    </a>

                    <ul class="menu-sub">

                        <li class="menu-item">
                            <a href="{{ route('users.list.viewUsers') }}" class="menu-link">
                                <div data-i18n="Without navbar">List of all users</div>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-wallet"></i>
                        <div data-i18n="Layouts">Wallet Management</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('users.wallet.viewCashIn') }}" class="menu-link">
                                <div data-i18n="Without navbar">View user balance</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('users.wallet.viewAmount') }}" class="menu-link">
                                <div data-i18n="Without navbar">View cash in transactions</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('users.wallet.viewInterest') }}" class="menu-link">
                                <div data-i18n="Without navbar">View interest transactions</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('users.wallet.viewLoans') }}" class="menu-link">
                                <div data-i18n="Without navbar">View loan transaction</div>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-cash-register"></i>
                        <div data-i18n="Layouts">Transactions</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('users.transactions.viewAllBalance') }}" class="menu-link">
                                <div data-i18n="Without navbar">All balance transactions</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('users.transactions.adminViewInterest') }}" class="menu-link">
                                <div data-i18n="Without navbar">All cash in interest transactions</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('users.transactions.viewAllLoans')  }}" class="menu-link">
                                <div data-i18n="Without navbar">All loans transactions</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('users.transactions.viewAllLoanInterest') }}" class="menu-link">
                                <div data-i18n="Without navbar">All loans interest transactions</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('admin.calendar.viewCalendar') }}" class="menu-link">
                                <div data-i18n="Without navbar">Date Of Transactions</div>
                            </a>
                        </li>

                    </ul>

                </li>


                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Accounts</span>
                </li>
                <li class="menu-item {{ $ActiveTabMenu  === 'View' ? 'active' : ''}}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-user"></i>
                        <div data-i18n="Account Settings">Account Settings</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('users.accounts.viewAccounts') }}" class="menu-link">
                                <div data-i18n="Account">Account</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('users.accounts.updateAccounts')}}" class="menu-link">
                                <div data-i18n="Notifications">Update Account</div>
                            </a>
                        </li>
                        <li class="menu-item {{  $SubActiveTab  === 'settings' ? 'active' : ''}}">
                            <a href="{{route('users.accounts.viewSettings')}}" class="menu-link">
                                <div data-i18n="Notifications">Settings</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Miscellaneous</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-file"></i>
                        <div data-i18n="Misc">Misc</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('admin.logs.viewLogs') }}" class="menu-link">
                                <div data-i18n="Under Maintenance">Logs</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">

                        </div>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Place this tag where you want the button to render. -->




                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img
                                        src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('sneat/img/avatars/1.png') }}"
                                        alt class="w-px-120 h-px-120 rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img
                                                        src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('sneat/img/avatars/1.png') }}"
                                                        alt class="w-px-120 h-px-120 rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{Auth::user()->name}}</span>
                                                <small class="text-muted"> @php
                                                    $role = strtolower(auth()->user()->role);
                                                    if ($role === 'user') {
                                                    $roleLabel = 'Applicant';
                                                    }else {
                                                    $roleLabel = ucfirst($role);
                                                    }
                                                    @endphp
                                                    {{ $roleLabel }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('users.accounts.viewAccounts') }}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <!-- <li>
                          <a class="dropdown-item" href="">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Settings</span>
                          </a>
                        </li> -->
                                <li>
                                    <a class="dropdown-item" href="{{route('admin.logs.viewLogs')}}">
                                        <i class="menu-icon tf-icons bx bx-file"></i>
                                        <span class="align-middle">Logs</span>
                                    </a>
                                </li>

                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle" style="color:#ff6347;">Log Out</span>
                                    </a>
                                    <form action="{{route('logout')}}" method="post" id="logout-form">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="container">

                        <!-- SETTINGS HEADER -->
                        <div class="mb-4">
                            <h3 class="fw-bold text-primary">
                                <i class="fa-solid fa-gear me-2"></i>
                                Settings
                            </h3>

                            <p class="text-muted">
                                Manage your account, system preferences, security, and application settings.
                            </p>
                        </div>

                        <div class="row g-4">

                            <!-- GENERAL SETTINGS -->
                            <div class="col-12 col-lg-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body">

                                        <h5 class="fw-bold mb-3">
                                            <i class="fa-solid fa-sliders text-primary me-2"></i>
                                            General Settings
                                        </h5>

                                        <p class="text-muted small">
                                            Configure the basic settings of the system.
                                        </p>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">
                                                System Name
                                            </label>

                                            <input type="text"
                                                class="form-control"
                                                value="Impoks Management System">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">
                                                System Description
                                            </label>

                                            <textarea class="form-control"
                                                rows="3">Manage users, transactions, loans, and impok activities.</textarea>
                                        </div>

                                        <button class="btn btn-primary">
                                            <i class="fa-solid fa-save me-1"></i>
                                            Save Changes
                                        </button>

                                    </div>
                                </div>
                            </div>


                            <!-- ACCOUNT SETTINGS -->
                            <div class="col-12 col-lg-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body">

                                        <h5 class="fw-bold mb-3">
                                            <i class="fa-solid fa-user text-success me-2"></i>
                                            Account Settings
                                        </h5>

                                        <p class="text-muted small">
                                            Manage your administrator account information.
                                        </p>

                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show mt-3"
                                            role="alert">

                                            <i class="fa-solid fa-circle-check me-2"></i>

                                            <strong>Success!</strong>
                                            {{ session('success') }}

                                        </div>
                                        @endif

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">
                                                Name
                                            </label>

                                            <input type="text"
                                                class="form-control"
                                                value="{{ auth()->user()->name }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">
                                                Email Address
                                            </label>

                                            <input type="email"
                                                class="form-control"
                                                value="{{ auth()->user()->email }}" readonly>
                                        </div>

                                        <button type="button"
                                            class="btn btn-outline-success"
                                            data-bs-toggle="modal"
                                            data-bs-target="#changePasswordModal">
                                            <i class="fa-solid fa-key me-1"></i>
                                            Change Password
                                        </button>

                                        <div class="modal fade"
                                            id="changePasswordModal"
                                            tabindex="-1"
                                            aria-labelledby="changePasswordModalLabel"
                                            aria-hidden="true">

                                            <div class="modal-dialog modal-dialog-centered">

                                                <div class="modal-content border-0 shadow">

                                                    <!-- HEADER -->
                                                    <div class="modal-header">

                                                        <div>
                                                            <h5 class="modal-title fw-bold"
                                                                id="changePasswordModalLabel">

                                                                <i class="fa-solid fa-key text-success me-2"></i>
                                                                Change Password

                                                            </h5>

                                                            <small class="text-muted">
                                                                Update your account password
                                                            </small>
                                                        </div>

                                                        <button type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>

                                                    </div>



                                                    <!-- FORM -->
                                                    <form action="{{  route('users.accounts.passwordUpdate') }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">

                                                            <!-- CURRENT PASSWORD -->
                                                            <div class="mb-3">

                                                                <label for="current_password"
                                                                    class="form-label fw-semibold">

                                                                    Current Password

                                                                </label>

                                                                <div class="input-group">

                                                                    <input type="password"
                                                                        name="current_password"
                                                                        id="current_password"
                                                                        class="form-control"
                                                                        placeholder="Enter current password"
                                                                        autocomplete="current-password"
                                                                        required>

                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary"
                                                                        onclick="togglePassword('current_password', this)">

                                                                        <i class="fa-solid fa-eye"></i>

                                                                    </button>

                                                                </div>

                                                                @error('current_password')
                                                                <div class="text-danger small mt-1">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror

                                                            </div>


                                                            <!-- NEW PASSWORD -->
                                                            <div class="mb-3">

                                                                <label for="new_password"
                                                                    class="form-label fw-semibold">

                                                                    New Password

                                                                </label>

                                                                <div class="input-group">

                                                                    <input type="password"
                                                                        name="new_password"
                                                                        id="new_password"
                                                                        class="form-control"
                                                                        placeholder="Enter new password"
                                                                        autocomplete="new-password"
                                                                        required>

                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary"
                                                                        onclick="togglePassword('new_password', this)">

                                                                        <i class="fa-solid fa-eye"></i>

                                                                    </button>

                                                                </div>

                                                                @error('new_password')
                                                                <div class="text-danger small mt-1">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror

                                                            </div>


                                                            <!-- CONFIRM PASSWORD -->
                                                            <div class="mb-3">

                                                                <label for="new_password_confirmation"
                                                                    class="form-label fw-semibold">

                                                                    Confirm New Password

                                                                </label>

                                                                <div class="input-group">

                                                                    <input type="password"
                                                                        name="new_password_confirmation"
                                                                        id="new_password_confirmation"
                                                                        class="form-control"
                                                                        placeholder="Confirm new password"
                                                                        autocomplete="new-password"
                                                                        required>

                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary"
                                                                        onclick="togglePassword(
                                        'new_password_confirmation',
                                        this
                                    )">

                                                                        <i class="fa-solid fa-eye"></i>

                                                                    </button>

                                                                </div>

                                                            </div>


                                                            <!-- PASSWORD REQUIREMENT -->
                                                            <div class="alert alert-light border mb-0">

                                                                <small class="text-muted">

                                                                    <i class="fa-solid fa-circle-info text-primary me-1"></i>

                                                                    Password must contain at least
                                                                    <strong>8 characters</strong>.

                                                                </small>

                                                            </div>

                                                        </div>


                                                        <!-- FOOTER -->
                                                        <div class="modal-footer">

                                                            <button type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal">

                                                                Cancel

                                                            </button>

                                                            <button type="submit"
                                                                class="btn btn-success">

                                                                <i class="fa-solid fa-key me-1"></i>
                                                                Update Password

                                                            </button>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- LOAN SETTINGS -->
                            <div class="col-12 col-lg-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body">

                                        <h5 class="fw-bold mb-3">
                                            <i class="fa-solid fa-money-bill-transfer text-warning me-2"></i>
                                            Loan Settings
                                        </h5>

                                        <p class="text-muted small">
                                            Configure loan and interest-related settings.
                                        </p>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">
                                                Interest Rate
                                            </label>

                                            <div class="input-group">
                                                <input type="number"
                                                    class="form-control"
                                                    value="2"
                                                    min="0"
                                                    step="0.01">

                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">
                                                Loan Status
                                            </label>

                                            <select class="form-select">
                                                <option value="active" selected>Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>

                                        <button class="btn btn-warning">
                                            <i class="fa-solid fa-save me-1"></i>
                                            Save Loan Settings
                                        </button>

                                    </div>
                                </div>
                            </div>


                            <!-- NOTIFICATION SETTINGS -->
                            <div class="col-12 col-lg-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body">

                                        <h5 class="fw-bold mb-3">
                                            <i class="fa-solid fa-bell text-info me-2"></i>
                                            Notification Settings
                                        </h5>

                                        <p class="text-muted small">
                                            Control how system notifications are displayed.
                                        </p>

                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input"
                                                type="checkbox"
                                                id="newUserNotification"
                                                checked>

                                            <label class="form-check-label"
                                                for="newUserNotification">
                                                New user notifications
                                            </label>
                                        </div>

                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input"
                                                type="checkbox"
                                                id="loanNotification"
                                                checked>

                                            <label class="form-check-label"
                                                for="loanNotification">
                                                Loan notifications
                                            </label>
                                        </div>

                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input"
                                                type="checkbox"
                                                id="transactionNotification"
                                                checked>

                                            <label class="form-check-label"
                                                for="transactionNotification">
                                                Transaction notifications
                                            </label>
                                        </div>

                                        <button class="btn btn-info text-white">
                                            <i class="fa-solid fa-save me-1"></i>
                                            Save Notifications
                                        </button>

                                    </div>
                                </div>
                            </div>


                            <!-- IMPОK DATE SETTINGS -->
                            <div class="col-12">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">

                                        <h5 class="fw-bold mb-3">
                                            <i class="fa-solid fa-calendar-days text-danger me-2"></i>
                                            Impok Schedule
                                        </h5>

                                        <p class="text-muted small">
                                            Set the next scheduled Impok date.
                                        </p>

                                        <div class="row align-items-end">

                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">
                                                    Next Impok Date
                                                </label>

                                                <input type="date"
                                                    class="form-control"
                                                    name="next_impok_date">
                                            </div>

                                            <div class="col-md-6 mt-3 mt-md-0">

                                                <button class="btn btn-danger">
                                                    <i class="fa-solid fa-calendar-check me-1"></i>
                                                    Update Schedule
                                                </button>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- SECURITY -->
                            <!-- <div class="col-12">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">

                                        <h5 class="fw-bold mb-3">
                                            <i class="fa-solid fa-shield-halved text-dark me-2"></i>
                                            Security
                                        </h5>

                                        <div class="d-flex flex-column flex-md-row
                                justify-content-between
                                align-items-md-center">

                                            <div>
                                                <h6 class="fw-bold mb-1">
                                                    Change Password
                                                </h6>

                                                <p class="text-muted small mb-0">
                                                    Update your administrator password regularly
                                                    to keep your account secure.
                                                </p>
                                            </div>

                                            <a href="{{ route('password.request') }}"
                                                class="btn btn-dark mt-3 mt-md-0">
                                                <i class="fa-solid fa-lock me-1"></i>
                                                Change Password
                                            </a>

                                        </div>

                                    </div>
                                </div>
                            </div> -->

                            <!-- DARK MODE SETTINGS -->
                            <div class="col-12 col-lg-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body">

                                        <h5 class="fw-bold mb-3">
                                            <i class="fa-solid fa-moon text-dark me-2"></i>
                                            Appearance Settings
                                        </h5>

                                        <p class="text-muted small">
                                            Customize the appearance of the system.
                                        </p>

                                        <div class="d-flex justify-content-between align-items-center">

                                            <div>
                                                <h6 class="fw-semibold mb-1">
                                                    Dark Mode
                                                </h6>

                                                <small class="text-muted">
                                                    Use a darker theme to reduce eye strain.
                                                </small>
                                            </div>

                                            <div class="form-check form-switch">

                                                <input class="form-check-input"
                                                    type="checkbox"
                                                    role="switch"
                                                    id="darkModeToggle">

                                                <label class="form-check-label"
                                                    for="darkModeToggle">
                                                </label>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme mt-4">
                    <div
                        class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column text-center text-md-start">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>,
                            <span class="fw-bold text-primary">Impoks Management System</span>
                        </div>
                        <div>
                            <a href="#" class="footer-link me-3">Documentation</a>
                            <a href="#" class="footer-link me-3">Support</a>
                            <a href="#" class="footer-link">Contact</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>


            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
@endsection