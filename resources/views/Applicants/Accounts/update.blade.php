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
                    <a href="" class="menu-link">
                        <i class="menu-icon fa-solid fa-bell"></i>
                        <div data-i18n="Analytics">Notification</div>
                    </a>
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
                <li class="menu-item {{ $ActiveTabMenu === 'account' ? 'active' : '' }}">
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
                        <li class="menu-item {{ $SubActiveTab === 'update' ? 'active' : '' }}">
                            <a href="" class="menu-link">
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                <li class="nav-item">
                                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                                </li>
                            </ul>

                            <div class="card mb-4">
                                <h5 class="card-header">Profile Details</h5>
                                <hr class="my-0" />

                                {{-- Success Message --}}
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <div class="card-body">

                                    {{-- Validation Errors --}}
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <form action="{{ route('applicants.accounts.updatedAccount') }}"
                                        method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')


                                        <div class="mb-3 text-center">
                                            <!-- Clickable Avatar -->
                                            <img id="uploadedAvatar"
                                                src="{{ Auth::user()->avatar 
            ? asset('storage/' . Auth::user()->avatar) 
            : asset('sneat/img/avatars/1.png') }}"
                                                class="d-block rounded mt-2 mx-auto"
                                                width="100"
                                                height="100"
                                                style="cursor: pointer;"
                                                onclick="openImagePreview(this.src)">

                                            <label class="form-label mt-2">Profile Picture</label>

                                            <!-- Upload -->
                                            <input type="file"
                                                name="avatar"
                                                class="form-control"
                                                accept="image/*"
                                                onchange="previewImage(event)">
                                        </div>

                                        <!-- Modal Preview -->
                                        <div id="imagePreviewModal"
                                            style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
            background:rgba(0,0,0,0.8); z-index:9999; justify-content:center; align-items:center;">

                                            <span onclick="closeImagePreview()"
                                                style="position:absolute; top:20px; right:30px; color:white; font-size:30px; cursor:pointer;">
                                                &times;
                                            </span>

                                            <img id="previewImg" style="max-width:90%; max-height:90%; border-radius:10px;">
                                        </div>

                                        <!-- USER INFO -->
                                        <div class="mb-3">
                                            <label class="form-label">User Name</label>
                                            <input type="text"
                                                class="form-control"
                                                name="name"
                                                value="{{ old('name', Auth::user()->name) }}"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email"
                                                class="form-control"
                                                name="email"
                                                value="{{ old('email', Auth::user()->email) }}"
                                                required>
                                        </div>

                                        <hr>

                                        <!-- PROFILE INFORMATION HEADER -->
                                        <div class="mb-3">
                                            <h5 class="fw-bold mb-1">Profile Information</h5>
                                            <small class="text-muted">Update your personal details below</small>
                                        </div>

                                        <!-- PROFILE INFO -->
                                        @php
                                        $profile = Auth::user()->profile;
                                        @endphp

                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text"
                                                class="form-control"
                                                name="first_name"
                                                value="{{ old('first_name', $profile->first_name ?? '') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text"
                                                class="form-control"
                                                name="last_name"
                                                value="{{ old('last_name', $profile->last_name ?? '') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="text"
                                                class="form-control"
                                                name="phone"
                                                value="{{ old('phone', $profile->phone ?? '') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Birthdate</label>
                                            <input type="date"
                                                class="form-control"
                                                name="birthdate"
                                                value="{{ old('birthdate', $profile->birthdate ?? '') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text"
                                                class="form-control"
                                                name="address"
                                                value="{{ old('address', $profile->address ?? '') }}">
                                        </div>

                                        <hr>


                                        <!-- BUTTON -->
                                        <button type="submit" class="btn btn-primary">
                                            Update Profile
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content wrapper -->
            </div>

            <!-- Footer Section -->
            <footer class="content-footer footer bg-footer-theme mt-4">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column text-center text-md-start">
                    <div class="mb-2 mb-md-0">
                        © <script>
                            document.write(new Date().getFullYear());
                        </script>,
                        <span class="fw-bold text-primary">Building Permit Management System</span>
                    </div>
                    <div>
                        <a href="#" class="footer-link me-3">Documentation</a>
                        <a href="#" class="footer-link me-3">Support</a>
                        <a href="#" class="footer-link">Contact</a>
                    </div>
                </div>
            </footer>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    @endsection