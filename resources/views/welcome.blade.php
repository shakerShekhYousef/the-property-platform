@extends('layouts.dashboard.base')
@section('pageTitle', __('home.title'))
@section('content')
<!-- Begin page -->
    <div id="layout-wrapper">
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title">
                                    <h4 class="mb-0 font-size-18">{{ __('home.dashboard') }}</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">{{ __('home.welcome') }}</li>
                                    </ol>
                                </div>

                                <div class="state-information d-none d-sm-block">
                                    <div class="state-graph">
                                        <div id="header-chart-1"></div>
                                        <div class="info">{{ __('home.balance') }} $ 2,317</div>
                                    </div>
                                    <div class="state-graph">
                                        <div id="header-chart-2"></div>
                                        <div class="info">{{ __('home.itemsold') }} 1230</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Start page content-wrapper -->
                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary mini-stat position-relative">
                                    <div class="card-body">
                                        <div class="mini-stat-desc">
                                            <h5 class="text-uppercase verti-label font-size-16 text-white-50">
                                                {{ __('home.order') }}
                                            </h5>
                                            <div class="text-white">
                                                <h5 class="text-uppercase font-size-16 text-white-50">
                                                    {{ __('home.order') }}</h5>
                                                <h3 class="mb-3 text-white">1,587</h3>
                                                <div class="">
                                                    <span class="badge bg-light text-info"> +11% </span> <span
                                                        class="ms-2">{{ __('home.from_previous_period') }}</span>
                                                </div>
                                            </div>
                                            <div class="mini-stat-icon">
                                                <i class="mdi mdi-cube-outline display-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- end page-content-wrapper-->

                </div>
                <!-- Container-fluid -->
            </div>
            <!-- End Page-content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> ©</span>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
<!-- END layout-wrapper -->
@endsection

