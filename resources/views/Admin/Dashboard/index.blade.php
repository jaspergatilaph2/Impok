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
                <li class="menu-item active">
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
                                <div data-i18n="Without navbar">All interest transactions</div>
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
                <li class="menu-item">
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
                            <a href="" class="menu-link">
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
                                    <a class="dropdown-item" href="">
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

                        <!-- ADMIN WELCOME -->
                        <h3 class="mb-4 fw-bold text-primary text-center text-md-start">
                            Admin Dashboard - Welcome, {{ auth()->user()->name ?? 'Admin' }}!
                        </h3>

                        <p class="text-muted text-center text-md-start">
                            Monitor system activity, users, transactions, and financial overview.
                        </p>

                        <!-- STATS SECTION -->
                        <div class="row g-4">

                            <!-- TOTAL USERS -->
                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body text-center">
                                        <div class="mb-3 text-primary">
                                            <i class="fa-solid fa-users fs-1"></i>
                                        </div>
                                        <h6 class="text-muted">Total Users</h6>
                                        <h2 class="fw-bold">{{ $userCounts }}</h2>
                                        <small class="text-muted">Registered accounts</small>
                                    </div>
                                </div>
                            </div>

                            <!-- TOTAL TRANSACTIONS -->
                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body text-center">
                                        <div class="mb-3 text-success">
                                            <i class="fa-solid fa-receipt fs-1"></i>
                                        </div>
                                        <h6 class="text-muted">Transactions</h6>
                                        <h2 class="fw-bold">{{ $adminwalletTransactions }}</h2>
                                        <small class="text-muted">All system transactions</small>
                                    </div>
                                </div>
                            </div>

                            <!-- PENDING REQUESTS -->
                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body text-center">
                                        <div class="mb-3 text-warning">
                                            <i class="fa-regular fa-money-bill-1 fs-1"></i>
                                        </div>
                                        <h6 class="text-muted">Loans</h6>
                                        <h2 class="fw-bold">{{ $TotalLoans }}</h2>
                                        <small class="text-muted">All loans transactions</small>
                                    </div>
                                </div>
                            </div>

                            <!-- TOTAL BALANCE -->
                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body text-center">
                                        <div class="mb-3 text-info">
                                            <i class="fa-solid fa-wallet fs-1"></i>
                                        </div>
                                        <h6 class="text-muted">Total Balance</h6>
                                        <h2 class="fw-bold">
                                            ₱ {{ number_format($totalBalance) }}
                                        </h2>
                                        <small class="text-muted">System-wide funds</small>
                                    </div>
                                </div>
                            </div>

                            <!-- COMPLETED TRANSACTIONS -->
                            <!-- <div class="col-12 col-md-4 col-lg-3">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body text-center">
                                        <div class="mb-3 text-success">
                                            <i class="fa-solid fa-circle-check fs-1"></i>
                                        </div>
                                        <h6 class="text-muted">Completed</h6>
                                        <h2 class="fw-bold">0</h2>
                                        <small class="text-muted">Successful transactions</small>
                                    </div>
                                </div>
                            </div> -->

                            <!-- FAILED TRANSACTIONS -->
                            <!-- <div class="col-12 col-md-4 col-lg-3">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body text-center">
                                        <div class="mb-3 text-danger">
                                            <i class="fa-solid fa-triangle-exclamation fs-1"></i>
                                        </div>
                                        <h6 class="text-muted">Failed</h6>
                                        <h2 class="fw-bold">0</h2>
                                        <small class="text-muted">Declined transactions</small>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                        <!-- QUICK ACTIONS -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card shadow-sm">
                                    <div class="card-body text-center text-md-start">

                                        <h5 class="fw-bold mb-3">
                                            <i class="fa-solid fa-bolt text-primary me-2"></i> Admin Quick Actions
                                        </h5>

                                        <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center justify-content-md-start">

                                            <!-- MANAGE USERS -->
                                            <div class="flex-fill">
                                                <a href="" class="btn btn-primary w-100">
                                                    <i class="fa-solid fa-users me-1"></i> Manage Users
                                                </a>
                                            </div>

                                            <!-- BALANCE MANAGEMENT -->
                                            <div class="flex-fill">
                                                <a href="" class="btn btn-success w-100">
                                                    <i class="fa-solid fa-wallet me-1"></i> Manage Balance
                                                </a>
                                            </div>

                                            <!-- TRANSACTIONS -->
                                            <div class="flex-fill">
                                                <a href="" class="btn btn-outline-primary w-100">
                                                    <i class="fa-solid fa-receipt me-1"></i> Transactions
                                                </a>
                                            </div>

                                            <!-- NOTIFICATIONS -->
                                            <div class="flex-fill">
                                                <a href="" class="btn btn-outline-warning w-100">
                                                    <i class="fa-solid fa-bell me-1"></i> Notifications
                                                </a>
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