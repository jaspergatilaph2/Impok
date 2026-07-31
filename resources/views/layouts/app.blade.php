<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Impokan Management System</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Links -->
    <link rel="icon" type="image/png" href="{{ asset('images/Logo.png') }}?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('sneat/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('sneat/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('sneat/vendor/css/theme-default.css')}}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('sneat/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('sneat/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('sneat/vendor/css/pages/page-auth.css')}}" />
    <!-- Helpers -->
    <script src="{{asset('sneat/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('sneat/js/config.js')}}"></script>
    <!-- Additional script -->

    <!-- Additional links -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{asset('sneat/css/linegraph.css')}}"> -->

    <!-- css link -->
    <link rel="stylesheet" href="{{asset('css/toggle.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/arrow_toggle.css') }}">
    <link rel="stylesheet" href="{{ asset('sneat/css/darkmode.css') }}">
    <!-- Add this in your layout's <head> section -->
    <!-- Font Awesome CDN (v6) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index-card.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin-report.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hpver.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/seleted-date.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('sneat/vendor/css/pages/page-misc.css') }}">
</head>

<body>
    <div id="app">

        <!-- @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif -->
        <main class="py-4">
            @yield('content')
        </main>


    </div>



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('sneat/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('sneat/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('sneat/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('sneat/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('sneat/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- toogle js -->
    <script src="{{asset('js/toggle.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('sneat/js/main.js')}}"></script>

    <!-- additional script -->
    <script src="{{asset('sneat/js/linegraph.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="{{asset('sneat/js/year.js')}}"></script>
    <script src="{{ asset('js/arrow_toggle.js') }}"></script>
    <script src="{{ asset('sneat/js/dashboards-analytics.js') }}"></script>

    <!-- jQuery (required) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="{{ asset('js/longtitude.js') }}"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- Chart.js for Analytics -->
    <script src="{{ asset('js/analytics-chart.js') }}"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="{{ asset('js/delete-modal.js') }}"></script>
    <script src="{{ asset('js/notif-count.js') }}"></script>
    <script src="{{ asset('js/permits-analytics.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>


    <script src="{{ asset('js/image-inlarger.js') }}"></script>
    <script src="{{ asset('js/user-list.js') }}"></script>
    <script src="{{ asset('js/wallet-user-list.js') }}"></script>
    <script src="{{ asset('js/date-lock.js') }}"></script>
    <script src="{{ asset('js/amount-user-list.js') }}"></script>
    <script src="{{ asset('js/index-card.js') }}"></script>
    <script src="{{ asset('js/all-balance.js') }}"></script>
    <script src="{{ asset('js/admin-report-print.js') }}"></script>
    <script src="{{ asset('js/transaction-calendar.js') }}"></script>
    <script src="{{ asset('js/admin-preview.js') }}"></script>
    <script src="{{ asset('js/loans.js') }}"></script>
    <script src="{{ asset('js/admin-search.js') }}"></script>
    <script src="{{ asset('js/admin-inbox.js') }}"></script>
    <script src="{{ asset('js/users-saveAsPdf.js') }}"></script>
    <script src="{{ asset('js/user-messages.js') }}"></script>
    <script src="{{ asset('js/user-transactions.js') }}"></script>
    <script src="{{ asset('js/user-interest.js') }}"></script>
    <script src="{{ asset('js/users-loans.js') }}"></script>
    <script src="{{ asset('sneat/js/main.js') }}"></script>
</body>

</html>