@extends('layouts.dashboard.base')
@section('pageTitle', 'Show Tenant')
@section('custom-style')
    <!-- Plugin Css -->
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- intlTelInput Css -->
    <link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
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
                                <h4 class="mb-0 font-size-18">Tenants</h4>
                                <ol class="breadcrumb">
                                    {{ Breadcrumbs::render('tenants.show',$tenant) }}
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
                                    <h4 class="card-title">Create a new tenant</h4>
                                    @include('layouts.dashboard.alerts')
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="name">
                                                        Name
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           id="name"
                                                           placeholder="Name"
                                                           name="name"
                                                           value="{{$tenant->name}}"
                                                           readonly>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="email">
                                                        Email
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           id="validationCustom02"
                                                           placeholder="email"
                                                           name="email"
                                                           value="{{$tenant->email}}"
                                                           readonly>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom06">
                                                        Trade Licence
                                                    </label>
                                                    <input type="text" class="form-control @error('trade_licence') is-invalid @enderror" id="validationCustom06"
                                                           placeholder="Trade Licence"
                                                           value="{{$tenant->trade_licence}}"
                                                           name="trade_licence"
                                                           readonly>
                                                    @error('trade_licence')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom08">
                                                        Trade Licence Expiry
                                                    </label>
                                                    <input type="date" class="form-control @error('trade_licence_expiry') is-invalid @enderror" id="validationCustom08"
                                                           value="{{$tenant->trade_licence_expiry}}"
                                                           name="trade_licence_expiry"
                                                           readonly>
                                                    @error('trade_licence_expiry')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom12">
                                                        TRN
                                                    </label>
                                                    <input type="text" class="form-control @error('TRN') is-invalid @enderror" id="validationCustom12"
                                                           placeholder="TRN"
                                                           value="{{$tenant->TRN}}"
                                                           name="TRN"
                                                           readonly />
                                                    @error('TRN')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom12">
                                                        Date Of Birthday
                                                    </label>
                                                    <input type="date" class="form-control @error('date_of_birthday') is-invalid @enderror" id="validationCustom12"
                                                           value="{{$tenant->date_of_birthday}}"
                                                           name="date_of_birthday"
                                                           readonly>
                                                    @error('date_of_birthday')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="gender">
                                                        Gender
                                                    </label>
                                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror select2"
                                                            id="gender"
                                                            readonly>
                                                        <option selected>{{$tenant->gender}}</option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="marital_status">
                                                        Marital Status
                                                    </label>
                                                    <select name="marital_status" class="form-control @error('marital_status') is-invalid @enderror
                                                        select2" id="marital_status" readonly
                                                    >
                                                        <option selected>{{$tenant->marital_status}}</option>
                                                    </select>
                                                    @error('marital_status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="mobile_number">
                                                        Mobile Number
                                                    </label>
                                                    <input type="tel" class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number"
                                                           pattern="[+]{0,1}[0-9]{8,13}" name="mobile_number"
                                                           minlength="8" maxlength="13" value="{{$tenant->mobile_number}}"
                                                           placeholder="Enter the phone" readonly>
                                                    @error('mobile_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="additional_mobile_number">
                                                        Additional Mobile Number
                                                    </label>
                                                    <input type="text" class="form-control @error('additional_mobile_number') is-invalid @enderror" id="additional_mobile_number"
                                                           pattern="[+]{0,1}[0-9]{8,13}" name="additional_mobile_number"
                                                           minlength="8" maxlength="13"  value="{{$tenant->additional_mobile_number}}"
                                                           placeholder="Enter the phone" readonly>
                                                    @error('additional_mobile_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="national_number">
                                                        National Number
                                                    </label>
                                                    <input type="text" class="form-control @error('national_number') is-invalid @enderror" id="national_number"
                                                           value="{{$tenant->national_number}}"
                                                           name="national_number"
                                                           placeholder="National Number"
                                                           readonly>
                                                    @error('national_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="national_id_expiry">
                                                        National ID Expiry
                                                    </label>
                                                    <input type="date" class="form-control @error('national_id_expiry') is-invalid @enderror" id="national_id_expiry"
                                                           value="{{$tenant->national_id_expiry}}"
                                                           name="national_id_expiry"
                                                           readonly>
                                                    @error('national_id_expiry')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="passport_number">
                                                        Passport Number
                                                    </label>
                                                    <input type="text" class="form-control @error('passport_number') is-invalid @enderror" id="passport_number"
                                                           value="{{$tenant->passport_number}}"
                                                           name="passport_number"
                                                           placeholder="Passport Number"
                                                           readonly>
                                                    @error('passport_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="passport_expiry">
                                                        Passport Expiry
                                                    </label>
                                                    <input type="date" class="form-control @error('passport_expiry') is-invalid @enderror"
                                                           id="passport_expiry"
                                                           value="{{$tenant->passport_expiry}}"
                                                           name="passport_expiry"
                                                           readonly>
                                                    @error('passport_expiry')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="visa_state">
                                                        Visa State
                                                    </label>
                                                    <input type="text" class="form-control @error('visa_state') is-invalid @enderror" id="visa_state"
                                                           value="{{$tenant->visa_state}}"
                                                           name="visa_state"
                                                           placeholder="Visa State"
                                                           readonly>
                                                    @error('visa_state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="nationality">
                                                        Nationality
                                                    </label>
                                                    <input type="text" class="form-control @error('nationality') is-invalid @enderror" id="nationality"
                                                           value="{{$tenant->nationality}}"
                                                           name="nationality"
                                                           placeholder="Nationality"
                                                           readonly>
                                                    @error('nationality')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="state">
                                                        State
                                                    </label>
                                                    <input type="text" class="form-control @error('state') is-invalid @enderror" id="state"
                                                           value="{{$tenant->state}}"
                                                           name="state"
                                                           placeholder="State"
                                                           readonly>
                                                    @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="address1">
                                                        Address1
                                                    </label>
                                                    <input type="text" class="form-control @error('address1') is-invalid @enderror" id="address1"
                                                           value="{{$tenant->address1}}"
                                                           name="address1"
                                                           placeholder="Address1"
                                                           readonly>
                                                    @error('address1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="address2">
                                                        Address2
                                                    </label>
                                                    <input type="text" class="form-control @error('address2') is-invalid @enderror" id="address2"
                                                           value="{{$tenant->address2}}"
                                                           name="address2"
                                                           placeholder="Address2"
                                                           readonly>
                                                    @error('address2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="postcode">
                                                        Postcode
                                                    </label>
                                                    <input type="text" class="form-control @error('postcode') is-invalid @enderror" id="postcode"
                                                           value="{{$tenant->postcode}}"
                                                           name="postcode"
                                                           placeholder="Postcode"
                                                           readonly>
                                                    @error('postcode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="city_id">
                                                        City
                                                    </label>
                                                    <select name="city_id" class="form-control @error('city_id') is-invalid @enderror select2"
                                                            id="city_id"
                                                            readonly>
                                                        <option selected value="{{$tenant->city->id}}">{{$tenant->city->name}}</option>
                                                    </select>
                                                    @error('city_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="property_id">
                                                        Property
                                                    </label>
                                                    <select name="property_id" class="form-control @error('property_id') is-invalid @enderror select2"
                                                            id="property_id"
                                                            readonly>
                                                        <option selected value="{{$tenant->property->id}}">{{$tenant->property->name}}</option>
                                                    </select>
                                                    @error('property_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <div class="form-check form-switch mb-4" style="margin-top: 24px;">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                               name="is_company" onclick="showCompanyName()"
                                                            {{$tenant->is_company == 1 ? "checked" :''}}
                                                        >
                                                        <label class="form-check-label ms-1" for="flexSwitchCheckChecked">
                                                            Is Company
                                                        </label>
                                                        @error('is_company')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group" style="display: none" id="company_input">
                                                    <label class="form-label" for="company_name">
                                                        Company Name
                                                    </label>
                                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                                                           value="{{ $tenant->company_name }}"
                                                           name="company_name"
                                                           placeholder="Company Name"
                                                    >
                                                    @error('company_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row" id="national_id_container">
                                            <div class="col-lg-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="national_id_photo">
                                                        National ID Photo
                                                    </label>
                                                </div>
                                            </div>
                                            @if ($tenant->national_id_photo)
                                                <img src="{{ asset('storage/'.$tenant->national_id_photo) }}" id="national_id_preview" class="img-fluid col-md-6"
                                                     style="width: 132px">
                                            @endif
                                        </div>
                                        <!-- End Row -->
                                        <div class="row" id="passport_photo_container">
                                            <div class="col-lg-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="passport_photo_select">
                                                        Passport Photo
                                                    </label>
                                                </div>
                                            </div>
                                            @if ($tenant->passport_photo)
                                                <img src="{{ asset('storage/'.$tenant->passport_photo) }}" id="passport_photo_preview" class="img-fluid col-md-6"
                                                     style="width: 132px;margin-top: 5px">
                                            @endif
                                        </div>
                                        <!-- End Row -->
                                        <div class="row" id="visa_photo_container">
                                            <div class="col-lg-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="visa_photo_photo">
                                                        Visa Photo
                                                    </label>
                                                </div>
                                            </div>
                                            @if ($tenant->visa_photo)
                                                <img src="{{ asset('storage/'.$tenant->visa_photo) }}" id="visa_photo_preview" class="img-fluid col-md-6"
                                                     style="width: 132px;margin-top: 5px">
                                            @endif
                                        </div>
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
    <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
    <!-- parsley plugin -->
    <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>
    <!-- Upload image -->
    <script src="{{asset('assets/admin/js/pages/tenant/upload_image.js')}}"></script>
    <!-- Select2 js -->
    <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
    <!-- intlTelInput js -->
    <script src="{{asset('js/intlTelInput.js')}}"></script>
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
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select an Option",
                allowClear: true,
            });
        });
    </script>
    <script>
        $(function () {
            $('#validation-form').validate({
                rules: {
                    password: {
                        readonly: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        readonly: true,
                        minlength: 6,
                        equalTo: "#password"
                    },
                },
                messages: {
                    email: {
                        readonly: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        readonly: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    password_confirmation: {
                        readonly: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Password and Password Confirmation must be match"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
    <script>
        function showCompanyName() {
            var checkBox = document.getElementById("flexSwitchCheckChecked");
            var input = document.getElementById("company_input");
            if (checkBox.checked == true){
                input.style.display = "block";
            } else {
                input.style.display = "none";
            }
        }
    </script>
    <script>
        $(document).ready(function (){
            var checkbox = $('#flexSwitchCheckChecked');
            var input = $("#company_input");
            if (checkbox.attr('checked') !== 'checked') {
                input.css('display','none');
            } else {
                input.css('display','block');
            }
        });
    </script>
@endsection
@endsection
