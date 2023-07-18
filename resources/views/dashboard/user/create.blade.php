@extends('layouts.dashboard.base')
@section('pageTitle', __('sidebar.users.create'))
@section('custom-style')
    <!-- Plugin Css -->
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- intlTelInput Css -->
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
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
            display: contents;
            /*this will make the container disappear, making the child the one who sets the width of the element*/
        }

        .select2-search__field:placeholder-shown {
            width: 100% !important;
            /*makes the placeholder to be 100% of the width while there are no options selected*/
            margin-left: 6px !important;
        }

        .iti--allow-dropdown input,
        .iti {
            width: 100% !important;

        }

        .iti--allow-dropdown input {
            border: 1px solid #ced4da;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 5px;
        }
    </style>
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
                                <h4 class="mb-0 font-size-18">{{ __('sidebar.users.create') }}</h4>
                                <ol class="breadcrumb">
                                    {{ Breadcrumbs::render('creat') }}
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
                                    {{-- <h4 class="card-title">Create a new User</h4> --}}
                                    @include('layouts.dashboard.alerts')
                                    <form class="needs-validation" id="validation-form" action="{{ route('creatuser') }}"
                                        method="post" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 row">
                                                <div class="form-group">
                                                    <label class="col-md-2 col-form-label"
                                                        for="validationCustom01">{{ __('labels.users.role') }}</label>
                                                    <div class="col-md-10">
                                                        <select name="role_id"
                                                            class="form-select @error('role_id') is-invalid @enderror"
                                                            aria-label="Default select example" id="role_id" required>
                                                            <option></option>
                                                            @if (Auth::user()->role_id == 3) {
                                                                @foreach ($roles as $role)
                                                                    @if ($role->name == 'Agent')
                                                                        <option value="{{ $role->id }}">
                                                                            {{ $role->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                                }
                                                            @elseif(Auth::user()->role_id == 2)
                                                                {
                                                                @foreach ($roles as $role)
                                                                    @if ($role->name == 'Admin' || $role->name == 'Agent')
                                                                        <option value="{{ $role->id }}">
                                                                            {{ $role->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                                }
                                                            @else
                                                                {
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->id }}">
                                                                        {{ $role->name }}</option>
                                                                @endforeach
                                                                }
                                                            @endif
                                                        </select>
                                                        {{-- <div class="invalid-tooltip"> --}}
                                                        <div class="invalid-feedback">
                                                            {{-- Please enter {{__('labels.users.role')}}. --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="form-group">
                                                    <label for="validationCustom01"
                                                        class="col-md-2 col-form-label">{{ __('labels.users.name') }}</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control @error('name') is-invalid @enderror"
                                                            type="text" name="name" value="{{ old('name') }}"
                                                            id="validationCustom01" placeholder="Enter the Name" required>
                                                        <div class="invalid-feedback">
                                                            {{-- Please enter {{__('labels.users.name')}}. --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End Row -->
                                            <div class="mb-3 row">
                                                <div class="form-group">
                                                    <label for="email"
                                                        class="col-md-2 col-form-label">{{ __('labels.users.email') }}</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control @error('email') is-invalid @enderror"
                                                            type="email" name="email" value="{{ old('email') }}"
                                                            id="email" autocomplete="email" autofocus
                                                            placeholder="Enter the Email" required>
                                                        <div class="invalid-feedback">
                                                            {{-- Please enter {{__('labels.users.email')}}. --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                            <div class="mb-3 row">
                                                <div class="form-group">
                                                    <label class="col-md-2 col-form-label" for="additional_mobile_number">
                                                        {{ __('labels.users.phone') }}
                                                    </label>
                                                    <div class="col-md-10 ">
                                                        <input type="text"
                                                            class="form-control @error('additional_mobile_number') is-invalid @enderror"
                                                            id="additional_mobile_number" pattern="[+]{0,1}[0-9]{8,13}"
                                                            name="phone_number" minlength="9" maxlength="13" value="+971"
                                                            placeholder="Enter the phone" required>
                                                        @error('additional_mobile_number')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                            <div class="mb-3 row">
                                                <div class="form-group">
                                                    <label class="col-md-2 col-form-label"
                                                        for="language">{{ __('labels.users.languages') }}</label>
                                                    <div class="col-md-10">
                                                        <select name="language[]"
                                                            class="form-select @error('language') is-invalid @enderror"
                                                            aria-label="Default select example" id="language" multiple
                                                            required>
                                                            <option></option>
                                                            @foreach ($Languages as $Language)
                                                                {{-- @if ($role->name == 'admin') --}}
                                                                <option value="{{ $Language->id }}">{{ $Language->name }}
                                                                </option>
                                                                {{-- @endif --}}
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {{-- Please enter {{__('labels.users.languages')}}. --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                            <!-- End Row -->
                                            <div class="mb-3 row">
                                                <div class="form-group">
                                                    <label for="image" class="col-md-2 col-form-label">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-image-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z" />
                                                        </svg>
                                                        {{ __('labels.users.image') }}</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" name="image"
                                                            value="{{ old('image') }}" placeholder="Enter the image">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                        </div>
                                        <button class="btn btn-primary"
                                            type="submit">{{ __('buttons.submit') }}</button>
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
        var inputt = document.querySelector('#mobile_number');
        var countryData = window.intlTelInputGlobals.getCountryData();
        var addressDropdow = document.querySelector("#addresss-country");
        var it2 = window.intlTelInput(inputt, {
            utilScript: 'js/utils.js'
        });
        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            var optionNode = document.createElement("option");
            optionNode.value = country.iso2;
            var textNode = document.createTextNode(country.name);
            optionNode.appendChild(textNode);
            addressDropdow.appendChild(optionNode);
        }

        addressDropdow.value = it2.getSelectedCountryData().iso2;

        // listen to the telephone input for changes
        inputt.addEventListener('countrychange', function(e) {
            addressDropdow.value = it2.getSelectedCountryData().iso2;
        });

        // listen to the address dropdown for changes
        addressDropdow.addEventListener('change', function() {
            it2.setCountry(this.value);
        });
    </script>
    <script>
        var inputt = document.querySelector('#additional_mobile_number');
        var countryData = window.intlTelInputGlobals.getCountryData();
        var addressDropdow = document.querySelector("#addresss-country");
        var it2 = window.intlTelInput(inputt, {
            utilScript: 'js/utils.js'
        });
        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            var optionNode = document.createElement("option");
            optionNode.value = country.iso2;
            var textNode = document.createTextNode(country.name);
            optionNode.appendChild(textNode);
            addressDropdow.appendChild(optionNode);
        }

        addressDropdow.value = it2.getSelectedCountryData().iso2;

        // listen to the telephone input for changes
        inputt.addEventListener('countrychange', function(e) {
            addressDropdow.value = it2.getSelectedCountryData().iso2;
        });

        // listen to the address dropdown for changes
        addressDropdow.addEventListener('change', function() {
            it2.setCountry(this.value);
        });
    </script>
    <script>
        $('#role_id').select2({
            width: '100%',
            placeholder: "Select an Option",
            allowClear: true,
        });
    </script>
    <script>
        $('#language').select2({
            width: '100%',
            placeholder: "Select an Option",
            allowClear: true,
        });
    </script>
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
