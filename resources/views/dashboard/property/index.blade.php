@extends('layouts.dashboard.base')
@section('pageTitle', __('sidebar.properties.main'))
@section('custom-style')
    <!-- DataTables -->
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}"
          rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"
          rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
          rel="stylesheet"
          type="text/css" />
    <!-- Plugin Css -->
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
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
                                <h4 class="mb-0 font-size-18">{{__('sidebar.properties.main')}}</h4>
                                <ol class="breadcrumb">
                                    {{ Breadcrumbs::render('properties_list') }}
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
                                    <form action="{{route('export_excel')}}" method="post">
                                        @csrf
                                        @method("POST")
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="property_type_id">
                                                        {{__('labels.properties.property_type')}}
                                                    </label>
                                                    <select name="property_type_id"
                                                            class="form-control filter-select select2"
                                                            id="property_type_id"
                                                    >
                                                        <option></option>
                                                        @foreach($types as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="furniture_type_id">
                                                        {{__('labels.properties.furniture_type')}}
                                                    </label>
                                                    <select name="furniture_type_id"
                                                            class="form-control filter-select select2"
                                                            id="furniture_type_id">
                                                        <option></option>
                                                        @foreach($furnitureTypes as $types)
                                                            <option value="{{$types->id}}">{{$types->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label"  for="property_category_id">
                                                        {{__('labels.properties.property_category')}}
                                                    </label>
                                                    <select name="property_category_id"
                                                            class="form-control filter-select select2"
                                                            id="property_category_id">
                                                        <option></option>
                                                        @foreach($propertyCategories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="property_status_id">
                                                        {{__('labels.properties.property_status')}}
                                                    </label>
                                                    <select name="property_status_id"
                                                            class="form-control filter-select select2"
                                                            id="property_status_id"
                                                    >
                                                        <option></option>
                                                        @foreach($propertyStatuses as $status)
                                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="country_id">
                                                        {{__('labels.properties.country')}}
                                                    </label>
                                                    <select  name="country_id"
                                                             class="form-control select2"
                                                             id="country_id"
                                                    >
                                                        <option></option>
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="city_id">
                                                        {{__('labels.properties.city')}}
                                                    </label>
                                                    <select  name="city_id"
                                                             class="form-control filter-select select2"
                                                             id="city_id"
                                                             data-dependent="countries"
                                                    >
                                                        <option disabled selected>
                                                            Please select a country first
                                                        </option>
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="d-grid mb-3">
                                                <div class="d-grid">
                                                    <button type="submit"
                                                            id="export-excel"
                                                            data-url="{{route('export_excel')}}"
                                                            class="btn btn-secondary filter-select btn-sm waves-effect">
                                                        Export Excel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <input name="search" hidden />
                                    </form>
                                    <table id="datatable"
                                           class="table table-striped table-bordered dt-responsive nowrap"
                                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                             <th scope="col" class="desktop"></th>
                                             <th scope="col" class="desktop">{{__('labels.properties.name')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.properties.makani_number')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.properties.p_number')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.properties.price')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.properties.payment_frequency')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.properties.property_type')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.properties.furniture_type')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.properties.property_category')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.properties.property_status')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.properties.landlord')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.general.actions')}}</th>
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
    <div id="table-url" data-url="{{route('properties_list')}}"></div>
    <div id="search-url" data-url="{{route('get_cities')}}"></div>
    <!-- end main content-->
    @section('custom-script')
        <!--  datatable js -->
        <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        <!-- Datatable init js -->
        <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
        <!-- Search js -->
        <script src="{{asset('assets/admin/js/pages/property/search.js')}}"></script>
        <!-- List js -->
        <script src="{{asset('assets/admin/js/pages/property/list.js')}}"></script>
        <!-- Export js -->
        <script src="{{asset('assets/admin/js/pages/property/export.js')}}"></script>
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
        <!-- Sweet Alerts js -->
        <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <!-- Delete js -->
        <script src="{{asset('assets/admin/js/pages/property/delete.js')}}"></script>
        <script>
            $(document).ready(function (){
                $('input[type="search"]').keyup(function (){
                    var value = $(this).val();
                    $('input[name="search"]').val(value);
                });
            })
        </script>
    @endsection
@endsection
