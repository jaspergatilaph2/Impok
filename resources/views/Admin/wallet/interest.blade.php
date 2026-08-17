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
                <li class="menu-item {{ $ActiveTabMenu === 'View' ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-wallet"></i>
                        <div data-i18n="Layouts">Wallet Management</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item ">
                            <a href="{{ route('users.wallet.viewCashIn') }}" class="menu-link">
                                <div data-i18n="Without navbar">View user balance</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('users.wallet.viewAmount') }}" class="menu-link">
                                <div data-i18n="Without navbar">View cash in transactions</div>
                            </a>
                        </li>

                        <li class="menu-item {{ $SubActiveTab === 'interest' ? 'active' : '' }}">
                            <a href="{{ route('users.wallet.viewInterest') }}" class="menu-link">
                                <div data-i18n="Without navbar">View interest</div>
                            </a>
                        </li>

                        <li class="menu-item {{ $SubActiveTab === 'view' ? 'active' : '' }}">
                            <a href="{{ route('users.wallet.viewLoans') }}" class="menu-link">
                                <div data-i18n="Without navbar">View loans transactions</div>
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
                <li class="menu-item ">
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
                            <a href="{{ route('users.accounts.updateAccounts') }}" class="menu-link">
                                <div data-i18n="Notifications">Update Account</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('users.accounts.viewSettings') }}" class="menu-link">
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
                            <a href="{{ route('admin.logs.viewLogs')}}" class="menu-link">
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
                                    <a class="dropdown-item" href="{{route('users.accounts.viewAccounts')}}">
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Interest Management /</span>Interest
                    </h4>

                    <div class="row">
                        <div class="col-md-12">

                            <!-- NAV -->
                            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                <li class="nav-item">
                                    <a class="nav-link active" href="javascript:void(0);">
                                        <i class="bx bx-group me-1"></i> User List Interest
                                    </a>
                                </li>
                            </ul>

                            <!-- CARD -->
                            <div class="card mb-4">
                                <h5 class="card-header">User List Interest</h5>
                                <hr class="my-0" />

                                <div class="card-body">

                                    <h5 class="mb-3 fw-bold">Users Interest</h5>

                                    <!-- SUCCESS MESSAGE -->
                                    @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="bx bx-check-circle me-1"></i>
                                        {{ session('success') }}

                                        <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="alert"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    @endif

                                    <!-- ERROR MESSAGE -->
                                    @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bx bx-error-circle me-1"></i>

                                        <ul class="mb-0 ps-3">
                                            @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                        <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="alert"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    @endif

                                    <!-- SEARCH -->
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bx bx-search"></i>
                                            </span>
                                            <input type="text" id="userSearch" class="form-control"
                                                placeholder="Search user by name or email...">
                                        </div>
                                    </div>

                                    <div class="table-responsive">

                                        <table class="table table-hover align-middle">

                                            <thead>
                                                <tr>
                                                    <th>Profile</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse($users as $user)
                                                <tr>

                                                    <!-- PROFILE -->
                                                    <td>
                                                        <img src="{{ $user->profile_information && $user->profile_information->profile_picture
                    ? asset('storage/' . $user->profile_information->profile_picture)
                    : ($user->avatar
                        ? asset('storage/' . $user->avatar)
                        : asset('sneat/img/avatars/1.png')) }}"
                                                            width="45"
                                                            height="45"
                                                            class="rounded-circle">
                                                    </td>

                                                    <!-- NAME -->
                                                    <td class="user-name">{{ $user->name }}</td>

                                                    <!-- EMAIL -->
                                                    <td class="user-email">{{ $user->email }}</td>

                                                    <!-- ROLE -->
                                                    <td>{{ $user->role }}</td>

                                                    <!-- ACTION -->
                                                    <td>
                                                        <button class="btn btn-sm btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#interestModal{{ $user->id }}">
                                                            Interest
                                                        </button>
                                                    </td>

                                                </tr>

                                                <!-- INTEREST MODAL -->
                                                <div class="modal fade"
                                                    id="interestModal{{ $user->id }}"
                                                    tabindex="-1"
                                                    aria-hidden="true">

                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content shadow border-0">

                                                            <!-- MODAL HEADER -->
                                                            <div class="modal-header bg-success text-white">

                                                                <h5 class="modal-title">
                                                                    <i class="bx bx-money me-2"></i>
                                                                    Interest Transaction
                                                                </h5>

                                                                <button type="button"
                                                                    class="btn-close btn-close-white"
                                                                    data-bs-dismiss="modal">
                                                                </button>

                                                            </div>



                                                            <!-- FORM -->
                                                            <form id="interestForm{{ $user->id }}"
                                                                action="{{ route('users.wallet.loansPayment') }}"
                                                                method="POST">

                                                                @csrf

                                                                <div class="modal-body">





                                                                    <!-- USER ID -->
                                                                    <input type="hidden"
                                                                        name="user_id"
                                                                        value="{{ $user->id }}">

                                                                    <!-- USER INFORMATION -->
                                                                    <div class="text-center mb-3">

                                                                        <img src="{{ $user->profile_information && $user->profile_information->profile_picture
                ? asset('storage/' . $user->profile_information->profile_picture)
                : ($user->avatar
                    ? asset('storage/' . $user->avatar)
                    : asset('sneat/img/avatars/1.png')) }}"
                                                                            class="rounded-circle mb-2"
                                                                            width="70"
                                                                            height="70">

                                                                        <h6 class="mb-0">
                                                                            {{ $user->name }}
                                                                        </h6>

                                                                        <small class="text-muted">
                                                                            {{ $user->email }}
                                                                        </small>

                                                                    </div>

                                                                    <hr>

                                                                    <!-- TRANSACTION TYPE -->
                                                                    <div class="mb-3">

                                                                        <label class="form-label">
                                                                            Transaction Type
                                                                        </label>

                                                                        <select name="type"
                                                                            class="form-select"
                                                                            required>

                                                                            <option value="">
                                                                                Select Type
                                                                            </option>

                                                                            <option value="loan_payment">
                                                                                Loan Payment
                                                                            </option>

                                                                        </select>

                                                                    </div>

                                                                    <!-- PAYMENT AMOUNT -->
                                                                    <div class="mb-3">

                                                                        <label class="form-label">
                                                                            Payment Amount
                                                                        </label>

                                                                        <div class="input-group">

                                                                            <span class="input-group-text">
                                                                                ₱
                                                                            </span>

                                                                            <input type="number"
                                                                                name="amount"
                                                                                step="0.01"
                                                                                min="1"
                                                                                class="form-control"
                                                                                placeholder="Enter payment amount"
                                                                                required>

                                                                        </div>

                                                                    </div>

                                                                    <!-- TRANSACTION DATE -->
                                                                    <div class="mb-3">

                                                                        <label class="form-label">
                                                                            Transaction Date
                                                                        </label>

                                                                        <input type="date"
                                                                            name="transaction_date"
                                                                            id="transaction_date_{{ $user->id }}"
                                                                            class="form-control"
                                                                            value="{{ date('Y-m-d') }}"
                                                                            required>

                                                                    </div>

                                                                    <!-- NOTE -->
                                                                    <div class="mb-2">

                                                                        <label class="form-label">
                                                                            Note
                                                                        </label>

                                                                        <input type="text"
                                                                            name="note"
                                                                            class="form-control"
                                                                            placeholder="Optional">

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
                                                                        Submit Payment
                                                                    </button>

                                                                </div>

                                                            </form>

                                                        </div>
                                                    </div>

                                                </div>

                                                @empty

                                                <tr>
                                                    <td colspan="5"
                                                        class="text-center text-muted">
                                                        No users found
                                                    </td>
                                                </tr>

                                                @endforelse
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>



                <!-- / Content -->

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