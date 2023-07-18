@extends('layouts.dashboard.base')
@section('pageTitle', __('sidebar.leads.create'))
@section('custom-style')
    <style>
         .select2-search--inline {
        display: contents; /*this will make the container disappear, making the child the one who sets the width of the element*/
        }
        .select2-search__field:placeholder-shown {
            width: 100% !important; /*makes the placeholder to be 100% of the width while there are no options selected*/
            margin-left: 6px !important;
        }
        .iti{
            width: 100%!important;
        }
        .select2-container--default .select2-selection--single{
            border: 1px solid #d5d3d3!important;
            height: 2.1rem!important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height: 33px!important;
          height: 100%!important;
        }
    </style>
    <!-- Plugin Css -->
    {{-- <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" /> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}">
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
                                    {{ Breadcrumbs::render('leads.create') }}
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
                                    <h4 class="card-title">{{__('sidebar.leads.create')}}</h4>
                                    @include('layouts.dashboard.alerts')
                                    <form class="needs-validation" id="form_validation"
                                          action="{{route('leads.store')}}"
                                          method="post"
                                          enctype="multipart/form-data"
                                          novalidate
                                          >
                                        @csrf
                                       
                                        <div class="row">
                                            <h2 class="form-label">
                                                {{ __('labels.leads.contact_information') }}
                                            </h2>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead01" class="form-label">
                                                        {{ __('labels.leads.name') }}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ old('name') }}"
                                                         name="name" id="validationLead01" 
                                                         placeholder="Enter a Name"
                                                         required>
                                                    <div class="invalid-feedback">
                                                        Please provide a {{__('labels.leads.name')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead02" class="form-label">
                                                        {{ __('labels.leads.email') }}
                                                    </label>
                                                    <input class="form-control" type="email" value="{{ old('email') }}"
                                                    name="email" id="validationLead02" 
                                                    placeholder=" {{__('labels.leads.email')}}"
                                                    required>
                                                    <div class="invalid-feedback">
                                                        Please provide an {{__('labels.leads.email')}}.
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                        <!-- End Col -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label for="validationLead03" class="form-label"> 
                                                         {{__('labels.leads.mobile_number')}}
                                                    </label>
                                                    <br>
                                                    <input class="form-control" type="tel" value="+971"
                                                        name="mobile_number" minlength="9" maxlength="13" pattern="[+]{0,1}[0-9]{8,13}"
                                                        id="validationLead03"
                                                        placeholder="{{__('labels.leads.mobile_number')}}"
                                                        required> 
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide a {{__('labels.leads.mobile_number')}}.
                                                </div>
                                                @error('mobile_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                             <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="validationLead04" class="form-label">
                                                         {{__('labels.leads.additional_mobile_number')}}
                                                    </label>
                                                    <input class="form-control" type="tel" value="+971"
                                                        name="additional_mobile_number" 
                                                        id="validationLead04"
                                                        placeholder="{{__('labels.leads.additional_mobile_number')}}"
                                                        nullable> 
                                                    <div class="invalid-feedback">
                                                        Please provide an {{__('labels.leads.additional_mobile_number')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead05">
                                                        {{__('labels.leads.project_name')}}
                                                    </label>
                                                    <select name="project_name" class="form-select select2"
                                                        id="validationLead05">
                                                        {{-- <option value="" selected>Select Project Name</option> --}}
                                                        <option></option>
                                                            @foreach($leads_projects as $leads_project)
                                                             <option value="{{$leads_project->id}}">{{$leads_project->name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead06">
                                                        {{__('labels.leads.comment')}}
                                                    </label>
                                                    <textarea 
                                                                  name="comment"
                                                                  class="form-control @error('comment') is-invalid @enderror"
                                                                  rows="5"
                                                                  id="validationLead06"></textarea>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <h2 class="form-label">
                                                {{ __('labels.leads.lead_inquiry') }}
                                            </h2>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead07">
                                                        {{__('labels.leads.property_types')}}
                                                    </label>
                                                    <select name="property_types[]" class="form-select select2 select2-multiple" 
                                                        id="validationLead07" multiple>
                                                        <option disabled>Select Property Types</option>
                                                            @foreach($property_types as $property_type)
                                                             <option value="{{$property_type->id}}">{{$property_type->name}}</option>
                                                            @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.property_types')}}.
                                                    </div>
                                                    @error('property_types')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                        <label class="form-label" for="validationLead08">
                                                            {{__('labels.leads.property_categories')}}
                                                        </label>
                                                    <select name="property_categories[]" multiple class="form-select select2 select2-multiple"
                                                         id="validationLead08">
                                                        <option disabled>Select Property Categories</option>
                                                            @foreach($property_categories as $property_category)
                                                             <option value="{{$property_category->id}}">{{$property_category->name}}</option>
                                                            @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.property_categories')}}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                        <label class="form-label" for="validationLead09">
                                                            {{__('labels.leads.property_status')}}
                                                        </label>
                                                    <select name="property_status[]" class="form-select select2 select2-multiple" 
                                                        id="validationLead09" multiple>
                                                        <option disabled>Select Property Status</option>
                                                        @foreach($property_statuses as $property_status)
                                                        <option value="{{$property_status->id}}">{{$property_status->name}}</option>
                                                       @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.property_status')}}.
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                        <label class="form-label" for="validationLead10">
                                                            {{__('labels.leads.payment_frequencies')}}
                                                        </label>
                                                    <select name="payment_frequencies[]" class="form-select select2 select2-multiple"
                                                        id="validationLead10" multiple>
                                                        <option disabled>Select Payment Frequencies</option>
                                                        @foreach($payment_frequencies as $payment_frequency)
                                                        <option value="{{$payment_frequency->id}}">{{$payment_frequency->name}}</option>
                                                       @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.payment_frequencies')}}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="validationLead11" class="form-label">
                                                        {{__('labels.leads.min_price')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0"
                                                    value="{{ old('min_price') }}" 
                                                    name="min_price" id="validationLead11"
                                                    placeholder="Enter a Min Price"
                                                    >
                                                   
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="validationLead12" class="form-label">
                                                        {{__('labels.leads.max_price')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0" value="{{ old('max_price') }}"
                                                    name="max_price" id="validationLead12"
                                                    placeholder="Enter a Max Price"
                                                    
                                                    >
                                                    
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="validationLead13" class="form-label">
                                                        {{__('labels.leads.min_area')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0" value="{{ old('min_area') }}"
                                                    name="min_area" id="validationLead13" 
                                                    placeholder="Enter a Min Area"
                                                    >
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="validationLead14" class="form-label">
                                                        {{__('labels.leads.max_area')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0" value="{{ old('max_area') }}"
                                                    name="max_area" id="validationLead14"
                                                    placeholder="Enter a Max Area"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="validationLead15" class="form-label">
                                                        {{__('labels.leads.min_number_of_bedrooms')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0" value="{{ old('min_number_of_bedrooms') }}"
                                                    name="min_number_of_bedrooms" id="validationLead15" 
                                                    placeholder="Enter a Min Number of Bedrooms"
                                                    >
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label for="validationLead16" class="form-label">
                                                        {{__('labels.leads.max_number_of_bedrooms')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0" value="{{ old('max_number_of_bedrooms') }}"
                                                    name="max_number_of_bedrooms" id="validationLead16"
                                                    placeholder="Enter a Max Number of Bedrooms"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead17">
                                                        {{__('labels.leads.property_amenities')}}
                                                    </label>
                                                    <select name="property_amenities[]" class="form-select select2 select2-multiple"
                                                    id="validationLead17" multiple>
                                                        <option disabled>Select Property Amenities</option>
                                                        @foreach($property_amenities as $property_amenity)
                                                        <option value="{{$property_amenity->id}}">{{$property_amenity->name}}</option>
                                                       @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.property_amenities')}}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <h2 class="form-label">
                                                {{ __('labels.leads.personal_information') }}
                                            </h2>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="validationLead18" class="form-label">
                                                        {{__('labels.leads.passport_id')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ old('passport_id') }}"
                                                    name="passport_id" id="validationLead18" 
                                                    placeholder="Enter a Passport ID"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a {{__('labels.leads.passport_id')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="validationLead19" class="form-label">
                                                        {{__('labels.leads.passport_expiry')}}
                                                    </label>
                                                    <input class="form-control" type="date" value="{{ old('passport_expiry') }}"
                                                    name="passport_expiry"  id="validationLead19" 
                                                    placeholder="Enter a Passport Expiry"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a {{__('labels.leads.passport_expiry')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="validationLead20" class="form-label">
                                                        {{__('labels.leads.emirates_id')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ old('emirates_id') }}"
                                                    name="emirates_id" id="validationLead20"
                                                    placeholder="Enter an Emirates ID"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide an {{__('labels.leads.emirates_id')}}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="validationLead21" class="form-label">
                                                        {{__('labels.leads.address')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ old('address') }}"
                                                    name="address" id="validationLead21" placeholder="Address"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide an {{__('labels.leads.address')}}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead22" class="form-label">
                                                        {{__('labels.leads.city')}}
                                                    </label>
                                                    <select name="city" class="form-select select2"
                                                        id="validationLead22" select2>
                                                      <option></option>
                                                        {{-- <option value="" disabled selected>Select City</option> --}}
                                                        @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a {{__('labels.leads.city')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead23" class="form-label">
                                                        {{__('labels.leads.country')}}
                                                    </label>
                                                    <select name="country" class="form-select select2"
                                                        id="validationLead23" select2 onclick="console.log($(this).val())"
                                                        onchange="console.log('change is firing')">
                                                        {{-- <option value="" disabled selected>Select Country</option> --}}
                                                        <option></option>
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a {{__('labels.leads.country')}}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <button class="btn btn-primary" type="submit">{{__('buttons.create')}}</button>
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
    
         <!-- Page level custom scripts -->
         <script src="{{asset('js/intlTelInput.js')}}"></script>
        <!-- validation init -->
        <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
        <!-- parsley plugin -->
        <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        <script>
           $.validator.addMethod('greaterThan', function (value, element, param) {
                return this.optional(element) || parseInt(value) >= parseInt($(param).val());
                }, 'Invalid value');
            $(function () {
                $('#form_validation').validate({
                    rules: {
                        max_price: {
                            greaterThan: '#validationLead11'
                        },
                        max_area: {
                            greaterThan: '#validationLead13'
                        },
                        max_number_of_bedrooms: {
                            greaterThan: '#validationLead15'
                        },
                        
                    },
                    messages: {
                    max_price: {
                        greaterThan: "Please provide a value greater than min price",
                    },
                    max_area: {
                        greaterThan: "Please provide a value greater than min area",
                    },
                    max_number_of_bedrooms: {
                        greaterThan: "Please provide a value greater than min number of bedrooms",
                    },
                    
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
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Select an Option",
                    allowClear: true,
                });
                $('.select2').style.width="100%";
            });
        </script>
        <script>
            $(document).ready(function() {
                // Select2 Multiple
                $('#validationLead07').select2({
                    placeholder: "Select Property Types",
                    allowClear: true
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Select2 Multiple
                $('#validationLead08').select2({
                    placeholder: "Select Property Categories",
                    allowClear: true
                });
            });
        </script>
         <script>
            $(document).ready(function() {
                // Select2 Multiple
                $('#validationLead09').select2({
                    placeholder: "Select Property Status",
                    allowClear: true
                });
            });
        </script>
         <script>
            $(document).ready(function() {
                // Select2 Multiple
                $('#validationLead10').select2({
                    placeholder: "Select Payment Frequencies",
                    allowClear: true
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Select2 Multiple
                $('#validationLead17').select2({
                    placeholder: "Select Property Amenities",
                    allowClear: true
                });
            });
        </script>
       
        <script>
            var inputt = document.querySelector('#validationLead03');
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
            var inputt = document.querySelector('#validationLead04');
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
                $('select[name="country"]').on('change', function() {
                    var SectionId = $(this).val();
                    if (SectionId) {
                        $.ajax({
                            url: "{{ URL::to('select_city') }}/" + SectionId,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="city"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="city"]').append(
                                        '<option value="' + key + '">' + value + '</option>');
                                });
                                
                            },
                        });
    
    
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>
       
    @endsection
@endsection
