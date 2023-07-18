@extends('layouts.dashboard.base')
@section('pageTitle', __('sidebar.leads.import'))
@section('custom-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title">
                                <h4 class="mb-0 font-size-18">{{ __('sidebar.leads.main') }}</h4>
                                <ol class="breadcrumb">
                                    {{ Breadcrumbs::render('leads.import') }}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- Start Page-content-Wrapper -->
                <div class="page-content-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{__('sidebar.leads.import')}}</h4>
                                    @include('layouts.dashboard.alerts')
                                    <form class="needs-validation"
                                        id="uploadLeads"
                                        action="{{ route('leads.import.file') }}"
                                        method="post"
                                        enctype="multipart/form-data"
                                        novalidate>
                                    @csrf
                                        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                            <div class="form-group">
                                                <div class="custom-file text-left">
                                                        <input type="file" class="custom-file-input needs-validation" id="customFile" name="filename"
                                                        required>
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                        <div class="invalid-feedback">
                                                            Please provide a {{__('labels.leads.file')}}.
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a class="btn btn-primary mt-2" href="{{route('getleadfile', 'Property_Platform.xlsx')}}">Download Leads File</a>
                                            </div>
                                            <div class="form-group">
                                            <button class="btn btn-primary" type="submit">{{__('buttons.leads.import')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- end row -->

                </div>
                <!-- End Page-content -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


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
        <!-- validation init -->
        <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
        <!-- parsley plugin -->
        <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>
        <!-- -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        
        <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
              var fileName = $(this).val().split("\\").pop();
              $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script> 
    @endsection
@endsection
