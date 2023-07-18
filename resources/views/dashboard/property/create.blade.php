@extends('layouts.dashboard.base')
@section('pageTitle', __('sidebar.properties.create'))
@section('custom-style')
    <style>
        .remove {
            /* display: block; */
            border: 1px solid none;
            background-color: rgb(37 144 235);
            opacity: 0.7;
            background-size: cover;
            color: white;
            padding: 13px 20px 12px 20px;
            left: 33%;
            top: 37px;
            border-radius: 74px;
            text-align: center;
            cursor: pointer;
            position: absolute;
        }

        .remove:hover {
            opacity: 1;
            color: white;
        }

        .file-upload .file-upload-select {
            color: #dbdbdb;
            cursor: pointer;
            text-align: left;
            background: transparent;
            overflow: hidden;
            position: relative;
            border-radius: 6px;
        }

        .file-upload .file-upload-select .file-select-button {
            background: #007bff;
            padding: 0.275rem 1.75rem !important;
            display: inline-block;
            border-radius: 5px;
            color: aliceblue;
        }

        .file-upload .file-upload-select .file-select-name {
            display: none;
            padding: 10px;
        }

        .file-upload .file-upload-select:hover .file-select-button {
            background: #007bff;
            color: #ffffff;
            transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -webkit-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
        }

        .file-upload .file-upload-select input[type="file"] {
            display: none;
        }

        .wrapper .file-upload-multi {
            height: 130px;
            width: 130px;
            border-radius: 10px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 4px solid #FFFFFF;
            overflow: hidden;
            background-image: linear-gradient(to bottom, #2590EB 50%, #FFFFFF 50%);
            background-size: 100% 200%;
            transition: all 1s;
            color: #FFFFFF;
            font-size: 100px;
        }

        .wrapper .file-upload-multi input[type=file] {
            height: 200px;
            width: 200px;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .wrapper .file-upload-multi:hover {
            background-position: 0 -100%;
            color: #2590EB;
        }

        .grid-img {
            margin-right: 1rem;
            margin-bottom: 1rem;
        }
        .div-grid{
            overflow-x: scroll;
        }
        .div-grid-property{
            overflow-x: scroll;
        }

        .row-img {
            height: 9rem;
            overflow-y: scroll;
            overflow-x: hidden;
            padding-left: 0.5rem;
        }

        .btn {
            border-radius: 0.4rem !important;
        }

        .row-img::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        .row-img::-webkit-scrollbar-track {
            background: #c5c5c5;
            border-radius: 8px;
        }

        /* Handle */
        .row-img::-webkit-scrollbar-thumb {
            background: #0275d8 !important;
            border-radius: 8px;
        }

        /* Handle on hover */
        .row-img::-webkit-scrollbar-thumb:hover {
            background: #0275d8 !important;
            border-radius: 8px;
        }

        #top-div {
            margin-left: 30px;
        }

        #img {
            width: 500px;
        }

        @media (max-width: 1024px) {
            #img {
                width: 100%;
            }

            .div-grid {
                overflow-x: scroll;
            }
            .div-grid-property {
                overflow-x: scroll;
            }
        }

        @media (max-width: 500px) {
            .center-text {
                text-align: center !important;
                justify-content: center !important;
            }

            .card-footer {
                text-align: center !important;
            }

            #img {
                width: 100%;
            }

            .div-grid {
                overflow-x: scroll;
            }
            .div-grid-property {
                overflow-x: scroll;
            }

            #top-div {
                margin-left: 0px;
                text-align: center
            }
        }

        .image-grid {
            box-shadow: 0 0 2px #0275d8, 0 2px 4px #0275d8 !important;
            border: 1px solid #0275d8;
            border-radius: 10px;
            width: 100%;
            height: 130px;
        }
        .div-grid{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            grid-gap: 10px;
        }

        .div-grid-property{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            grid-gap: 10px;
        }
        .image2 {
            background: #007bff;
            color: #fff;
            box-shadow: 0 0 2px #0275d8, 0 2px 4px #0275d8 !important;
            border: 1px solid #0275d8;
            border-radius: 10px;
            width: 130px;
            height: 130px;

        }

        .photo-title {
            color: #3d4040;
            font-weight: 400;
            font-family: 'SF-Pro-Text-Regular' !important;
        }
        #pac-input{
            z-index: 999;
            position: inherit;
            width: 100%;
            border: aliceblue;
            border-radius: 7px;
            padding: 12px;
        }
    </style>
    <!-- Plugin Css -->
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
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
                                <h4 class="mb-0 font-size-18">{{ __('sidebar.properties.main') }}</h4>
                                <ol class="breadcrumb">
                                    {{ Breadcrumbs::render('properties.create') }}
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
                                    <h4 class="card-title">{{__('sidebar.properties.create')}}</h4>
                                    @include('layouts.dashboard.alerts')
                                    <form class="needs-validation"
                                          id="validation-form"
                                          action="{{route('properties.store')}}"
                                          method="post"
                                          enctype="multipart/form-data"
                                          novalidate>
                                        <h6 class="mt-3 mb-3">General Information:</h6>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom01">
                                                        {{__('labels.properties.name')}}
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           id="validationCustom01"
                                                           placeholder="{{__('labels.properties.name')}}"
                                                           name="name"
                                                           value="{{ old('name') }}"
                                                           required>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom02">
                                                        {{__('labels.properties.makani_number')}}
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('makani_number') is-invalid @enderror"
                                                           id="validationCustom02"
                                                           placeholder=" {{__('labels.properties.makani_number')}}"
                                                           name="makani_number"
                                                           value="{{ old('makani_number') }}"
                                                           required>
                                                    @error('makani_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom03">
                                                        {{__('labels.properties.p_number')}}
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('p_number') is-invalid @enderror"
                                                           id="validationCustom03"
                                                           placeholder="{{__('labels.properties.p_number')}}"
                                                           name="p-number"
                                                           value="{{ old('p-number') }}"
                                                    >
                                                    @error('p_number')
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
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom10">
                                                        {{__('labels.properties.floor_number')}}
                                                    </label>
                                                    <input type="number" class="form-control @error('floor_number') is-invalid @enderror" id="validationCustom10"
                                                           placeholder="{{__('labels.properties.floor_number')}}"
                                                           value="{{ old('floor_number') }}"
                                                           min="1"
                                                           name="floor_number"
                                                           required>
                                                    @error('floor_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom09">
                                                        {{__('labels.properties.property_number')}}
                                                    </label>
                                                    <input type="number" class="form-control @error('property_number') is-invalid @enderror" id="validationCustom09"
                                                           placeholder="{{__('labels.properties.property_number')}}"
                                                           value="{{ old('property_number') }}"
                                                           min="1"
                                                           name="property_number"
                                                           required>
                                                    @error('property_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom05">
                                                        {{__('labels.properties.price')}}
                                                    </label>
                                                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="validationCustom05"
                                                           placeholder="{{__('labels.properties.price')}}"
                                                           value="{{ old('price') }}"
                                                           name="price"
                                                           required>
                                                    @error('price')
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
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="description">
                                                        {{__('labels.properties.description')}}
                                                    </label>
                                                    <textarea
                                                        class="form-control @error('description') is-invalid @enderror"
                                                        rows="5"
                                                        name="description"
                                                        id="description"></textarea>
                                                    @error('description')
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
                                                    <label class="form-label" for="validationCustom16">
                                                        {{__('labels.properties.landlord')}}
                                                    </label>
                                                    <select name="landlord_id" class="form-control @error('landlord_id') is-invalid @enderror select2"
                                                            id="validationCustom16"
                                                            required>
                                                        <option></option>
                                                        @foreach($landlords as $landlord)
                                                            <option value="{{$landlord->id}}">{{$landlord->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('landlord')
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
                                                    <label class="form-label" for="payment_frequency_id">
                                                        {{__('labels.properties.payment_frequency')}}
                                                    </label>
                                                    <select name="payment_frequency_id" class="form-control @error('payment_frequency_id') is-invalid @enderror select2"
                                                            id="payment_frequency_id"
                                                            required>
                                                        <option></option>
                                                        @foreach($payments as $payment)
                                                            <option value="{{$payment->id}}">{{$payment->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('payment_frequency_id')
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
                                            <div class="col-md-4" style="margin-top: 26px;">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                           name="is_published"
                                                    >
                                                    <label class="form-check-label ms-1" for="flexSwitchCheckChecked">
                                                        {{__('labels.properties.is_published')}}
                                                    </label>
                                                    @error('is_published')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4" style="margin-top: 26px;">
                                                <div class="form-check form-switch mb-4">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked1"
                                                           name="is_occupied" onclick="showTenantInput()"
                                                    >
                                                    <label class="form-check-label ms-1" for="flexSwitchCheckChecked1">
                                                        {{__('labels.properties.is_occupied')}}
                                                    </label>
                                                    @error('is_occupied')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-lg-4">
                                                <div class="mb-3 form-group" style="display: none" id="tenant_input">
                                                    <label class="form-label" for="tenant_id">
                                                        Tenants
                                                    </label>
                                                    <select name="tenant_id" class="form-control @error('tenant_id') is-invalid @enderror select2"
                                                            id="tenant_id"
                                                            >
                                                        <option></option>
                                                        @foreach($tenants as $tenant)
                                                            <option value="{{$tenant->id}}">{{$tenant->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('tenant_id')
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
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="notes">
                                                        {{__('labels.properties.notes')}}
                                                    </label>
                                                    <textarea name="notes"
                                                              class="form-control @error('notes') is-invalid @enderror"
                                                              rows="5"
                                                              id="notes"></textarea>
                                                    @error('notes')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                        <h6 class="mt-3 mb-3">Property Details:</h6>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom15">
                                                        {{__('labels.properties.property_type')}}
                                                    </label>
                                                    <select name="property_type_id" class="form-control @error('property_type_id') is-invalid @enderror select2"
                                                            id="validationCustom15"
                                                            required>
                                                        <option></option>
                                                        @foreach($types as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('property_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom124">
                                                        {{__('labels.properties.furniture_type')}}
                                                    </label>
                                                    <select name="furniture_type_id" class="form-control @error('furniture_type_id') is-invalid @enderror select2"
                                                            id="validationCustom124"
                                                            required>
                                                        <option></option>
                                                        @foreach($furnitureTypes as $types)
                                                            <option value="{{$types->id}}">{{$types->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('furniture_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label"  for="validationCustom17">
                                                        {{__('labels.properties.property_category')}}
                                                    </label>
                                                    <select name="property_category_id" class="form-control @error('property_category_id') is-invalid @enderror select2"
                                                            id="validationCustom17"
                                                            required>
                                                        <option></option>
                                                        @foreach($propertyCategories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('property_category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                            <div class="col-lg-3">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom20">
                                                        {{__('labels.properties.property_status')}}
                                                    </label>
                                                    <select name="property_status_id" class="form-control @error('property_status_id') is-invalid @enderror select2"
                                                            id="validationCustom20"
                                                            required>
                                                        <option></option>
                                                        @foreach($propertyStatuses as $status)
                                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('property_status')
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
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom12">
                                                        {{__('labels.properties.number_of_bedrooms')}}
                                                    </label>
                                                    <input type="number" class="form-control @error('number_of_bedrooms') is-invalid @enderror" id="validationCustom12"
                                                           placeholder="{{__('labels.properties.number_of_bedrooms')}}"
                                                           value="{{ old('number_of_bedrooms') }}"
                                                           min="1"
                                                           name="number_of_bedrooms"
                                                           required>
                                                    @error('number_of_bedrooms')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom12">
                                                        {{__('labels.properties.number_of_bathrooms')}}
                                                    </label>
                                                    <input type="number" class="form-control @error('number_of_bathrooms') is-invalid @enderror" id="validationCustom12"
                                                           placeholder="{{__('labels.properties.number_of_bathrooms')}}"
                                                           value="{{ old('number_of_bathrooms') }}"
                                                           name="number_of_bathrooms"
                                                           min="1"
                                                           required>
                                                    @error('number_of_bathrooms')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom04">
                                                        {{__('labels.properties.floors')}}
                                                    </label>
                                                    <input type="number" class="form-control @error('floors') is-invalid @enderror" id="validationCustom04"
                                                           placeholder="{{__('labels.properties.floors')}}"
                                                           value="{{ old('floors') }}"
                                                           name="floors"
                                                           min="1"
                                                           required>
                                                    @error('floors')
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
                                                        {{__('labels.properties.area')}}
                                                    </label>
                                                    <input type="number" class="form-control @error('area') is-invalid @enderror" id="validationCustom06"
                                                           placeholder="{{__('labels.properties.area')}}"
                                                           value="{{ old('area') }}"
                                                           min="1"
                                                           name="area"
                                                           required>
                                                    @error('area')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-lg-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="validationCustom15">
                                                        Amenities
                                                    </label>
                                                    <select name="amenity_id[]" class="form-control @error('amenity_id') is-invalid @enderror select2"
                                                            id="amenity_id" multiple
                                                            required>
                                                        <option></option>
                                                        @foreach($amenities as $amenity)
                                                            <option value="{{$amenity->id}}">{{$amenity->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('amenity_id')
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
                                        <h6 class="mt-3 mb-3">Inventory Items:</h6>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="inventory_name">
                                                        Name
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('inventory_name') is-invalid @enderror"
                                                           id="validationCustom01"
                                                           placeholder="Name"
                                                           name="inventory_name"
                                                           value="{{ old('inventory_name') }}"
                                                           required>
                                                    @error('inventory_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="inventory_location">
                                                        Location
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('inventory_location') is-invalid @enderror"
                                                           id="inventory_location"
                                                           placeholder="Location"
                                                           name="inventory_location"
                                                           value="{{ old('inventory_location') }}"
                                                           required>
                                                    @error('inventory_location')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="QTY">
                                                        QTY
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('QTY') is-invalid @enderror"
                                                           id="inventory_location"
                                                           placeholder="QTY"
                                                           name="QTY"
                                                           value="{{ old('QTY') }}"
                                                           required>
                                                    @error('QTY')
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
                                            <div class="col-md-12">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="inventory_images">
                                                        Images
                                                    </label>
                                                    <div class="row row-img">
                                                        <div class="div-grid" >
                                                            <div class="grid-img">
                                                                <div class="wrapper">
                                                                    <div class="file-upload-multi">
                                                                        <input name="inventory_images[]" id="files" type="file" multiple required/>
                                                                        <i class="fa fa-plus"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('inventory_images')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                        <h6 class="mt-3 mb-3">Property Images:</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="property_images">
                                                        Images
                                                    </label>
                                                    <div class="row row-img">
                                                        <div class="div-grid-property" >
                                                            <div class="grid-img">
                                                                <div class="wrapper">
                                                                    <div class="file-upload-multi">
                                                                        <input name="property_images[]" id="files_property" type="file" multiple required/>
                                                                        <i class="fa fa-plus"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('property_images')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Row -->
                                        <h6 class="mt-3 mb-3">Location Details:</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="address">
                                                        {{__('labels.properties.address')}}
                                                    </label>
                                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                                           placeholder="{{__('labels.properties.address')}}"
                                                           value="{{ old('address') }}"
                                                           name="address"
                                                           required>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="state">
                                                        {{__('labels.properties.state')}}
                                                    </label>
                                                    <input type="text" class="form-control @error('state') is-invalid @enderror" id="state"
                                                           placeholder="{{__('labels.properties.state')}}"
                                                           value="{{ old('state') }}"
                                                           name="state"
                                                           required>
                                                    @error('state')
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
                                                    <label class="form-label" for="country_id">
                                                        {{__('labels.properties.country')}}
                                                    </label>
                                                    <select  name="country_id"
                                                             class="form-control select2"
                                                             id="country_id"
                                                             required
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
                                                <div class="mb-3 form-group">
                                                    <label class="form-label" for="city_id">
                                                        {{__('labels.properties.city')}}
                                                    </label>
                                                    <select  name="city_id"
                                                             class="form-control filter-select select2"
                                                             id="city_id"
                                                             data-dependent="countries"
                                                             required
                                                    >
                                                    </select>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3 form-group">
                                                    <div class="col-lg-12">
                                                        @include('maps.mapSelector')
                                                    </div>
                                                    @error('lat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    @error('lng')
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
        <div id="search-url" data-url="{{route('get_cities')}}"></div>
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
        <!-- google maps api -->
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjfLYb2UXN4tTlssoaQytey9QrfV5c-0s&libraries=places&v=weekly"
        ></script>
        <!-- Gmaps file -->
        <script src="{{asset('assets/libs/gmaps/gmaps.min.js')}}"></script>
        <!-- demo codes -->
        <script src="{{asset('assets/js/pages/gmaps.init.js')}}"></script>
        <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
        <!-- Search js -->
        <script src="{{asset('assets/admin/js/pages/property/search.js')}}"></script>
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
            $(document).ready(function () {
                if (window.File && window.FileList && window.FileReader) {
                    $("#files").on("change", function (e) {
                        var files = e.target.files,
                            filesLength = files.length;
                        for (var i = 0; i < filesLength; i++) {
                            var f = files[i]
                            var fileReader = new FileReader();
                            fileReader.onload = (function (e) {
                                var file = e.target;
                                $("<div class=\"img-thumb-wrapper grid-img card shadow\" style=\"width: 100%\">" +
                                    "<img class=\"img-thumb image-grid\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                    "<span class=\"remove\"><i class=\"fa fa-trash\"></i></span>" +
                                    "</div>").appendTo(".div-grid");
                                $(".remove").click(function () {
                                    $(this).parent(".img-thumb-wrapper").remove();
                                });

                            });
                            fileReader.readAsDataURL(f);
                        }
                        console.log(files);
                    });
                } else {
                    alert("Your browser doesn't support to File API")
                }
            });
        </script>
        <script>
            $(document).ready(function () {
                if (window.File && window.FileList && window.FileReader) {
                    $("#files_property").on("change", function (e) {
                        var files = e.target.files,
                            filesLength = files.length;
                        for (var i = 0; i < filesLength; i++) {
                            var f = files[i]
                            var fileReader = new FileReader();
                            fileReader.onload = (function (e) {
                                var file = e.target;
                                $("<div class=\"img-thumb-wrapper grid-img card shadow\" style=\"width: 100%\">" +
                                    "<img class=\"img-thumb image-grid\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                    "<span class=\"remove\"><i class=\"fa fa-trash\"></i></span>" +
                                    "</div>").appendTo(".div-grid-property");
                                $(".remove").click(function () {
                                    $(this).parent(".img-thumb-wrapper").remove();
                                });

                            });
                            fileReader.readAsDataURL(f);
                        }
                        console.log(files);
                    });
                } else {
                    alert("Your browser doesn't support to File API")
                }
            });
        </script>

        <script>
            function showTenantInput() {
                var checkBox = document.getElementById("flexSwitchCheckChecked1");
                var text = document.getElementById("tenant_input");
                if (checkBox.checked == true){
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }

        </script>
    @endsection
@endsection
