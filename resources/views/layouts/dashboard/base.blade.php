<!doctype html>
<html lang="en" hidden>

<head>

    <meta charset="utf-8"/>
    <title>@yield('pageTitle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    @include('layouts.dashboard.styles')
    @yield('custom-style')

</head>

<body data-topbar="colored">
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.dashboard.header')

    <!-- ========== Left Sidebar Start ========== -->
    @include('layouts.dashboard.sidebar')
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @yield('content')
    <!-- end main content-->

    <!-- END layout-wrapper -->
    @include('layouts.dashboard.scripts')
    @yield('custom-script')
</body>

</html>
