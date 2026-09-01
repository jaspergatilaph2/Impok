@extends('layouts.app')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        <!-- ========================================================= -->
        <!-- SIDEBAR / MENU -->
        <!-- ========================================================= -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

            <!-- Brand -->
            <div class="app-brand demo">
                <a href="{{ route('applicants.dashboard') }}" class="app-brand-link">
                    <span class="app-brand-logo demo"></span>

                    <img
                        src="{{ asset('images/Logo.png') }}"
                        alt="Impoks Logo"
                        style="width: 50px;">

                    <span
                        class="app-brand-text demo menu-text fw-bolder ms-2"
                        style="text-transform: uppercase;">
                        Impoks
                    </span>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">

                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="{{ route('applicants.dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>


                <!-- Notifications -->
                <li class="menu-item">
                    <a
                        href="javascript:void(0);"
                        class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-bell"></i>
                        <div data-i18n="Layouts">Notifications</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a
                                href="{{ route('users.notifications.viewMessages') }}"
                                class="menu-link">
                                <div data-i18n="Without navbar">
                                    Messages
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Wallet Balance -->
                <li class="menu-item {{ $ActiveTabMenu === 'Card' ? 'active' : '' }}">

                    <a
                        href="javascript:void(0);"
                        class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-wallet"></i>
                        <div data-i18n="Layouts">Wallet Balance</div>
                    </a>

                    <ul class="menu-sub">

                        <!-- Balance Money -->
                        <li class="menu-item">
                            <a
                                href="{{ route('applicants.wallet.viewWallet') }}"
                                class="menu-link">
                                <div data-i18n="Without navbar">
                                    Balance Money
                                </div>
                            </a>
                        </li>

                        <!-- Interest -->
                        <li class="menu-item">
                            <a
                                href="{{ route('applicants.wallet.viewInterest') }}"
                                class="menu-link">
                                <div data-i18n="Without navbar">
                                    Interest
                                </div>
                            </a>
                        </li>

                        <!-- Loan Interest -->
                        <li class="menu-item">
                            <a
                                href="{{ route('applicants.wallet.loanInterest') }}"
                                class="menu-link">
                                <div data-i18n="Without navbar">
                                    Loan Interest
                                </div>
                            </a>
                        </li>

                        <!-- Loans -->
                        <li class="menu-item">
                            <a
                                href="{{ route('applicants.wallet.loans') }}"
                                class="menu-link">
                                <div data-i18n="Without navbar">
                                    Loans
                                </div>
                            </a>
                        </li>

                        <!-- Card -->
                        <li class="menu-item {{ $SubActiveTab === 'View' ? 'active' : '' }}">
                            <a
                                href="{{ route('applicants.wallet.cardView') }}"
                                class="menu-link">
                                <div data-i18n="Without navbar">
                                    Card
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>


                <!-- Transactions -->
                <li class="menu-item">

                    <a
                        href="javascript:void(0);"
                        class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-file"></i>
                        <div data-i18n="Layouts">Transactions</div>
                    </a>

                    <ul class="menu-sub">

                        <li class="menu-item">
                            <a
                                href="{{ route('applicants.transactions.viewTransactions') }}"
                                class="menu-link">
                                <div data-i18n="Without navbar">
                                    History
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>


                <!-- ===================================================== -->
                <!-- ACCOUNTS -->
                <!-- ===================================================== -->

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">
                        Accounts
                    </span>
                </li>

                <li class="menu-item">

                    <a
                        href="javascript:void(0);"
                        class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-user"></i>
                        <div data-i18n="Account Settings">
                            Account Settings
                        </div>
                    </a>

                    <ul class="menu-sub">

                        <!-- Account -->
                        <li class="menu-item">
                            <a
                                href="{{ route('applicants.accounts.viewAccount') }}"
                                class="menu-link">
                                <div data-i18n="Account">
                                    Account
                                </div>
                            </a>
                        </li>

                        <!-- Update Account -->
                        <li class="menu-item">
                            <a
                                href="{{ route('applicants.accounts.updateAccount') }}"
                                class="menu-link">
                                <div data-i18n="Notifications">
                                    Update Account
                                </div>
                            </a>
                        </li>

                        <!-- Settings -->
                        <li class="menu-item">
                            <a
                                href="{{ route('applicants.settings.viewSettings') }}"
                                class="menu-link">
                                <div data-i18n="Notifications">
                                    Settings
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>


                <!-- ===================================================== -->
                <!-- MISCELLANEOUS -->
                <!-- ===================================================== -->

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">
                        Miscellaneous
                    </span>
                </li>

                <li class="menu-item">

                    <a
                        href="javascript:void(0);"
                        class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-file"></i>
                        <div data-i18n="Misc">
                            Misc
                        </div>
                    </a>

                    <ul class="menu-sub">

                        <li class="menu-item">
                            <a
                                href="{{ route('applicants.logs.viewLogs') }}"
                                class="menu-link">
                                <div data-i18n="Under Maintenance">
                                    Logs
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </aside>

        <!-- / Sidebar -->


        <!-- ========================================================= -->
        <!-- LAYOUT PAGE -->
        <!-- ========================================================= -->

        <div class="layout-page">

            <!-- ===================================================== -->
            <!-- NAVBAR -->
            <!-- ===================================================== -->

            <nav
                id="layout-navbar"
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">

                <!-- Mobile Menu Toggle -->
                <div
                    class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a
                        class="nav-item nav-link px-0 me-xl-4"
                        href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>


                <div
                    class="navbar-nav-right d-flex align-items-center"
                    id="navbar-collapse">

                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center"></div>
                    </div>
                    <!-- / Search -->


                    <ul class="navbar-nav flex-row align-items-center ms-auto">

                        <!-- ================================================= -->
                        <!-- MESSAGES / INBOX -->
                        <!-- ================================================= -->

                        <li class="nav-item dropdown me-3">

                            <a
                                class="nav-link dropdown-toggle hide-arrow"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown">

                                <span class="position-relative">

                                    <i class="bx bx-message-dots bx-sm"></i>

                                    {{-- Unread Count --}}
                                    @if(isset($unreadCount) && $unreadCount > 0)

                                    <span
                                        class="position-absolute top-0 start-100 translate-middle"
                                        style="
                                                background: #ff4d4f;
                                                color: #fff;
                                                padding: 1px 6px;
                                                border-radius: 12px;
                                                font-size: 11px;
                                            ">
                                        {{ $unreadCount > 99 ? '99+' : $unreadCount }}
                                    </span>

                                    @endif

                                </span>

                            </a>


                            <!-- Messages Dropdown -->
                            <ul
                                class="dropdown-menu dropdown-menu-end shadow-sm"
                                style="width: 300px;">

                                <li
                                    class="d-flex justify-content-between align-items-center px-3">

                                    <h6 class="dropdown-header mb-0">
                                        Messages
                                    </h6>

                                    @if(isset($unreadCount) && $unreadCount > 0)

                                    <small class="text-danger ms-2">
                                        ({{ $unreadCount }} new)
                                    </small>

                                    @endif

                                </li>


                                {{-- Message List --}}
                                @forelse($messages ?? [] as $msg)

                                <li>

                                    <a
                                        class="dropdown-item d-flex flex-column {{ $msg->deleted_at ? 'text-muted text-decoration-line-through' : '' }}"
                                        href="#">

                                        <span class="fw-semibold">
                                            {{ $msg->title ?? 'No Title' }}
                                        </span>

                                        <small>
                                            {{ \Illuminate\Support\Str::limit($msg->message, 40) }}
                                        </small>


                                        @if(is_null($msg->receiver_id))

                                        <small class="text-primary">
                                            (Broadcast)
                                        </small>

                                        @endif


                                        @if(!$msg->is_read && !$msg->deleted_at)

                                        <small class="text-danger">
                                            Unread
                                        </small>

                                        @endif


                                        @if($msg->deleted_at)

                                        <small class="text-secondary">
                                            Deleted
                                        </small>

                                        @endif

                                    </a>

                                </li>

                                @empty

                                <li>
                                    <span class="dropdown-item text-muted text-center">
                                        No messages found
                                    </span>
                                </li>

                                @endforelse


                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a
                                        class="dropdown-item text-primary text-center"
                                        href="{{ route('users.notifications.viewMessages') }}">
                                        View all messages
                                    </a>
                                </li>

                            </ul>

                        </li>


                        <!-- ================================================= -->
                        <!-- USER DROPDOWN -->
                        <!-- ================================================= -->

                        <li class="nav-item navbar-dropdown dropdown-user dropdown">

                            <a
                                class="nav-link dropdown-toggle hide-arrow"
                                href="javascript:void(0);"
                                data-bs-toggle="dropdown">

                                <div class="avatar avatar-online">

                                    <img
                                        src="{{ auth()->user()->avatar
                                            ? asset('storage/' . auth()->user()->avatar)
                                            : asset('sneat/img/avatars/1.png') }}"
                                        alt="User Avatar"
                                        class="w-px-120 h-px-120 rounded-circle">

                                </div>

                            </a>


                            <!-- User Dropdown Menu -->
                            <ul class="dropdown-menu dropdown-menu-end">

                                <!-- User Information -->
                                <li>

                                    <a class="dropdown-item" href="#">

                                        <div class="d-flex">

                                            <div class="flex-shrink-0 me-3">

                                                <div class="avatar avatar-online">

                                                    <img
                                                        src="{{ auth()->user()->avatar
                                                            ? asset('storage/' . auth()->user()->avatar)
                                                            : asset('sneat/img/avatars/1.png') }}"
                                                        alt="User Avatar"
                                                        class="w-px-120 h-px-120 rounded-circle">

                                                </div>

                                            </div>


                                            <div class="flex-grow-1">

                                                <span class="fw-semibold d-block">
                                                    {{ Auth::user()->name }}
                                                </span>

                                                <small class="text-muted">

                                                    @php
                                                    $role = strtolower(auth()->user()->role);

                                                    if ($role === 'user') {
                                                    $roleLabel = 'Applicant';
                                                    }
                                                    @endphp

                                                    {{ $roleLabel }}

                                                </small>

                                            </div>

                                        </div>

                                    </a>

                                </li>


                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>


                                <!-- My Profile -->
                                <li>

                                    <a
                                        class="dropdown-item"
                                        href="{{ route('applicants.accounts.viewAccount') }}">
                                        <i class="bx bx-user me-2"></i>

                                        <span class="align-middle">
                                            My Profile
                                        </span>
                                    </a>

                                </li>


                                <!-- Settings -->
                                <li>

                                    <a
                                        class="dropdown-item"
                                        href="{{ route('applicants.settings.viewSettings') }}">
                                        <i class="bx bx-cog me-2"></i>

                                        <span class="align-middle">
                                            Settings
                                        </span>
                                    </a>

                                </li>


                                <!-- Logs -->
                                <li>

                                    <a
                                        class="dropdown-item"
                                        href="{{ route('applicants.logs.viewLogs') }}">
                                        <i class="menu-icon tf-icons bx bx-file"></i>

                                        <span class="align-middle">
                                            Logs
                                        </span>
                                    </a>

                                </li>


                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>


                                <!-- Logout -->
                                <li>

                                    <a
                                        class="dropdown-item"
                                        href="javascript:void(0);"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bx bx-power-off me-2"></i>

                                        <span
                                            class="align-middle"
                                            style="color: #ff6347;">
                                            Log Out
                                        </span>
                                    </a>


                                    <form
                                        action="{{ route('logout') }}"
                                        method="POST"
                                        id="logout-form">
                                        @csrf
                                    </form>

                                </li>

                            </ul>

                        </li>

                        <!-- / User -->

                    </ul>

                </div>

            </nav>

            <!-- / Navbar -->


            <!-- ===================================================== -->
            <!-- CONTENT WRAPPER -->
            <!-- ===================================================== -->

            <div class="content-wrapper">

                <!-- ================================================= -->
                <!-- PAGE HEADER -->
                <!-- ================================================= -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="loan-card-header">

                        <!-- Title Section -->
                        <div class="loan-card-title">

                            <h4 class="fw-bold mb-1">
                                <i class="bx bx-credit-card text-primary me-2"></i>
                                My Loan Card
                            </h4>

                            <p class="text-muted mb-0">
                                View your IMPOKS loan account card and account details.
                            </p>

                            <p class="text-dark bg-warning px-3 py-2 rounded mb-0 fw-bold">
                                [ THIS IS FOR THE FUTURE UPDATE ]
                            </p>

                        </div>


                        <!-- Account Status -->
                        <div class="account-status">

                            <small class="text-muted d-block">
                                Account Status
                            </small>

                            <span class="fw-semibold text-success">
                                <i class="bx bx-check-circle me-1"></i>
                                Active
                            </span>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- ATM / CREDIT CARD -->
                    <!-- ================================================= -->

                    <div class="loan-card-wrapper">

                        <div class="credit-card-container"
                            onclick="flipLoanCard()"
                            role="button"
                            tabindex="0"
                            aria-label="Flip loan card">

                            <!-- ================================================= -->
                            <!-- FRONT OF CARD -->
                            <!-- ================================================= -->

                            <div class="credit-card credit-card-front shadow-lg">

                                <div class="card-body-custom">

                                    <!-- Card Header -->
                                    <div class="card-header-custom">

                                        <div class="card-holder">

                                            <small class="label">
                                                IMPOKS
                                            </small>

                                            <h6 class="account-name">
                                                CREDIT CARD
                                            </h6>

                                        </div>

                                        <!-- EMV Chip -->
                                        <div class="emv-chip">

                                            <div class="chip-line-horizontal"></div>
                                            <div class="chip-line-vertical"></div>
                                            <div class="chip-inner"></div>

                                        </div>

                                    </div>


                                    <!-- Account Number -->
                                    <div class="account-number-section">

                                        <small class="label">
                                            ACCOUNT NUMBER
                                        </small>

                                        <div class="account-number">

                                            {{ substr($accountNumber, 0, 4) }}
                                            <span>****</span>
                                            <span>****</span>
                                            {{ substr($accountNumber, -4) }}

                                        </div>

                                    </div>


                                    <!-- Bottom Details -->
                                    <div class="bottom-details">

                                        <!-- First Name -->
                                        <div class="card-detail">

                                            <small class="label">
                                                FIRST NAME
                                            </small>

                                            <div class="card-name">
                                                {{ strtoupper($profile->first_name ?? '') }}
                                            </div>

                                        </div>


                                        <!-- Last Name -->
                                        <div class="card-detail">

                                            <small class="label">
                                                LAST NAME
                                            </small>

                                            <div class="card-name">
                                                {{ strtoupper($profile->last_name ?? '') }}
                                            </div>

                                        </div>


                                        <!-- Valid Thru -->
                                        <div class="card-detail">

                                            <small class="label">
                                                VALID THRU
                                            </small>

                                            <div class="card-validity">
                                                {{ $cardValidThru }}
                                            </div>

                                        </div>


                                        <!-- Brand -->
                                        <div class="brand">

                                            <i class="bx bx-credit-card"></i>

                                            <span>IMPOKS</span>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <!-- ================================================= -->
                            <!-- BACK OF CARD -->
                            <!-- ================================================= -->

                            <div class="credit-card credit-card-back shadow-lg">

                                <div class="card-back-content">

                                    <!-- Magnetic Stripe -->
                                    <div class="magnetic-stripe"></div>


                                    <!-- Signature Area -->
                                    <div class="signature-section">

                                        <small class="label">
                                            AUTHORIZED SIGNATURE
                                        </small>

                                        <div class="signature-box">

                                            @if(!empty($profile->signature))

                                            <img
                                                src="{{ asset('storage/' . $profile->signature) }}"
                                                alt="User Signature"
                                                class="user-signature">

                                            @else

                                            <span class="signature-placeholder">
                                                No signature available
                                            </span>

                                            @endif

                                        </div>

                                    </div>


                                    <!-- Signature Information -->
                                    <div class="signature-info">

                                        <div>

                                            <small class="label">
                                                CARD HOLDER
                                            </small>

                                            <div class="signature-name">

                                                {{ strtoupper(
                                trim(
                                    ($profile->first_name ?? '') . ' ' .
                                    ($profile->last_name ?? '')
                                )
                            ) }}

                                            </div>

                                        </div>


                                        <div>

                                            <small class="label">
                                                ACCOUNT NUMBER
                                            </small>

                                            <div class="signature-account">
                                                **** **** {{ substr($accountNumber, -4) }}
                                            </div>

                                        </div>

                                    </div>


                                    <!-- Back Information -->
                                    <div class="card-back-note">

                                        <i class="bx bx-info-circle"></i>

                                        <span>
                                            This card is issued by IMPOKS and is intended
                                            for authorized account use only.
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- / Content wrapper -->


            <!-- ===================================================== -->
            <!-- FOOTER -->
            <!-- ===================================================== -->

            <footer class="content-footer footer bg-footer-theme mt-4">

                <div
                    class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column text-center text-md-start">

                    <div class="mb-2 mb-md-0">

                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>,

                        <span class="fw-bold text-primary">
                            Impoks Management System
                        </span>

                    </div>


                    <div>

                        <a href="#" class="footer-link me-3">
                            Documentation
                        </a>

                        <a href="#" class="footer-link me-3">
                            Support
                        </a>

                        <a href="#" class="footer-link">
                            Contact
                        </a>

                    </div>

                </div>

            </footer>

            <!-- / Footer -->


            <div class="content-backdrop fade"></div>

        </div>

        <!-- / Layout page -->

    </div>


    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

</div>

<!-- / Layout wrapper -->

@endsection