@extends('layouts.dashboard.base')
@section('pageTitle',__('sidebar.users.update'))

@section('custom-style')
    <style>
        .select2-container .select2-selection--single {
            height: 38px !important;
        }
     
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px !important;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            float: left;
            padding-right: 0 !important;
            color: #fdfdff !important;
            transform: rotate(180deg);
            margin-right: 5px;
        }

        .select2-search--inline {
    display: contents; /*this will make the container disappear, making the child the one who sets the width of the element*/
    }

    .select2-search__field:placeholder-shown {
        width: 100% !important; /*makes the placeholder to be 100% of the width while there are no options selected*/
        margin-left: 6px !important;
    }
    .iti--allow-dropdown input, .iti {
    width: 100% !important;
    
}
.iti--allow-dropdown input{
    border: 1px solid #ced4da;
    padding-top: 5px;
    padding-bottom: 5px;
    border-radius: 5px;
}
    </style>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

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
                                <h4 class="mb-0 font-size-18">{{ __('sidebar.users.Reset Password') }}</h4>
                                <ol class="breadcrumb">
                                    {{ Breadcrumbs::render('Reset Password') }}
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
                                  
                                    <form class="needs-validation" id="validation-form"
                                          action="{{ route('createpassword', $user->id) }}"
                                          method="post"
                                          enctype="multipart/form-data"
                                          novalidate>
                                        @csrf
                                        @method("POST")
                                        <div class="row">
                                            <!-- End Row -->
                                             <div class="mb-3 row">
                                                <div class="form-group">
                                                    <label for="Password"
                                                        class="col-md-2 col-form-label">{{ __('labels.users.password') }}</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control @error('password') is-invalid @enderror"
                                                            type="password" name="password" value="{{ old('password') }}"
                                                            id="password" minlength="6"
                                                            placeholder="Enter the Password" required>
                                                        <div class="invalid-feedback">
                                                            {{-- Please enter {{__('labels.users.password')}}. --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                            <div class="mb-3 row">
                                                <div class="form-group">
                                                    <label for="password_confirmation"
                                                        class="col-md-2 col-form-label">{{ __('labels.users.confirm password') }}</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control @error('password') is-invalid @enderror"
                                                            type="password" name="password_confirmation"
                                                            value="{{ old('password_confirmation') }}"
                                                            id="password_confirmation"
                                                            placeholder="Enter the Confirm Password" required>
                                                        <div class="invalid-feedback">
                                                            {{-- Please enter {{__('labels.users.confirm password')}}. --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">{{__('buttons.submitt')}}</button>
                                    </form>
                                    <!-- End Form -->
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
   <!-- end main content-->
@section('custom-script')
<!-- validation init -->
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<!-- parsley plugin -->
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
<!-- Upload image -->
<script src="{{ asset('assets/admin/js/pages/tenant/upload_image.js') }}"></script>
<!-- Select2 js -->
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<!-- intlTelInput js -->
<script src="{{ asset('js/intlTelInput.js') }}"></script>

<script>
    $(function() {
        $('#validation-form').validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password_confirmation: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Password and Password Confirmation must be match"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

@endsection
@endsection