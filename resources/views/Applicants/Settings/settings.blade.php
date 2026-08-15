@extends('layouts.app')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="{{ route('applicants.dashboard') }}" class="app-brand-link">
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
                    <a href="{{ route('applicants.dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-bell"></i>
                        <div data-i18n="Layouts">Notifications</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('users.notifications.viewMessages') }}" class="menu-link">
                                <div data-i18n="Without navbar">Messages</div>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Layouts -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-wallet"></i>
                        <div data-i18n="Layouts">Wallet balance</div>
                    </a>

                    <ul class="menu-sub">

                        <li class="menu-item">
                            <a href="{{ route('applicants.wallet.viewWallet') }}" class="menu-link">
                                <div data-i18n="Without navbar">Balance Money</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('applicants.wallet.viewInterest') }}" class="menu-link">
                                <div data-i18n="Without navbar">Interest</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('applicants.wallet.loanInterest') }}" class="menu-link">
                                <div data-i18n="Without navbar">Loan Interest</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('applicants.wallet.loans') }}" class="menu-link">
                                <div data-i18n="Without navbar">Loans</div>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-clock-rotate-left"></i>
                        <div data-i18n="Layouts">Transactions</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('applicants.transactions.viewTransactions') }}" class="menu-link">
                                <div data-i18n="Without navbar">History</div>
                            </a>
                        </li>
                    </ul>
                </li>





                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Accounts</span>
                </li>
                <li class="menu-item {{ $ActiveTabMenu === 'settings' ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-user"></i>
                        <div data-i18n="Account Settings">Account Settings</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('applicants.accounts.viewAccount') }}" class="menu-link">
                                <div data-i18n="Account">Account</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{route('applicants.accounts.updateAccount')}}" class="menu-link">
                                <div data-i18n="Notifications">Update Account</div>
                            </a>
                        </li>

                        <li class="menu-item {{ $SubActiveTab === 'view' ? 'active' : '' }}">
                            <a href="" class="menu-link">
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
                            <a href="{{ route('applicants.logs.viewLogs')}}" class="menu-link">
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

                        <!--MESSAGE / INBOX ICON -->
                        <li class="nav-item dropdown me-3">

                            <a class="nav-link dropdown-toggle hide-arrow" href="#" role="button" data-bs-toggle="dropdown">
                                <span class="position-relative">
                                    <i class="bx bx-message-dots bx-sm"></i>

                                    {{-- unread COUNT --}}
                                    @if(isset($unreadCount) && $unreadCount > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle"
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

                            <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="width: 300px;">

                                <li class="d-flex justify-content-between align-items-center px-3">
                                    <h6 class="dropdown-header mb-0">Messages</h6>

                                    @if(isset($unreadCount) && $unreadCount > 0)
                                    <small class="text-danger ms-2">
                                        ({{ $unreadCount }} new)
                                    </small>
                                    @endif
                                </li>

                                {{-- LOOP --}}
                                @forelse($messages ?? [] as $msg)
                                <li>
                                    <a class="dropdown-item d-flex flex-column 
                    {{ $msg->deleted_at ? 'text-muted text-decoration-line-through' : '' }}" href="#">

                                        {{-- Title --}}
                                        <span class="fw-semibold">
                                            {{ $msg->title ?? 'No Title' }}
                                        </span>

                                        {{-- Message --}}
                                        <small>
                                            {{ \Illuminate\Support\Str::limit($msg->message, 40) }}
                                        </small>

                                        {{-- Broadcast --}}
                                        @if(is_null($msg->receiver_id))
                                        <small class="text-primary">(Broadcast)</small>
                                        @endif

                                        {{-- Unread --}}
                                        @if(!$msg->is_read && !$msg->deleted_at)
                                        <small class="text-danger">Unread</small>
                                        @endif

                                        {{-- Deleted label --}}
                                        @if($msg->deleted_at)
                                        <small class="text-secondary">Deleted</small>
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
                                    <a class="dropdown-item text-primary text-center" href="{{ route('users.notifications.viewMessages') }}">
                                        View all messages
                                    </a>
                                </li>

                            </ul>
                        </li>

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
                                    <a class="dropdown-item" href="{{ route('applicants.accounts.viewAccount') }}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('applicants.settings.viewSettings') }}">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('applicants.logs.viewLogs') }}">
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

                        <!-- Header -->
                        <h3 class="mb-4 fw-bold text-primary">Account Settings</h3>
                        <p class="text-muted">Manage your preferences and account options.</p>

                        <div class="card shadow-sm border-0">
                            <div class="card-body">

                                <!-- Profile Section -->
                                <h5 class="fw-bold mb-3">Profile Settings</h5>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">Edit Profile</h6>
                                        <small class="text-muted">Update your personal information</small>
                                    </div>
                                    <a href="{{ route('applicants.accounts.updateAccount')}}" class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                </div>

                                <hr>

                                <!-- Security Section -->
                                <h5 class="fw-bold mb-3">Security</h5>

                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}

                                    <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="alert">
                                    </button>
                                </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center mb-3">



                                    <div>
                                        <h6 class="mb-0">Change Password</h6>
                                        <small class="text-muted">Keep your account secure</small>
                                    </div>

                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#changePasswordModal">
                                        Update
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="changePasswordModal" tabindex="-1"
                                    aria-labelledby="changePasswordModalLabel" aria-hidden="true">

                                    @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        {{ session('success') }}

                                        <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="alert">
                                        </button>
                                    </div>
                                    @endif

                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="changePasswordModalLabel">
                                                    Change Password
                                                </h5>

                                                <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal">
                                                </button>
                                            </div>

                                            <form action="{{ route('applicants.settings.passwordUpdate') }}"
                                                method="POST">

                                                @csrf
                                                @method('PUT')

                                                <div class="modal-body">

                                                    @if($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul class="mb-0">
                                                            @foreach($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif


                                                    {{-- Current Password --}}
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            Current Password
                                                        </label>

                                                        <div class="input-group">
                                                            <input type="password"
                                                                name="current_password"
                                                                id="current_password"
                                                                class="form-control"
                                                                required>

                                                            <button type="button"
                                                                class="btn btn-outline-secondary"
                                                                onclick="togglePassword('current_password', this)">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>


                                                    {{-- New Password --}}
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            New Password
                                                        </label>

                                                        <div class="input-group">
                                                            <input type="password"
                                                                name="password"
                                                                id="password"
                                                                class="form-control"
                                                                required>

                                                            <button type="button"
                                                                class="btn btn-outline-secondary"
                                                                onclick="togglePassword('password', this)">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>


                                                    {{-- Confirm New Password --}}
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            Confirm New Password
                                                        </label>

                                                        <div class="input-group">
                                                            <input type="password"
                                                                name="password_confirmation"
                                                                id="password_confirmation"
                                                                class="form-control"
                                                                required>

                                                            <button type="button"
                                                                class="btn btn-outline-secondary"
                                                                onclick="togglePassword('password_confirmation', this)">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Cancel
                                                    </button>

                                                    <button type="submit"
                                                        class="btn btn-danger">
                                                        Update Password
                                                    </button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <!-- Notifications Section -->
                                <h5 class="fw-bold mb-3">Notifications</h5>

                                <!-- Email Notification -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">Email Notifications</h6>
                                        <small class="text-muted">Receive updates via email</small>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="emailNotif" checked>
                                    </div>
                                </div>

                                <!-- SMS Notification -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">SMS Notifications</h6>
                                        <small class="text-muted">Get alerts via SMS</small>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="smsNotif">
                                    </div>
                                </div>

                                <!-- App Notification -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">App Notifications</h6>
                                        <small class="text-muted">Enable in-app alerts</small>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="appNotif" checked>
                                    </div>
                                </div>

                                <hr>

                                <!-- Wallet Section -->
                                <h5 class="fw-bold mb-3">Wallet Settings</h5>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">View Wallet</h6>
                                        <small class="text-muted">Check your balance and activity</small>
                                    </div>
                                    <a href="" class="btn btn-sm btn-success">
                                        Open
                                    </a>
                                </div>

                                <!-- Auto Interest Toggle -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">Auto Interest Update</h6>
                                        <small class="text-muted">Automatically update interest</small>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="autoInterest" checked>
                                    </div>
                                </div>


                                <hr>

                                <h5 class="fw-bold mb-3">Dark Mode Settings</h5>
                                <!-- Dark Mode -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">Dark Mode</h6>
                                        <small class="text-muted">Switch to dark theme</small>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="darkModeToggle">
                                    </div>
                                </div>

                                <hr>

                                <h5 class="fw-bold mb-3">About Sections</h5>
                                <!-- Dark Mode -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">About</h6>
                                        <small class="text-muted">Learn more about this application</small>
                                    </div>

                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#aboutModal">
                                        View
                                    </button>
                                </div>

                                <!-- About Modal -->
                                <div class="modal fade" id="aboutModal" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">About This App</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <p><strong>Application Name:</strong> Impoks Management System</p>
                                                <p><strong>Version:</strong> 1.0.0</p>
                                                <p><strong>Description:</strong> This system helps users manage their accounts, wallets, and notifications efficiently.</p>
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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