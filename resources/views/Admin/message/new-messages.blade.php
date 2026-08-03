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

                <li class="menu-item {{ $ActiveTabMenu === 'View' ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-envelope"></i>
                        <div data-i18n="Layouts">Messages</div>
                    </a>

                    <ul class="menu-sub">

                        <li class="menu-item {{ $SubActiveTab === 'New Message' ? 'active' : '' }}">
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
                            <a href="{{ route('users.transactions.viewAllLoans') }}" class="menu-link">
                                <div data-i18n="Without navbar">All loans transactions</div>
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
                                    <a class="dropdown-item" href="">
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

                        <!-- HEADER -->
                        <h3 class="mb-4 fw-bold text-primary text-center text-md-start">
                            <i class="fa-solid fa-comments me-2"></i> Send Message to Users
                        </h3>

                        <p class="text-muted text-center text-md-start">
                            Create and deliver announcements, updates, or notifications to your users.
                        </p>

                        <!-- MESSAGE CARD -->
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <!-- SUCCESS MESSAGE -->
                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fa-solid fa-circle-check me-1"></i>
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                                @endif

                                <!-- ERROR MESSAGE -->
                                @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation me-1"></i>
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                                @endif

                                <!-- VALIDATION ERRORS -->
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <i class="fa-solid fa-triangle-exclamation me-1"></i>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form action="{{ route('users.messages.new-message') }}" method="POST">
                                    @csrf

                                    <div class="row g-3">

                                        <!-- SELECT USER -->
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Select Recipient</label>
                                            <select name="user_id" class="form-select select2">
                                                <option value="">-- Send to All Users --</option>

                                                @foreach($users as $u)
                                                <option value="{{ $u->id }}">
                                                    {{ ($u->profileInformation->first_name ?? '') . ' ' . ($u->profileInformation->last_name ?? '') }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- MESSAGE TITLE -->
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Subject</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter message subject">
                                        </div>

                                        <!-- MESSAGE BODY -->
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Message</label>
                                            <textarea name="message" rows="5" class="form-control" placeholder="Write your message here..."></textarea>
                                        </div>

                                        <!-- SEND BUTTON -->
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa-solid fa-paper-plane me-1"></i> Send Message
                                            </button>
                                        </div>

                                    </div>

                                </form>

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