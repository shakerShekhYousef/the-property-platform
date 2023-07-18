@extends('layouts.dashboard.base')
@section('pageTitle', 'Edit Tenant')
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
                                    {{ Breadcrumbs::render('tenants.edit',$tenant) }}
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
                                    <form class="needs-validation"
                                          id="validation-form"
                                          action="{{route('tenants.update',$tenant)}}"
                                          method="post"
                                          enctype="multipart/form-data"
                                          novalidate>
                                        @csrf
                                        @method("PUT")
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
                                                           required>
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
                                                           required>
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
                                                           required>
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
                                                           required>
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
                                                           required />
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
                                                           required>
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
                                                            required>
                                                        <option></option>
                                                        <option {{$tenant->gender == 'male' ? "selected" :''}} value="male">Male</option>
                                                        <option {{$tenant->gender == 'female' ? "selected" :''}} value="female">Female</option>
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
                                                        select2" id="marital_status" required
                                                    >
                                                        <option></option>
                                                        <option {{$tenant->marital_status == 'married' ? "selected" :''}} value="married">Married</option>
                                                        <option {{$tenant->marital_status == 'widowed' ? "selected" :''}} value="widowed">Widowed</option>
                                                        <option {{$tenant->marital_status == 'separated' ? "selected" :''}} value="separated">Separated</option>
                                                        <option {{$tenant->marital_status == 'divorced' ? "selected" :''}} value="divorced">Divorced</option>
                                                        <option {{$tenant->marital_status == 'single' ? "selected" :''}} value="single">Single</option>
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
                                                           placeholder="Enter the phone" required>
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
                                                           placeholder="Enter the phone" required>
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
                                                           required>
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
                                                           required>
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
                                                           required>
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
                                                           required>
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
                                                           required>
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
                                                           required>
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
                                                           required>
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
                                                           required>
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
                                                           required>
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
                                                           required>
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
                                                            required>
                                                        <option></option>
                                                        @foreach($cities as $city)
                                                            @if($city->id == $tenant->city_id)
                                                                <option selected value="{{$city->id}}">{{$city->name}}</option>
                                                            @else
                                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endif
                                                        @endforeach
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
                                                            required>
                                                        <option></option>
                                                        @foreach($properties as $property)
                                                            @if($property->id == $tenant->property_id)
                                                                <option selected value="{{$property->id}}">{{$property->name}}</option>
                                                            @else
                                                                <option value="{{$property->id}}">{{$property->name}}</option>
                                                            @endif
                                                        @endforeach
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
                                                    <input type="file" accept="image/png, image/jpeg, image/png, image/gif" class="form-control" id="national_id_select" name="national_id_photo">
                                                    <button style="margin-top: 5px" type="button" id="remove_national_id_button" class="btn btn-sm btn-link p-0 display-none">
                                                        Remove image
                                                    </button>
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
                                                    <input type="file" accept="image/png, image/jpeg, image/png, image/gif" class="form-control" id="passport_photo_select" name="passport_photo">
                                                    <button style="margin-top: 5px" type="button" id="remove_passport_photo_button" class="btn btn-sm btn-link p-0 display-none">
                                                        Remove image
                                                    </button>
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
                                                    <input type="file" class="form-control" id="visa_photo_select"
                                                           name="visa_photo" accept="image/png, image/jpeg, image/png, image/gif">
                                                    <button style="margin-top: 5px" type="button" id="remove_visa_photo_button" class="btn btn-sm btn-link p-0 display-none">
                                                        Remove image
                                                    </button>
                                                </div>
                                            </div>
                                            @if ($tenant->visa_photo)
                                                <img src="{{ asset('storage/'.$tenant->visa_photo) }}" id="visa_photo_preview" class="img-fluid col-md-6"
                                                     style="width: 132px;margin-top: 5px">
                                            @endif
                                        </div>
                                        <!-- End Row -->
                                        <button class="btn btn-primary" type="submit">{{__('buttons.submit')}}</button>
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
