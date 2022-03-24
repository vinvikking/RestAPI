<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/coreui/css/coreui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/coreui/fontawesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    @stack('css')

    <title>@yield('title', config('coreui.title', __('coreui::coreui.default_title')))</title>
</head>
<body class="c-app">

<div id="sidebar" class="c-sidebar c-sidebar-fixed c-no-transition">
    <script type="application/javascript" src="{{ asset('vendor/coreui/js/toggle_sidebar.js') }}"></script>
    <a class="c-sidebar-brand d-md-down-none" href="{{ url('/') }}">
        <div class="c-sidebar-brand-full">{!! config('coreui.logo') !!}</div>
    </a>

    <ul class="c-sidebar-nav">
        @each('coreui::menu-item', $coreUI->menu(), 'item')
    </ul>
</div>

<div class="c-wrapper">
    <header class="c-header c-header-fixed justify-content-between">
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show">
            <span id="sidebar-toggler" class="c-header-toggler-icon"></span>
        </button>
        <button class="c-header-toggler c-class-toggler mfs-3 d-lg-none" type="button" data-target="#sidebar" data-class="c-sidebar-show">
            <span class="c-header-toggler-icon"></span>
        </button>

        <ul class="c-header-nav mr-4">
            @yield('account', View::make('coreui::account'))
        </ul>

        {{-- Only render the subheader if the current view has *any* breadcrumbs --}}
        @if(View::hasSection('breadcrumb'))
        <div class="c-subheader justify-content-between px-3">
            <div aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
                    @yield('breadcrumb')
                </ol>
            </div>
        </div>
        @endif
    </header>

    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                @yield('body')
            </div>
        </main>
    </div>

    <footer class="c-footer">
        @yield('footer', View::make('coreui::footer'))
    </footer>
</div>

<!-- Perfect Scrollbar first, then CoreUI  -->

<script type="application/javascript" src="{{ asset('vendor/coreui/js/perfect-scrollbar.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('vendor/coreui/js/coreui.bundle.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('vendor/coreui/js/coreui-utilities.min.js') }}"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- Custom JS -->
@stack('js')
</body>
</html>
