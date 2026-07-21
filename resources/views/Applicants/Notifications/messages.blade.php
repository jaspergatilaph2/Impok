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

                <li class="menu-item {{ $ActiveTabMenu === 'View' ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-bell"></i>
                        <div data-i18n="Layouts">Notifications</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item {{ $SubActiveTab === 'messages' ? 'active' : '' }}">
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
                            <a href="{{route('applicants.accounts.updateAccount')}}" class="menu-link">
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

                        <!-- 🔔 MESSAGE / INBOX ICON -->
                        <li class="nav-item dropdown me-3">

                            <a class="nav-link dropdown-toggle hide-arrow" href="#" role="button" data-bs-toggle="dropdown">

                                <span class="position-relative">
                                    <i class="bx bx-message-dots bx-sm"></i>

                                    <!-- green online / new message indicator -->
                                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-success rounded-circle"></span>
                                </span>

                            </a>

                            <!-- DROPDOWN MENU -->
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">

                                <li>
                                    <h6 class="dropdown-header">Messages</h6>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-user me-2"></i>
                                        New message from Admin
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-support me-2"></i>
                                        Support reply available
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-bell me-2"></i>
                                        System notification
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item text-primary" href="">
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
                            <i class="fa-solid fa-comments me-2"></i> Messages
                        </h3>

                        <p class="text-muted text-center text-md-start">
                            Your recent activity and updates.
                        </p>

                        <!-- MESSAGE LIST -->
                        <div class="card shadow-sm">
                            <div class="card-body">

                                <h6 class="mb-3">Recent Messages</h6>

                                <ul class="list-group list-group-flush">

                                    @forelse($messages ?? [] as $msg)

                                    <li class="list-group-item d-flex justify-content-between align-items-start 
    {{ optional($msg)->deleted_at ? 'text-muted text-decoration-line-through' : '' }}"
                                        style="cursor:pointer;"

                                        data-bs-toggle="modal"
                                        data-bs-target="#messageModal"

                                        data-title="{{ optional($msg)->title }}"
                                        data-message="{{ optional($msg)->message }}"
                                        data-status="{{ !(optional($msg)->is_read ?? false) ? 'Unread' : 'Read' }}"
                                        data-broadcast="{{ is_null(optional($msg)->receiver_id) ? 'Yes' : 'No' }}">

                                        <div class="me-2">

                                            <strong>{{ optional($msg)->title ?? 'No Title' }}</strong><br>

                                            <small class="text-muted">
                                                {{ \Illuminate\Support\Str::limit(optional($msg)->message, 60) }}
                                            </small><br>

                                            @if(is_null(optional($msg)->receiver_id))
                                            <small class="text-primary">(Broadcast)</small><br>
                                            @endif

                                            @if(optional($msg)->deleted_at)
                                            <small class="text-secondary">Deleted</small><br>
                                            @endif

                                        </div>

                                        <div class="text-end">
                                            @if(!(optional($msg)->is_read ?? false) && !(optional($msg)->deleted_at ?? false))
                                            <span class="text-danger small">Unread</span>
                                            @else
                                            <span class="text-success small">Read</span>
                                            @endif
                                        </div>

                                    </li>

                                    @empty
                                    <li class="list-group-item text-center text-muted">
                                        No messages available
                                    </li>
                                    @endforelse

                                </ul>

                                <div class="modal fade" id="messageModal" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle">Message Title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <p id="modalMessage">Full message content here...</p>

                                                <hr>

                                                <small>
                                                    <strong>Status:</strong> <span id="modalStatus"></span><br>
                                                    <strong>Broadcast:</strong> <span id="modalBroadcast"></span>
                                                </small>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- QUICK ACTIONS -->
                        <!-- <div class="card shadow-sm mt-4">
                            <div class="card-body">
                                <h5 class="fw-bold mb-3">
                                    <i class="fa-solid fa-bolt text-success me-2"></i> Quick Actions
                                </h5>

                                <div class="list-group">

                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i>
                                        View Transactions
                                    </a>

                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i class="fa-solid fa-wallet me-2 text-success"></i>
                                        Wallet Balance
                                    </a>

                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i class="fa-solid fa-chart-line me-2 text-warning"></i>
                                        Interest
                                    </a>

                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i class="fa-solid fa-file-invoice-dollar me-2 text-danger"></i>
                                        Loans
                                    </a>

                                    <a href="#" class="list-group-item list-group-item-action">
                                        <i class="fa-solid fa-bell me-2 text-info"></i>
                                        Notifications
                                    </a>

                                </div>
                            </div>
                        </div> -->

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