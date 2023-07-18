@extends('layouts.dashboard.base')
@section('pageTitle', __('sidebar.leads.edit'))
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
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
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
                                    {{ Breadcrumbs::render('leads.edit',$lead) }}
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
                                    <h4 class="card-title">{{__('sidebar.leads.edit')}}</h4>
                                    @include('layouts.dashboard.alerts')
                                    <form class="needs-validation"
                                          action="{{route('leads.update',$lead)}}"
                                          method="post"
                                          enctype="multipart/form-data"
                                          novalidate>
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <h2 class="form-label">
                                                {{ __('labels.leads.contact_information') }}
                                            </h2>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead01" class="form-label">
                                                        {{ __('labels.leads.name') }}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{$lead["name"]}}"
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
                                                    <input class="form-control" type="email" value="{{ $lead['email'] }}"
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
                                                <div class="mb-3">
                                                    <label for="validationLead03" class="form-label"> 
                                                         {{__('labels.leads.mobile_number')}}
                                                    </label>
                                                    <br>
                                                    <input class="form-control" type="tel" 
                                                        name="mobile_number" minlength="9" maxlength="13" pattern="[+]{0,1}[0-9]{8,13}"
                                                        id="validationLead03" value="{{ $lead['mobile_number'] }}"
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
                                                    <input class="form-control" type="tel" value="{{ $lead->additional_mobile_number }}"
                                                        name="additional_mobile_number" minlength="9" maxlength="13" pattern="[+]{0,1}[0-9]{8,13}"
                                                        id="validationLead04" 
                                                        placeholder="{{__('labels.leads.additional_mobile_number')}}"
                                                        > 
                                                    <div class="invalid-feedback">
                                                        Please provide an {{__('labels.leads.additional_mobile_number')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead05">
                                                        {{__('labels.leads.status')}}
                                                    </label>
                                                    <select name="status" class="form-select select2"
                                                        id="validationLead05">
                                                        @foreach($statuses as $status)
                                                            @if($status->id == $lead->leadStatus->name)
                                                                <option selected value="{{$status->id}}">{{$status->name}}</option>
                                                            @else
                                                                <option  value="{{$status->id}}">{{$status->name}}</option>
                                                            @endif
                                                        @endforeach    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="validationLead06" class="form-label"> 
                                                         {{__('labels.leads.type')}}
                                                    </label>
                                                    <br>
                                                    <input class="form-control" type="text" 
                                                        name="type" 
                                                        id="validationLead06" readonly value="{{ $lead->leadStatus->leadType->name }}"
                                                        placeholder="{{__('labels.leads.type')}}"
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
                                                    <label for="validationLead07" class="form-label">
                                                         {{__('labels.leads.assigned_agent')}}
                                                    </label>
                                                    <select name="assigned_agent" class="form-select select2"
                                                    id="validationLead07">
                                                        <option selected value="">Please Select Agent</option>
                                                        @foreach($agents as $agent)
                                                        @if($lead->user_id != null){
                                                            @if($agent->id == $lead->user->name)
                                                                <option selected value="{{$agent->id}}">{{$agent->name}}</option>
                                                            @else
                                                                <option  value="{{$agent->id}}">{{$agent->name}}</option>
                                                            @endif
                                                        }@else
                                                        <option  value="{{$agent->id}}">{{$agent->name}}</option>
                                                        @endif
                                                        @endforeach 
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.assigned_agent')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead08">
                                                        {{__('labels.leads.project_name')}}
                                                    </label>
                                                    <select name="project_name" class="form-select select2"
                                                        id="validationLead08" value="{{ $lead['project_name'] }}">
                                                        <option value="">Please Select Project Name</option>
                                                        @foreach($leads_projects as $leads_project)
                                                            @if($leads_project->id == $lead->project_id)
                                                                <option selected value="{{$leads_project->id}}">{{$leads_project->name}}</option>
                                                            @else
                                                                <option  value="{{$leads_project->id}}">{{$leads_project->name}}</option>
                                                            @endif
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
                                                    <label class="form-label" for="validationLead09">
                                                        {{__('labels.leads.comment')}}
                                                    </label>
                                                    <textarea 
                                                    name="comment"
                                                    class="form-control @error('comment') is-invalid @enderror"
                                                        {{$lead->comment}}
                                                        rows="5" 
                                                    id="validationLead09"></textarea>
                                      
                                                </div>
                                                   
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <h2 class="form-label">
                                            {{ __('labels.leads.source_information') }}
                                        </h2>
                                        @isset( $entered_by)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead10">
                                                        {{__('labels.leads.entered_by')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ $entered_by}}"
                                                    name="entered_by" id="validationLead010"
                                                    readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead11">
                                                        {{__('labels.leads.creation_date')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ $lead->created_at}}"
                                                    name="creation_date" id="validationLead11"
                                                    readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        @endisset
                                        @isset( $campaign)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead12">
                                                        {{__('labels.leads.campaign')}}
                                                    </label>
                                                    @if(isset( $lead->campaign_id))
                                                    <input class="form-control" type="text" value="{{ $lead->campaign->name}}"
                                                    name="campaign_id" id="validationLead12"
                                                    readonly>
                                                    @else
                                                    <input class="form-control" type="text" value=""
                                                    name="campaign_id" id="validationLead12"
                                                    readonly>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead30">
                                                        {{__('labels.leads.campaign_utm_source')}}
                                                    </label>
                                                    @if(isset( $lead->campaign_utm_source_id))
                                                    <input class="form-control" type="text" value="{{ $lead->campaignUtmSource->source_name}}"
                                                    name="campaign_utm_source_id" id="validationLead30"
                                                    readonly>
                                                    @else
                                                    <input class="form-control" type="text" value=""
                                                    name="campaign_utm_source_id" id="validationLead30"
                                                    readonly>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead13">
                                                        {{__('labels.leads.campaign_utm_medium')}}
                                                    </label>
                                                    @if(isset( $lead->campaign_utm_medium_id))
                                                    <input class="form-control" type="text" value="{{ $lead->campaignUtmMedium->medium_name}}"
                                                    name="campaign_utm_medium_id" id="validationLead13"
                                                    readonly>
                                                    @else
                                                    <input class="form-control" type="text" value=""
                                                    name="campaign_utm_medium_id" id="validationLead13"
                                                    readonly>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead14">
                                                        {{__('labels.leads.campaign_utm_campaign')}}
                                                    </label>
                                                    @if(isset( $lead->campaign_utm_campaign_id))
                                                    <input class="form-control" type="text" value="{{ $lead->campaignUtmCampaign->campaign_name}}"
                                                    name="campaign_utm_campaign_id" id="validationLead14"
                                                    readonly>
                                                    @else
                                                    <input class="form-control" type="text" value=""
                                                    name="campaign_utm_campaign_id" id="validationLead14"
                                                    readonly>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead15">
                                                        {{__('labels.leads.creation_date')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ $lead->created_at}}"
                                                    name="creation_date" id="validationLead15"
                                                    readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        @endisset
                                        <div class="row">
                                            <h2 class="form-label">
                                                {{ __('labels.leads.lead_inquiry') }}
                                            </h2>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead16">
                                                        {{__('labels.leads.property_types')}}
                                                    </label>
                                                    <select name="property_types[]" class="form-select select2 select2-multiple" 
                                                        id="validationLead16" multiple>
                                                        @foreach($all_property_types as $item)                                   
                                                        @if($property_types != "")
                                                        <option value="{{$item->id }}" @if( $lead_inquery->PropertyTypes->containsStrict('id', $item->id)) selected="selected" @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                        @else
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endif
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
                                                        <label class="form-label" for="validationLead17">
                                                            {{__('labels.leads.property_categories')}}
                                                        </label>
                                                    <select name="property_categories[]" multiple class="form-select select2 select2-multiple"
                                                         id="validationLead17">
                                                         @foreach($all_property_categories as $item)                                   
                                                         @if($property_categories != "")
                                                         <option value="{{$item->id }}" @if( $lead_inquery->PropertyCategories->containsStrict('id', $item->id)) selected="selected" @endif>
                                                             {{ $item->name }}
                                                         </option>
                                                         @else
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endif
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
                                                        <label class="form-label" for="validationLead18">
                                                            {{__('labels.leads.property_status')}}
                                                        </label>
                                                    <select name="property_status[]" class="form-select select2 select2-multiple" 
                                                        id="validationLead18" multiple>
                                                        @foreach($all_property_statuses as $item)                                   
                                                        @if($property_statuses != "")
                                                         <option value="{{$item->id }}" @if( $lead_inquery->PropertyStatuses->containsStrict('id', $item->id)) selected="selected" @endif>
                                                             {{ $item->name }}
                                                         </option>
                                                         @else
                                                         <option value="{{$item->id}}">{{$item->name}}</option>
                                                         @endif
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
                                                        <label class="form-label" for="validationLead19">
                                                            {{__('labels.leads.payment_frequencies')}}
                                                        </label>
                                                    <select name="payment_frequencies[]" class="form-select select2 select2-multiple"
                                                        id="validationLead19" multiple>
                                                        @foreach($all_property_frequencies as $item)                                   
                                                        @if($payment_frequencies != "")
                                                         <option value="{{$item->id }}" @if( $lead_inquery->PaymentFrequencies->containsStrict('id', $item->id)) selected="selected" @endif>
                                                             {{ $item->name }}
                                                         </option>
                                                         @else
                                                         <option value="{{$item->id}}">{{$item->name}}</option>
                                                         @endif
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
                                                <div class="mb-3">
                                                    <label for="validationLead20" class="form-label">
                                                        {{__('labels.leads.min_price')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0" value="{{ old('min_price') }}"
                                                    name="min_price" id="validationLead20"
                                                    placeholder="Enter a Min Price"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.min_price')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead21" class="form-label">
                                                        {{__('labels.leads.max_price')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0" value="{{ old('max_price') }}"
                                                    name="max_price" id="validationLead21"
                                                    placeholder="Enter a Max Price"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.max_price')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead22" class="form-label">
                                                        {{__('labels.leads.min_area')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0" value="{{ old('min_area') }}"
                                                    name="min_area" id="validationLead22" 
                                                    placeholder="Enter a Min Area"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.min_area')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead23" class="form-label">
                                                        {{__('labels.leads.max_area')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0" value="{{ old('max_area') }}"
                                                    name="max_area" id="validationLead23"
                                                    placeholder="Enter a Max Area"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.max_area')}}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead24" class="form-label">
                                                        {{__('labels.leads.min_number_of_bedrooms')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0" value="{{ old('min_number_of_bedrooms') }}"
                                                    name="min_number_of_bedrooms" id="validationLead24" 
                                                    placeholder="Enter a Min Number of Bedrooms"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.min_number_of_bedrooms')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead25" class="form-label">
                                                        {{__('labels.leads.max_number_of_bedrooms')}}
                                                    </label>
                                                    <input class="form-control" type="number" min="0" value="{{ old('max_number_of_bedrooms') }}"
                                                    name="max_number_of_bedrooms" id="validationLead25"
                                                    placeholder="Enter a Max Number of Bedrooms"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.max_number_of_bedrooms')}}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead26">
                                                        {{__('labels.leads.property_amenities')}}
                                                    </label>
                                                    <select name="property_amenities[]" class="form-select select2 select2-multiple"
                                                    id="validationLead26" multiple>
                                                    @foreach($all_property_amenities as $item)                                   
                                                        @if($property_amenities != "")
                                                        <option value="{{$item->id }}" @if( $lead_inquery->PropertyAmenities->containsStrict('id', $item->id)) selected="selected" @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                        @else
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endif
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
                                                    <label for="validationLead27" class="form-label">
                                                        {{__('labels.leads.passport_id')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ $lead['passportId'] }}"
                                                    name="passport_id" id="validationLead27" 
                                                    placeholder="Enter a Passport ID"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.passport_id')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="validationLead28" class="form-label">
                                                        {{__('labels.leads.passport_expiry')}}
                                                    </label>
                                                    <input class="form-control" type="date" value="{{ $lead['passport_expiry'] }}"
                                                    name="passport_expiry"  id="validationLead28" 
                                                    placeholder="Enter a Passport Expiry"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.passport_expiry')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="validationLead29" class="form-label">
                                                        {{__('labels.leads.emirates_id')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ $lead['emiratesId']}}"
                                                    name="emirates_id" id="validationLead29"
                                                    placeholder="Enter an Emirates ID"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.emirates_id')}}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="validationLead30" class="form-label">
                                                        {{__('labels.leads.address')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ $lead['address'] }}"
                                                    name="address" id="validationLead30" placeholder="Address"
                                                    >
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.address')}}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead31" class="form-label">
                                                        {{__('labels.leads.city')}}
                                                    </label>
                                                    <select name="city" class="form-select select2"
                                                        id="validationLead31" select2>
                                                        <option></option>
                                                        @foreach($cities as $city)
                                                            @if(isset($lead->city_id))
                                                                    @if($city->id == $lead->city_id)
                                                                        <option selected value="{{$city->id}}">{{$city->name}}</option>
                                                                    @else
                                                                        <option  value="{{$city->id}}">{{$city->name}}</option>
                                                                    @endif
                                                            @else
                                                                <option  value="{{$city->id}}">{{$city->name}}</option>
                                                            @endif
                                                        @endforeach

                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.city')}}.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="validationLead32" class="form-label">
                                                        {{__('labels.leads.country')}}
                                                    </label>
                                                    <select name="country" class="form-select select2"
                                                        id="validationLead32" select2 onclick="console.log($(this).val())"
                                                        onchange="console.log('change is firing')">
                                                        <option></option>
                                                        @foreach($countries as $country)
                                                            @if(isset($lead->city_id))
                                                                    @if($country->id == $lead->city->country_id)
                                                                        <option selected value="{{$country->id}}">{{$country->name}}</option>
                                                                    @else
                                                                        <option  value="{{$country->id}}">{{$country->name}}</option>
                                                                    @endif
                                                            @else
                                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid {{__('labels.leads.country')}}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                        <button class="btn btn-primary" type="submit">{{__('buttons.leads.edit')}}</button>
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
        <!-- google maps api -->
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI&libraries=places&v=weekly"
        ></script>
        <!-- Gmaps file -->
        <script src="{{asset('assets/libs/gmaps/gmaps.min.js')}}"></script>
        <!-- demo codes -->
        <script src="{{asset('assets/js/pages/gmaps.init.js')}}"></script>
        {{-- <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
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
                $('#validationLead16').select2({
                    placeholder: "Select Property Types",
                    allowClear: true
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Select2 Multiple
                $('#validationLead17').select2({
                    placeholder: "Select Property Categories",
                    allowClear: true
                });
            });
        </script>
         <script>
            $(document).ready(function() {
                // Select2 Multiple
                $('#validationLead18').select2({
                    placeholder: "Select Property Status",
                    allowClear: true
                });
            });
        </script>
         <script>
            $(document).ready(function() {
                // Select2 Multiple
                $('#validationLead19').select2({
                    placeholder: "Select Payment Frequencies",
                    allowClear: true
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Select2 Multiple
                $('#validationLead26').select2({
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
    
                $('select.custom-select').val($('select.custom-select > option:last').val()).change();
    
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
