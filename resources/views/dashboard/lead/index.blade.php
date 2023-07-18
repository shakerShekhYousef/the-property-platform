@extends('layouts.dashboard.base')
@section('pageTitle', __('sidebar.leads.main'))
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
    <style>
        .date_input {
            padding: 0.275rem 0.75rem;
            line-height: 1;
            border: 1px solid #b3b5b7;
        }
    </style>
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
                                <h4 class="mb-0 font-size-18">{{__('sidebar.leads.main')}}</h4>
                                <ol class="breadcrumb">
                                    {{ Breadcrumbs::render('leads.index') }}
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
                                    <form method="post" action="{{route('leads.export.file')}}">
                                        @csrf
                                        @method("POST")
                                        <div class="row">
                                            <h2 class="form-label">
                                                {{ __('labels.leads.location_filters') }}
                                            </h2>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="country_id">
                                                        {{__('labels.leads.country')}}
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
                                                        {{__('labels.leads.city')}}
                                                    </label>
                                                    <select name="city_id"
                                                            class="form-control filter-select select2"
                                                            data-dependent="countries"
                                                            id="city_id">
                                                        <option></option>
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <h2 class="form-label">
                                                {{ __('labels.leads.date_filters') }}
                                            </h2>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="creation_date">
                                                        {{__('labels.leads.creation_date')}}
                                                    </label>
                                                    <input class="form-control filter-select date_input" type="date" 
                                                    name="creation_date"  id="creation_date" 
                                                    placeholder="Enter a Passport Expiry"
                                                    >
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="start_date">
                                                        {{__('labels.leads.creation_date_range')}}
                                                    </label>
                                                    <input class="form-control filter-select date_input" type="date" 
                                                    name="start_date"  id="start_date" 
                                                    placeholder="Enter a Start Date"
                                                    >
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="end_date">
                                                        {{__('labels.leads.end_date')}}
                                                    </label>
                                                    <input class="form-control filter-select date_input" type="date" 
                                                    name="end_date"  id="end_date" 
                                                    placeholder="Enter an End Date"
                                                    >
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <h2 class="form-label">
                                                {{ __('labels.leads.source_filters') }}
                                            </h2>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="lead_source_id">
                                                        {{__('labels.leads.source')}}
                                                    </label>
                                                    <select name="lead_source_id"
                                                            class="form-control filter-select select2"
                                                            id="lead_source_id" onclick="console.log($(this).val())"
                                                            onchange="console.log('change is firing')">
                                                        <option></option>
                                                        @foreach($sources as $source)
                                                            <option value="{{$source->id}}">{{$source->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="entry_user_id">
                                                        {{__('labels.leads.entered_by')}}
                                                    </label>
                                                    <select name="entry_user_id"
                                                            class="form-control filter-select select2"
                                                            id="entry_user_id">
                                                        <option></option>
                                                        @foreach($users as $user)
                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row"  style="display: none" id="campaign_input">
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="campaign_id">
                                                        {{__('labels.leads.campaign')}}
                                                    </label>
                                                    <select name="campaign_id"
                                                            class="form-control filter-select select2"
                                                            id="campaign_id">
                                                        <option></option>
                                                        @foreach($campaigns as $campaign)
                                                            <option value="{{$campaign->id}}">{{$campaign->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="campaign_utm_source_id">
                                                        {{__('labels.leads.campaign_utm_source')}}
                                                    </label>
                                                    <select name="campaign_utm_source_id"
                                                            class="form-control filter-select select2"
                                                            id="campaign_utm_source_id">
                                                        <option></option>
                                                        @foreach($campaign_sources as $campaign_source)
                                                            <option value="{{$campaign_source->id}}">{{$campaign_source->source_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="campaign_utm_medium_id">
                                                        {{__('labels.leads.campaign_utm_medium')}}
                                                    </label>
                                                    <select name="campaign_utm_medium_id"
                                                            class="form-control filter-select select2"
                                                            id="campaign_utm_medium_id">
                                                        <option></option>
                                                        @foreach($campaign_mediums as $campaign_medium)
                                                            <option value="{{$campaign_medium->id}}">{{$campaign_medium->medium_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="campaign_utm_campaign_id">
                                                        {{__('labels.leads.campaign_utm_campaign')}}
                                                    </label>
                                                    <select name="campaign_utm_campaign_id"
                                                            class="form-control filter-select select2"
                                                            id="campaign_utm_campaign_id">
                                                        <option></option>
                                                        @foreach($campaign_campiagns as $campaign_campiagn)
                                                            <option value="{{$campaign_campiagn->id}}">{{$campaign_campiagn->campaign_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <h2 class="form-label">
                                                {{ __('labels.leads.other_filters') }}
                                            </h2>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="user_id">
                                                        {{__('labels.leads.assigned_agent')}}
                                                    </label>
                                                    <select name="user_id"
                                                            class="form-control filter-select select2"
                                                            id="user_id">
                                                        <option></option>
                                                        @foreach($agent_users as $agent_user)
                                                            <option value="{{$agent_user->id}}">{{$agent_user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="status_id">
                                                        {{__('labels.leads.status')}}
                                                    </label>
                                                    <select name="status_id"
                                                            class="form-control filter-select select2"
                                                            id="status_id">
                                                        <option></option>
                                                        @foreach($statuses as $status)
                                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="type_id">
                                                        {{__('labels.leads.type')}}
                                                    </label>
                                                    <select name="type_id"
                                                            class="form-control filter-select select2"
                                                            id="type_id">
                                                        <option></option>
                                                        @foreach($types as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="has_comment">
                                                        {{__('labels.leads.has_comment')}}
                                                    </label>
                                                    <select name="has_comment"
                                                            class="form-control filter-select select2"
                                                            id="has_comment">
                                                            <option></option>
                                                            <option value="1">True</option>
                                                            <option value="0">False</option>
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="project_id">
                                                        {{__('labels.leads.project_name')}}
                                                    </label>
                                                    <select name="project_id"
                                                            class="form-control filter-select select2"
                                                            id="project_id">
                                                        <option></option>
                                                        @foreach($projects as $project)
                                                            <option value="{{$project->id}}">{{$project->name}}</option>
                                                        @endforeach
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
                                             <th scope="col" class="desktop">{{__('labels.leads.name')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.email')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.mobile_number')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.additional_mobile_number')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.campaign')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.campaign_utm_source')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.campaign_utm_medium')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.campaign_utm_campaign')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.agent_name')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.entered_by')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.source')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.project_name')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.creation_date')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.status')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.type')}}</th>
                                             <th scope="col" class="desktop">{{__('labels.leads.comment')}}</th> 
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
    <div id="table-url" data-url="{{route('leads.pool')}}"></div>
    <div id="search-url" data-url="{{route('leads.get_cities')}}"></div>
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
        <!-- List js -->
        <script src="{{asset('assets/admin/js/pages/lead/list.js')}}"></script>
        <!-- Search js -->
        <script src="{{asset('assets/admin/js/pages/lead/search.js')}}"></script>
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
        <script src="{{asset('assets/admin/js/pages/lead/delete.js')}}"></script>
        <script>
            $(document).ready(function (){
                $('input[type="search"]').keyup(function (){
                    var value = $(this).val();
                    $('input[name="search"]').val(value);
                });
            })
        </script>
         <script>
            $(document).ready(function() {
                $('select[name="lead_source_id"]').on('change', function() {
                    var Source = $(this).val();
                    var campaign_input = document.getElementById("campaign_input");
                    if (Source == 2) {
                        campaign_input.style.display = "flex";
                    $('.form-label').css("display" ,"block");
                    $('.select2-container').css("width" , "100%");
                    
                    } else {
                    text.style.display = "none";
                    }
                });
            });
        </script>
       
    @endsection
@endsection
