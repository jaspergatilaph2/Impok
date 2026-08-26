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
                <li class="menu-item {{ $ActiveTabMenu === 'wallet' ? 'active' : '' }}">
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

                        <li class="menu-item {{ $SubActiveTab === 'loan-interest' ? 'active' : '' }}">
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
                        <i class="menu-icon fa-solid fa-file"></i>
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
                <li class="menu-item">
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
                            <a href="{{ route('applicants.accounts.updateAccount') }}" class="menu-link">
                                <div data-i18n="Notifications">Update Account</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('applicants.settings.viewSettings') }}" class="menu-link">
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
                                    <a class="dropdown-item" href="{{ route('applicants.accounts.viewAccount')}}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('applicants.settings.viewSettings')}}">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('applicants.logs.viewLogs')}}">
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

                    <!-- PAGE HEADER -->
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4">
                        <div>
                            <h4 class="fw-bold mb-1">
                                <span class="text-muted fw-light">Loan Management /</span>
                                Loan Interest
                            </h4>

                            <p class="text-muted mb-0">
                                Review your loan interest, payments, principal contributions, and transaction history.
                            </p>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">

                            <!-- PAGE NAVIGATION -->
                            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                                <li class="nav-item">
                                    <a class="nav-link active" href="javascript:void(0);">
                                        <i class="bx bx-line-chart me-1"></i>
                                        Loan Interest Overview
                                    </a>
                                </li>
                            </ul>


                            <!-- ========================================= -->
                            <!-- FINANCIAL SUMMARY -->
                            <!-- ========================================= -->

                            <div class="row g-4 mb-4">

                                <!-- Current Interest -->
                                <div class="col-12 col-sm-6 col-xl-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">

                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <span class="text-muted small fw-semibold text-uppercase">
                                                        Current Interest
                                                    </span>
                                                </div>

                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-label-warning">
                                                        <i class="bx bx-line-chart fs-4"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <h4 class="fw-bold mb-1 text-warning">
                                                ₱ {{ number_format($interest ?? 0, 2) }}
                                            </h4>

                                            <small class="text-muted">
                                                Outstanding interest balance
                                            </small>

                                        </div>
                                    </div>
                                </div>


                                <!-- Paid Interest -->
                                <div class="col-12 col-sm-6 col-xl-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">

                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <span class="text-muted small fw-semibold text-uppercase">
                                                        Paid Interest
                                                    </span>
                                                </div>

                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-label-success">
                                                        <i class="bx bx-check-circle fs-4"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <h4 class="fw-bold mb-1 text-success">
                                                ₱ {{ number_format($paidInterest ?? 0, 2) }}
                                            </h4>

                                            <small class="text-muted">
                                                Total interest payments made
                                            </small>

                                        </div>
                                    </div>
                                </div>


                                <!-- Remaining Interest -->
                                <div class="col-12 col-sm-6 col-xl-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">

                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <span class="text-muted small fw-semibold text-uppercase">
                                                        Remaining Interest
                                                    </span>
                                                </div>

                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-label-danger">
                                                        <i class="bx bx-time-five fs-4"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <h4 class="fw-bold mb-1 text-danger">
                                                ₱ {{ number_format($remainingInterest ?? 0, 2) }}
                                            </h4>

                                            <small class="text-muted">
                                                Interest still due
                                            </small>

                                        </div>
                                    </div>
                                </div>


                                <!-- Paid Principal -->
                                <div class="col-12 col-sm-6 col-xl-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">

                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <span class="text-muted small fw-semibold text-uppercase">
                                                        Paid Principal
                                                    </span>
                                                </div>

                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-label-info">
                                                        <i class="bx bx-money fs-4"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <h4 class="fw-bold mb-1 text-info">
                                                ₱ {{ number_format($paidPrincipal ?? 0, 2) }}
                                            </h4>

                                            <small class="text-muted">
                                                Principal amount paid
                                            </small>

                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- ========================================= -->
                            <!-- TOTAL PAID -->
                            <!-- ========================================= -->

                            <div class="card border-0 shadow-sm mb-4">

                                <div class="card-body">

                                    <div class="row align-items-center">

                                        <div class="col-md-8">

                                            <div class="d-flex align-items-center">

                                                <div class="avatar me-3">
                                                    <span class="avatar-initial rounded bg-label-primary">
                                                        <i class="bx bx-wallet fs-4"></i>
                                                    </span>
                                                </div>

                                                <div>
                                                    <h5 class="mb-1 fw-bold">
                                                        Total Payments
                                                    </h5>

                                                    <p class="text-muted mb-0">
                                                        Total amount paid toward your loan obligations.
                                                    </p>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-4 text-md-end mt-3 mt-md-0">

                                            <h3 class="fw-bold text-primary mb-0">
                                                ₱ {{ number_format($paidAmount ?? 0, 2) }}
                                            </h3>

                                            <small class="text-muted">
                                                Total Paid
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <!-- ========================================= -->
                            <!-- TRANSACTION HISTORY -->
                            <!-- ========================================= -->

                            <div class="card border-0 shadow-sm mb-4">

                                <div class="card-header bg-transparent border-0 pt-4 px-4">

                                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between">

                                        <div>
                                            <h5 class="fw-bold mb-1">
                                                <i class="bx bx-history me-1"></i>
                                                Transaction History
                                            </h5>

                                            <p class="text-muted small mb-0">
                                                Review your recorded loan interest transactions.
                                            </p>
                                        </div>

                                        <!-- REPORT ACTIONS -->
                                        <div class="mt-3 mt-md-0 no-print">

                                            <button
                                                type="button"
                                                onclick="printTable()"
                                                class="btn btn-outline-primary btn-sm me-2">

                                                <i class="bx bx-printer me-1"></i>
                                                Print Report

                                            </button>

                                            <button
                                                type="button"
                                                onclick="downloadPDF()"
                                                class="btn btn-primary btn-sm">

                                                <i class="bx bx-file me-1"></i>
                                                Download PDF

                                            </button>

                                        </div>

                                    </div>

                                </div>


                                <hr class="my-0">


                                <div class="card-body p-4">

                                    <!-- USER IDENTIFICATION -->
                                    <input
                                        type="hidden"
                                        id="userId"
                                        value="{{ str_pad(auth()->user()->id, 3, '0', STR_PAD_LEFT) }}">


                                    <!-- ========================================= -->
                                    <!-- PRINT / PDF REPORT -->
                                    <!-- ========================================= -->

                                    <div id="printArea" class="report-container">

                                        <!-- REPORT HEADER -->
                                        <div class="text-center mb-4">

                                            <h4 class="fw-bold mb-1 report-title">
                                                Loan Interest Transaction Report
                                            </h4>

                                            <p class="text-muted small mb-0">
                                                Generated on {{ now()->format('F d, Y h:i A') }}
                                            </p>

                                        </div>


                                        <!-- CUSTOMER INFORMATION -->
                                        <div class="row g-3 mb-4">

                                            <div class="col-12 col-md-6">

                                                <div class="border rounded p-3 h-100">

                                                    <small class="text-muted d-block mb-1">
                                                        Account Name
                                                    </small>

                                                    <span class="fw-semibold">
                                                        {{ auth()->user()->name ?? 'N/A' }}
                                                    </span>

                                                </div>

                                            </div>


                                            <div class="col-12 col-md-6">

                                                <div class="border rounded p-3 h-100">

                                                    <small class="text-muted d-block mb-1">
                                                        Account ID
                                                    </small>

                                                    <span class="fw-semibold">
                                                        ID-{{ str_pad(auth()->user()->id, 3, '0', STR_PAD_LEFT) }}
                                                    </span>

                                                </div>

                                            </div>


                                            <div class="col-12">

                                                <div class="border rounded p-3">

                                                    <small class="text-muted d-block mb-1">
                                                        Email Address
                                                    </small>

                                                    <span class="fw-semibold">
                                                        {{ auth()->user()->email ?? 'N/A' }}
                                                    </span>

                                                </div>

                                            </div>

                                        </div>


                                        <!-- ========================================= -->
                                        <!-- TRANSACTION TABLE -->
                                        <!-- ========================================= -->

                                        <div class="table-responsive">

                                            <table class="table table-bordered table-hover align-middle mb-0">

                                                <thead class="table-light">

                                                    <tr>

                                                        <th class="text-center">
                                                            Date
                                                        </th>

                                                        <th class="text-center">
                                                            Transaction Type
                                                        </th>

                                                        <th class="text-end">
                                                            Amount
                                                        </th>

                                                    </tr>

                                                </thead>


                                                <tbody>

                                                    @if($transactions->count() > 0)

                                                    @foreach($transactions as $tx)

                                                    <tr>

                                                        <td class="text-center">

                                                            {{ \Carbon\Carbon::parse($tx->transaction_date)->format('M d, Y') }}

                                                        </td>


                                                        <td class="text-center">
                                                            {{ ucwords(str_replace('_', ' ', $tx->type)) }}
                                                        </td>


                                                        <td class="text-end fw-semibold">

                                                            ₱ {{ number_format($tx->total_amount, 2) }}

                                                        </td>

                                                    </tr>

                                                    @endforeach

                                                    @else

                                                    <tr>

                                                        <td
                                                            colspan="3"
                                                            class="text-center text-muted py-5">

                                                            <div class="mb-2">
                                                                <i class="bx bx-receipt fs-1"></i>
                                                            </div>

                                                            <strong class="d-block mb-1">
                                                                No Transactions Found
                                                            </strong>

                                                            <small>
                                                                No loan interest transactions are currently available.
                                                            </small>

                                                        </td>

                                                    </tr>

                                                    @endif

                                                </tbody>

                                            </table>

                                        </div>


                                        <!-- ========================================= -->
                                        <!-- REPORT TOTAL -->
                                        <!-- ========================================= -->

                                        <div class="d-flex justify-content-end mt-4">

                                            <div class="text-end">

                                                <small class="text-muted d-block">
                                                    Total Transaction Amount
                                                </small>

                                                <h5 class="fw-bold mb-0">
                                                    ₱ {{ number_format($total_amount ?? 0, 2) }}
                                                </h5>

                                            </div>

                                        </div>


                                        <!-- ========================================= -->
                                        <!-- SIGNATURES -->
                                        <!-- ========================================= -->

                                        <div class="row mt-5 pt-4">

                                            <div class="col-6 text-center">

                                                <div class="px-3">

                                                    <div class="border-bottom mb-2"
                                                        style="height: 30px;">
                                                    </div>

                                                    <small class="text-muted">
                                                        Prepared By
                                                    </small>

                                                </div>

                                            </div>


                                            <div class="col-6 text-center">

                                                <div class="px-3">

                                                    <div class="border-bottom mb-2"
                                                        style="height: 30px;">
                                                    </div>

                                                    <small class="text-muted">
                                                        Approved By
                                                    </small>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

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