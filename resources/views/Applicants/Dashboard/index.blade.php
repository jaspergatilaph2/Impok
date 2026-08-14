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
        <li class="menu-item active">
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
              <a href="{{ route('applicants.logs.viewLogs') }}" class="menu-link">
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
            <!-- Welcome Section -->
            <h3 class="mb-4 fw-bold text-primary text-center text-md-start">
              Welcome, {{ auth()->user()->name ?? 'Applicant' }}!
            </h3>
            <p class="text-muted text-center text-md-start">
              Here’s an overview of your application activity.
            </p>

            <!-- Stats Section -->
            <div class="row g-4">

              <!-- Wallet Balance -->
              <div class="col-12 col-md-4 col-lg-3">
                <div class="card shadow-sm border-0 h-100 animate__animated animate__bounceIn hover-card">
                  <div class="card-body text-center">
                    <div class="mb-3 text-success">
                      <i class="fa-solid fa-wallet fs-1"></i>
                    </div>
                    <h6 class="text-muted">Wallet Balance</h6>
                    <h2 class="fw-bold">₱ {{ number_format($walletBalance) }}</h2>
                    <small class="text-muted">Your available funds</small>
                  </div>
                </div>
              </div>

              <!-- Total Transactions -->
              <div class="col-12 col-md-4 col-lg-3">
                <div class="card shadow-sm border-0 h-100 animate__animated animate__bounceIn hover-card">
                  <div class="card-body text-center">
                    <div class="mb-3 text-primary">
                      <i class="fa-solid fa-receipt fs-1"></i>
                    </div>
                    <h6 class="text-muted">Transactions</h6>
                    <h2 class="fw-bold">{{ $wallet }}</h2>
                    <small class="text-muted">All time transactions</small>
                  </div>
                </div>
              </div>

              <!-- Pending Transfers -->
              <div class="col-12 col-md-4 col-lg-3">
                <div class="card shadow-sm border-0 h-100 animate__animated animate__bounceIn hover-card">
                  <div class="card-body text-center">
                    <div class="mb-3 text-warning">
                      <i class="fa-solid fa-clock fs-1"></i>
                    </div>
                    <h6 class="text-muted">Next Impoks Date</h6>
                    <h2 class="fw-bold">
                      @if(!empty($nextdate))
                      {{ $nextdate }}
                      @else
                      No date has been updated
                      @endif
                    </h2>
                    <small class="text-muted">Next Impoks</small>

                    @if(!empty($nextdate))
                    <div class="mt-2 fw-semibold text-warning"
                      data-countdown
                      data-date="{{ \Carbon\Carbon::parse($nextdate)->format('Y-m-d H:i:s') }}">
                      Calculating...
                    </div>
                    @endif
                  </div>
                </div>
              </div>

              <!-- Incoming Money -->
              <!-- <div class="col-12 col-md-4 col-lg-3">
                <div class="card shadow-sm border-0 h-100">
                  <div class="card-body text-center">
                    <div class="mb-3 text-info">
                      <i class="fa-solid fa-arrow-down fs-1"></i>
                    </div>
                    <h6 class="text-muted">Incoming</h6>
                    <h2 class="fw-bold">400</h2>
                    <small class="text-muted">Received funds</small>
                  </div>
                </div>
              </div> -->

              <!-- Approved Transfers -->
              <div class="col-12 col-md-4 col-lg-3">
                <div class="card shadow-sm border-0 h-100 animate__animated animate__bounceIn hover-card">
                  <div class="card-body text-center">
                    <div class="mb-3 text-success">
                      <i class="fa-solid fa-circle-check fs-1"></i>
                    </div>
                    <h6 class="text-muted">Completed</h6>
                    <h2 class="fw-bold">{{ $wallet }}</h2>
                    <small class="text-muted">Successful transactions</small>
                  </div>
                </div>
              </div>

              <!-- Failed / Rejected -->
              <div class="col-12 col-md-4 col-lg-3">
                <div class="card shadow-sm border-0 h-100 animate__animated animate__bounceIn hover-card">
                  <div class="card-body text-center">
                    <div class="mb-3 text-danger">
                      <i class="fa-solid fa-scale-balanced fs-1"></i>
                    </div>
                    <h6 class="text-muted">Loans</h6>
                    <h2 class="fw-bold">&#8369; {{ number_format($totalAmount) }}</h2>
                    <small class="text-muted">Loans transactions</small>
                  </div>
                </div>
              </div>

            </div>

            <!-- Quick Actions -->
            <div class="row mt-4">
              <div class="col-12">
                <div class="card shadow-sm">
                  <div class="card-body text-center text-md-start">
                    <h5 class="fw-bold mb-3">
                      <i class="fa-solid fa-bolt text-success me-2"></i> Quick Actions
                    </h5>

                    <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center justify-content-md-start">
                      <!-- Apply for Permit -->
                      <div class="flex-fill">
                        <a href="" class="btn btn-primary w-100">
                          <i class="fa-solid fa-clock-rotate-left me-1"></i> Transaction
                        </a>
                      </div>

                      <!-- My Applications (Dropdown) -->
                      <div class="dropdown flex-fill dropdown-hover">
                        <button class="btn btn-outline-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="menu-icon fa-solid fa-wallet"></i> My Wallet
                        </button>
                        <ul class="dropdown-menu w-100">

                          <li>
                            <a class="dropdown-item" href="{{ route('applicants.wallet.viewWallet') }}">
                              <i class="menu-icon fa-solid fa-scale-balanced me-1"></i> Balance
                            </a>
                          </li>

                          <li>
                            <a class="dropdown-item" href="{{ route('applicants.wallet.viewInterest') }}">
                              <i class="menu-icon fa-solid fa-chart-line me-1"></i> Interest
                            </a>
                          </li>

                          <li>
                            <a class="dropdown-item" href="{{ route('applicants.wallet.loans') }}">
                              <i class="menu-icon fa-solid fa-file-invoice-dollar me-1"></i> Loans
                            </a>
                          </li>

                        </ul>
                      </div>

                      <div class="flex-fill">
                        <a href="{{ route('users.notifications.viewMessages') }}" class="btn btn-outline-warning w-100">
                          <i class="fa-solid fa-bell me-1"></i> View Notifications
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
              <a href="#" class="footer-link me-3" data-bs-toggle="modal" data-bs-target="#documentationModal">
                Documentation
              </a>

              <!-- Documentation Modal -->
              <div class="modal fade" id="documentationModal" tabindex="-1" aria-labelledby="documentationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content border-0 shadow">

                    <div class="modal-header">
                      <h5 class="modal-title" id="documentationModalLabel">
                        Documentation
                      </h5>

                      <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                      </button>
                    </div>

                    <div class="modal-body">

                      <h6 class="fw-bold">Impoks Management System</h6>

                      <p class="text-muted">
                        Welcome to the Impoks Management System documentation.
                        This section provides basic information about using the system.
                      </p>

                      <hr>

                      <h6 class="fw-bold">Getting Started</h6>
                      <p>
                        Log in using your registered account credentials to access
                        the features and services available to you.
                      </p>

                      <h6 class="fw-bold">Account</h6>
                      <p>
                        You can update your profile information, change your password,
                        and manage your account settings from the Account Settings page.
                      </p>

                      <h6 class="fw-bold">Application</h6>
                      <p>
                        Applicants can view their application information, monitor
                        application status, and access available system services.
                      </p>

                    </div>

                    <div class="modal-footer">
                      <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Close
                      </button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- End of Modal -->


              <a href="#" class="footer-link me-3"
                data-bs-toggle="modal"
                data-bs-target="#supportModal">
                Support
              </a>

              <!-- Modal -->

              <div class="modal fade" id="supportModal" tabindex="-1"
                aria-labelledby="supportModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content border-0 shadow">

                    <div class="modal-header">
                      <h5 class="modal-title" id="supportModalLabel">
                        Support
                      </h5>

                      <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                      </button>
                    </div>

                    <div class="modal-body">

                      <p class="text-muted">
                        Need help? Please contact our support team using
                        the information below.
                      </p>

                      <div class="mb-3">
                        <strong>Email</strong>
                        <p class="mb-0 text-muted">
                          jaspergatila2@gmail.com
                        </p>
                      </div>

                      <div class="mb-3">
                        <strong>Phone</strong>
                        <p class="mb-0 text-muted">
                          +63 900 000 0000
                        </p>
                      </div>

                      <div>
                        <strong>Support Hours</strong>
                        <p class="mb-0 text-muted">
                          Monday – Friday, 8:00 AM – 5:00 PM
                        </p>
                      </div>

                    </div>

                    <div class="modal-footer">
                      <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Close
                      </button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- End Of Modal -->


              <a href="#" class="footer-link"
                data-bs-toggle="modal"
                data-bs-target="#contactModal">
                Contact
              </a>

              <!-- Modal -->
              <div class="modal fade" id="contactModal" tabindex="-1"
                aria-labelledby="contactModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content border-0 shadow">

                    <div class="modal-header">
                      <h5 class="modal-title" id="contactModalLabel">
                        Contact Us
                      </h5>

                      <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                      </button>
                    </div>

                    <div class="modal-body">

                      <p class="text-muted">
                        If you have any questions or concerns, you may
                        contact us through the information below.
                      </p>

                      <div class="mb-3">
                        <strong>Office</strong>
                        <p class="mb-0 text-muted">
                          Impoks Management System
                        </p>
                      </div>

                      <div class="mb-3">
                        <strong>Email</strong>
                        <p class="mb-0 text-muted">
                          info@example.com
                        </p>
                      </div>

                      <div class="mb-3">
                        <strong>Phone</strong>
                        <p class="mb-0 text-muted">
                          +63 900 000 0000
                        </p>
                      </div>

                      <div>
                        <strong>Address</strong>
                        <p class="mb-0 text-muted">
                          Philippines
                        </p>
                      </div>

                    </div>

                    <div class="modal-footer">
                      <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Close
                      </button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- End Of Modal -->
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