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
                <li class="menu-item ">
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

                        <li class="menu-item ">
                            <a href="{{ route('users.wallet.viewAmount') }}" class="menu-link">
                                <div data-i18n="Without navbar">View cash in transactions</div>
                            </a>
                        </li>

                        <li class="menu-item ">
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

                <li class="menu-item {{ $ActiveTabMenu === 'interest' ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-cash-register"></i>
                        <div data-i18n="Layouts">Transactions</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item ">
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

                        <li class="menu-item {{ $SubActiveTab === 'view' ? 'active' : '' }}">
                            <a href="{{ route('users.transactions.viewAllLoans') }}" class="menu-link">
                                <div data-i18n="Without navbar">All loans interest transactions</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('admin.calendar.viewCalendar') }}" class="menu-link">
                                <div data-i18n="Without navbar">Date Of Transactions</div>
                            </a>
                        </li>s
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
                            <a href="{{route('admin.logs.viewLogs')}}" class="menu-link">
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Loan Management /</span>Show User Loan Interest
                    </h4>

                    <div class="row">
                        <div class="col-md-12">

                            <!-- NAV -->
                            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                <li class="nav-item">
                                    <a class="nav-link active" href="javascript:void(0);">
                                        <i class="bx bx-group me-1"></i> Loans Report
                                    </a>
                                </li>
                            </ul>

                            <!-- CARD -->
                            <div class="card mb-4">
                                <h5 class="card-header">User List Loan Interest</h5>
                                <hr class="my-0" />

                                <div class="card-body">

                                    <h5 class="mb-3 fw-bold">Users Loans interest Balance</h5>

                                    <!-- SEARCH -->
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bx bx-search"></i>
                                            </span>
                                            <input type="text" id="userAdminSearch" class="form-control"
                                                placeholder="Search user by name or email...">
                                        </div>
                                    </div>

                                    <!-- PRINT BUTTON -->
                                    <div class="d-flex justify-content-end mb-3 no-print">
                                        <button onclick="printTable()" class="btn btn-primary me-1">
                                            <i class="bx bx-printer"></i> Print
                                        </button>

                                        <button onclick="AllLoansdownloadPDF()" class="btn btn-danger me-1">
                                            <i class="bx bx-download"></i> Download PDF
                                        </button>
                                    </div>

                                    <!-- PRINT AREA -->
                                    <div id="printArea">

                                        <!-- OPTIONAL TITLE FOR PRINT -->
                                        <h5 class="text-center mb-3">Users Loans Balance Report</h5>

                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle">

                                                <thead>
                                                    <tr>
                                                        <th>Profile</th>
                                                        <th>User Name</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Email</th>
                                                        <th>Total Interest</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @forelse($accounts as $user)

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


                                                        <!-- USER NAME -->
                                                        <td class="user-name">
                                                            {{ $user->name }}
                                                        </td>


                                                        <!-- FIRST NAME -->
                                                        <td class="user-first">
                                                            {{ $user->profile_information->first_name ?? 'N/A' }}
                                                        </td>


                                                        <!-- LAST NAME -->
                                                        <td class="user-last">
                                                            {{ $user->profile_information->last_name ?? 'N/A' }}
                                                        </td>


                                                        <!-- EMAIL -->
                                                        <td class="user-email">
                                                            {{ $user->email }}
                                                        </td>


                                                        <!-- INTEREST / VIEW LOANS -->
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-link p-0 text-decoration-none fw-semibold"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#loanDetailsModal{{ $user->id }}">

                                                                ₱ {{ number_format($user->total_amount ?? 0) }}

                                                            </button>

                                                        </td>

                                                    </tr>

                                                    @empty

                                                    <tr>
                                                        <td colspan="6"
                                                            class="text-center text-muted py-4">

                                                            <i class="fa-solid fa-users-slash me-2"></i>
                                                            No users found

                                                        </td>
                                                    </tr>

                                                    @endforelse

                                                </tbody>

                                            </table>


                                            {{-- ========================================================= --}}
                                            {{-- LOAN DETAILS MODALS --}}
                                            {{-- ========================================================= --}}

                                            @foreach($accounts as $user)

                                            <div class="modal fade"
                                                id="loanDetailsModal{{ $user->id }}"
                                                tabindex="-1"
                                                aria-labelledby="loanDetailsModalLabel{{ $user->id }}"
                                                aria-hidden="true">

                                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">

                                                    <div class="modal-content border-0 shadow">


                                                        <!-- HEADER -->
                                                        <div class="modal-header">

                                                            <div>

                                                                <h5 class="modal-title fw-bold"
                                                                    id="loanDetailsModalLabel{{ $user->id }}">

                                                                    <i class="fa-solid fa-money-bill-transfer text-success me-2"></i>

                                                                    Loan Details

                                                                </h5>

                                                                <small class="text-muted">

                                                                    {{ $user->name }}
                                                                    —
                                                                    {{ $user->email }}

                                                                </small>

                                                            </div>

                                                            <button type="button"
                                                                class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                            </button>

                                                        </div>


                                                        <!-- BODY -->
                                                        <div class="modal-body">


                                                            <!-- SUMMARY -->
                                                            <div class="row g-3 mb-4">


                                                                <!-- TOTAL LOAN -->
                                                                <div class="col-12 col-md-4">

                                                                    <div class="card bg-light border-0 h-100">

                                                                        <div class="card-body">

                                                                            <small class="text-muted">
                                                                                Total Loan
                                                                            </small>

                                                                            <h5 class="fw-bold mb-0">

                                                                                ₱ {{ number_format(
                                            $user->total_amount ?? 0
                                        ) }}

                                                                            </h5>

                                                                        </div>

                                                                    </div>

                                                                </div>


                                                                <!-- PAID AMOUNT -->
                                                                <div class="col-12 col-md-4">

                                                                    <div class="card bg-light border-0 h-100">

                                                                        <div class="card-body">

                                                                            <small class="text-muted">
                                                                                Paid Amount
                                                                            </small>

                                                                            <h5 class="fw-bold text-success mb-0">

                                                                                ₱ {{ number_format(
                                            $user->paid_amount ?? 0
                                        ) }}

                                                                            </h5>

                                                                        </div>

                                                                    </div>

                                                                </div>


                                                                <!-- REMAINING BALANCE -->
                                                                <div class="col-12 col-md-4">

                                                                    <div class="card bg-light border-0 h-100">

                                                                        <div class="card-body">

                                                                            <small class="text-muted">
                                                                                Remaining Balance
                                                                            </small>

                                                                            <h5 class="fw-bold text-danger mb-0">

                                                                                ₱ {{ number_format(
                                            max(
                                                0,
                                                ($user->interest ?? 0)
                                                -
                                                ($user->paid_amount ?? 0)
                                            )
                                        ) }}

                                                                            </h5>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <!-- Paid Principal -->
                                                                <div class="col-12 col-md-4">

                                                                    <div class="card bg-light border-0 h-100">

                                                                        <div class="card-body">

                                                                            <small class="text-muted">
                                                                                Paid Principal
                                                                            </small>

                                                                            <h5 class="fw-bold text-info mb-0">

                                                                                ₱ {{ number_format($user->paid_principal ?? 0
                                        ) }}

                                                                            </h5>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>


                                                            <!-- LOAN TABLE -->
                                                            <div class="table-responsive">

                                                                <table class="table table-hover align-middle">

                                                                    <thead class="table-light">

                                                                        <tr>

                                                                            <th>#</th>
                                                                            <th>Loan Amount</th>
                                                                            <th>Interest</th>
                                                                            <th>Total Amount</th>
                                                                            <th>Paid Amount</th>
                                                                            <th>Remaining</th>
                                                                            <th>Paid Principal</th>
                                                                            <th>Status</th>
                                                                            <th>Date</th>

                                                                        </tr>

                                                                    </thead>


                                                                    <tbody>

                                                                        @forelse(
                                                                        $user->loans->where('status', 'approved')
                                                                        as $index => $loan
                                                                        )

                                                                        <tr>

                                                                            <!-- NUMBER -->
                                                                            <td>
                                                                                {{ $index + 1 }}
                                                                            </td>


                                                                            <!-- LOAN AMOUNT -->
                                                                            <td>
                                                                                ₱ {{ number_format(
                                                $loan->amount ?? 0
                                            ) }}
                                                                            </td>


                                                                            <!-- INTEREST -->
                                                                            <td>
                                                                                ₱ {{ number_format(
                                                $loan->interest ?? 0
                                            ) }}
                                                                            </td>


                                                                            <!-- TOTAL AMOUNT -->
                                                                            <td class="fw-semibold">
                                                                                ₱ {{ number_format(
                                                $loan->total_amount ?? 0
                                            ) }}
                                                                            </td>


                                                                            <!-- PAID AMOUNT -->
                                                                            <td class="text-success">
                                                                                ₱ {{ number_format(
                                                $loan->paid_amount ?? 0
                                            ) }}
                                                                            </td>


                                                                            <!-- REMAINING -->
                                                                            <td class="text-danger">

                                                                                ₱ {{ number_format(
                                                max(
                                                    0,
                                                    ($loan->interest ?? 0)
                                                    -
                                                    ($loan->paid_amount ?? 0)
                                                )
                                            ) }}

                                                                            </td>

                                                                            <td class="text-info">
                                                                                ₱ {{ number_format($loan->paid_principal) }}
                                                                            </td>


                                                                            <!-- STATUS -->
                                                                            <td>
                                                                                @if($loan->status === 'approved')

                                                                                Approved

                                                                                @elseif($loan->status === 'pending')

                                                                                Pending

                                                                                @elseif($loan->status === 'paid')

                                                                                Paid

                                                                                @elseif($loan->status === 'rejected')

                                                                                Rejected

                                                                                @else

                                                                                {{ ucfirst($loan->status) }}

                                                                                @endif
                                                                            </td>


                                                                            <!-- DATE -->
                                                                            <td>

                                                                                {{ $loan->transaction_date
                                                ? \Carbon\Carbon::parse(
                                                    $loan->transaction_date
                                                )->format('M d, Y')
                                                : 'N/A'
                                            }}

                                                                            </td>

                                                                        </tr>

                                                                        @empty

                                                                        <tr>

                                                                            <td colspan="8"
                                                                                class="text-center text-muted py-4">

                                                                                <i class="fa-solid fa-folder-open fa-2x mb-2"></i>

                                                                                <br>

                                                                                No approved loans found.

                                                                            </td>

                                                                        </tr>

                                                                        @endforelse

                                                                    </tbody>

                                                                </table>

                                                            </div>

                                                        </div>


                                                        <!-- FOOTER -->
                                                        <div class="modal-footer">

                                                            <button type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal">

                                                                <i class="fa-solid fa-xmark me-1"></i>
                                                                Close

                                                            </button>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            @endforeach
                                        </div>

                                    </div>


                                    <!-- PAGINATION -->
                                    <div class="mt-3 d-flex justify-content-end">
                                        {{ $accounts->links() }}
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