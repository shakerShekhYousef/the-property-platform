@extends('layouts.dashboard.base')
@section('pageTitle', __('sidebar.users.profile'))
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
                                <h4 class="mb-0 font-size-18">{{ __('sidebar.users.profile') }}</h4>
                                <ol class="breadcrumb">
                                    {{ Breadcrumbs::render('profile') }}
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

                                    <h4 class="card-title">{{__('sidebar.users.profile')}}</h4>
                                    <table id="datatable-buttons"
                                           class="table table-striped table-bordered dt-responsive nowrap"
                                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>{{__('labels.users.role')}}</th>
                                            <th>{{__('labels.users.name')}}</th>
                                            <th>{{__('labels.users.email')}}</th>
                                            <th>{{__('labels.users.phone')}}</th>
                                            {{-- <th>{{__('labels.users.languages')}}</th> --}}
                                            <th>{{__('labels.users.image')}}</th>
                                            <th>{{__('labels.users.actions')}}</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach($users as $user) --}}
                                            <tr>
                                                <td>{{$user->role->name}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone_number}}</td>
                                                <td><img style="width:50%" src="\storage\images\employees\image\{{ $user->image }}"></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <a href="{{ route('edit_user', $user['id']) }}" type="button"
                                                                class="fas fa-user-edit"></a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="{{ route('changepass', $user['id']) }}" type="button"
                                                                class="fa fa-key lg"></a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="{{ route('changeimage', $user['id']) }}" type="button"
                                                                class="fa fa-image"></a>
                                                        </div>
                                       
                                                    </div>
                                                </td>
                                              
                                            </tr>
                                            {{-- @endforeach --}}
                                            </tbody>
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
    <!-- end main content-->
    @section('custom-script')
   
        <!-- Required datatable js -->
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
    @endsection
@endsection
