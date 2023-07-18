@extends('layouts.dashboard.base')
@section('pageTitle', __('sidebar.users.list'))
@section('custom-style')
    <style>
        .breadcrumb-item+.breadcrumb-item::before {
            float: left;
            padding-right: 0 !important;
            color: #fdfdff !important;
            transform: rotate(180deg);
            margin-right: 5px;
        }
    </style>
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Plugin Css -->
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title">
                                <h4 class="mb-0 font-size-18">{{ __('sidebar.users.list') }}</h4>
                                <ol class="breadcrumb">
                                    {{ Breadcrumbs::render('index') }}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- Start Page-content-Wrapper -->
                <div class="page-content-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('layouts.dashboard.alerts')
                                    <form method="post" action="{{ route('excel') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                           
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="role_id">
                                                        {{ __('labels.users.role') }}
                                                    </label>
                                                    <select name="role_id" class="form-control filter-select select2"
                                                        id="role_id">
                                                        <option></option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id}}">{{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name">
                                                        {{ __('labels.users.languages') }}
                                                    </label>
                                                    <select name="name" class="form-control filter-select select2"
                                                        id="name">
                                                        <option></option>
                                                        @foreach ($Languages as $Language)
                                                            <option value="{{ $Language->name }}">{{ $Language->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <div class="row">
                                            <div class="d-grid mb-3">
                                                <div class="d-grid">
                                                    <button type="submit" id="export-excel"
                                                        data-url="{{ route('excel') }}"
                                                        class="btn btn-secondary filter-select btn-sm waves-effect">
                                                        Export Excel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <input name="search" hidden />
                                    </form>
                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="desktop"></th>
                                                <th scope="col" class="desktop">{{ __('labels.users.languages') }}</th>
                                                <th scope="col" class="desktop">{{ __('labels.users.role') }}</th>
                                                <th scope="col" class="desktop">{{ __('labels.users.name') }}</th>
                                                <th scope="col" class="desktop">{{ __('labels.users.email') }}</th>
                                                <th scope="col" class="desktop">{{ __('labels.users.phone') }}</th>
                                                <th scope="col" class="desktop">{{ __('labels.users.image') }}</th>
                                                <th scope="col" class="desktop">{{ __('labels.users.actions') }}</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- End Page-content -->
            </div>
            <!-- Container-Fluid -->
        </div>
        <!-- End Page-content-wrapper -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        © 2022
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div id="table-url" data-url="{{ route('user_list') }}"></div>
    <!-- end main content-->
@section('custom-script')
<!-- Select2 js -->
<script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select an Option",
            allowClear: true,
        });
    });
</script>
    <!--  datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <!-- Search js -->
    <script src="{{ asset('vendor/user/search.js') }}"></script>
    <!-- List js -->
    <script src="{{ asset('vendor/user/export.js') }}"></script>
    <script src="{{ asset('vendor/user/list.js') }}"></script>
    <script src="{{ asset('vendor/user/delete.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    
@endsection
@endsection
