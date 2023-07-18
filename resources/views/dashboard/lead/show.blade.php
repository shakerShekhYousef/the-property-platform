@extends('layouts.dashboard.base')
@section('pageTitle', __('sidebar.leads.show'))
@section('custom-style')
    <style>
        
    </style>
    <!-- Plugin Css -->
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}">
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                                    {{ Breadcrumbs::render('leads.show',$lead) }}
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
                                    <h4 class="card-title">Show Lead</h4>
                                    @include('layouts.dashboard.alerts')
                                    <div class="row">
                                        <h2 class="form-label">
                                            {{ __('labels.leads.contact_information') }}
                                        </h2>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationLead01" class="form-label">
                                                    {{ __('labels.leads.name') }}
                                                </label>
                                                <input class="form-control" type="text" value="{{ $lead->name }}"
                                                     name="name" id="validationLead01" 
                                                     placeholder="Enter a Name" readonly
                                                     required>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationLead02" class="form-label">
                                                    {{ __('labels.leads.email') }}
                                                </label>
                                                <a href="mailto:{{ $lead->email }}"><i class='far fa-envelope'></i></a>
                                                <input class="form-control" type="email" value="{{ $lead->email }}"
                                                name="email" id="validationLead02" 
                                                placeholder=" {{__('labels.leads.email')}}" readonly
                                                required>
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
                                                <a href="https://wa.me/{{ $lead->mobile_number }}"> <i class='fab fa-whatsapp'></i></a>
                                                <br>
                                                <input class="form-control" type="tel" value="{{ $lead->mobile_number }}"
                                                    name="mobile_number"  
                                                    id="validationLead03"
                                                    placeholder="{{__('labels.leads.mobile_number')}}" readonly
                                                    required> 
                                                </div>
                                        </div>
                                         <!-- End Col -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationLead04" class="form-label">
                                                     {{__('labels.leads.additional_mobile_number')}}
                                                </label>
                                                <a href="https://wa.me/{{ $lead->additional_mobile_number }}"> <i class='fab fa-whatsapp'></i></a>
                                                <br>
                                                <input class="form-control" type="tel" value="{{ $lead->additional_mobile_number }}"
                                                    name="additional_mobile_number" 
                                                    id="validationLead04" readonly
                                                    placeholder="{{__('labels.leads.additional_mobile_number')}}"
                                                    > 
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="validationLead05">
                                                    {{__('labels.leads.status')}}
                                                </label>
                                                <input class="form-control" type="tel" value="{{ $lead->leadStatus->name  }}"
                                                    name="property_status" 
                                                    id="validationLead05" readonly
                                                    > 
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
                                                <input class="form-control" type="text" value="{{ $lead->leadStatus->leadtype->name }}"
                                                name="type" id="validationLead06" 
                                                readonly>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationLead07" class="form-label">
                                                    {{__('labels.leads.assigned_agent')}}
                                                </label>
                                                @if(isset( $lead->user->name ))
                                                    <input class="form-control" type="text" value="{{ $lead->user->name }}"
                                                    name="assigned_agent"  id="validationLead07" 
                                                    readonly>
                                                @else
                                                    <input class="form-control" type="text" value=""
                                                    name="assigned_agent"  id="validationLead07" 
                                                    readonly>
                                               @endif
                                               
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationLead08" class="form-label">
                                                    {{__('labels.leads.project_name')}}
                                                </label>
                                                @if(isset( $lead->leadProject->name  ))
                                                <input class="form-control" type="text" value="{{ $lead->leadProject->name }}"
                                                name="project_name" id="validationLead08"
                                                readonly>
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="project_name" id="validationLead08"
                                                readonly>
                                                @endif
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
                                                <input class="form-control" type="text" value="{{ $lead->comment}}"
                                                name="comment" id="validationLead09"
                                                readonly>
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
                                                    <label class="form-label" for="validationLead09">
                                                        {{__('labels.leads.entered_by')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ $entered_by}}"
                                                    name="entered_by" id="validationLead09"
                                                    readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead09">
                                                        {{__('labels.leads.creation_date')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ $lead->created_at}}"
                                                    name="creation_date" id="validationLead09"
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
                                                    <label class="form-label" for="validationLead30">
                                                        {{__('labels.leads.campaign')}}
                                                    </label>
                                                @if($lead->campaign_id!= "")
                                                    <input class="form-control" type="text" value="{{ $lead->campaign->name}}"
                                                    name="campaign" id="validationLead30"
                                                    readonly>
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="campaign" id="validationLead30"
                                                readonly>
                                                @endif

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead09">
                                                        {{__('labels.leads.campaign_utm_source')}}
                                                    </label>
                                                @if($lead->campaign_utm_source_id!= "")
                                                    <input class="form-control" type="text" value="{{$lead->campaignUtmSource->source_name}}"
                                                    name="campaign_utm_source_id" id="validationLead09"
                                                    readonly>
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="campaign_utm_source_id" id="validationLead09"
                                                readonly>
                                                @endif

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead09">
                                                        {{__('labels.leads.campaign_utm_medium')}}
                                                    </label>
                                                @if($lead->campaign_utm_medium_id!= "")
                                                    <input class="form-control" type="text" value="{{$lead->campaignUtmMedium->medium_name}}"
                                                    name="campaign_utm_medium_id" id="validationLead09"
                                                    readonly>
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="campaign_utm_medium_id" id="validationLead09"
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
                                                    <label class="form-label" for="validationLead09">
                                                        {{__('labels.leads.campaign_utm_campaign')}}
                                                    </label>
                                                @if($lead->campaign_utm_campaign_id != "")
                                                    <input class="form-control" type="text" value="{{ $lead->campaignUtmCampaign->campaign_name}}"
                                                    name="campaign_utm_campaign_id" id="validationLead09"
                                                    readonly>
                                                @else
                                                <input class="form-control" type="text" value=""
                                                    name="campaign_utm_campaign_id" id="validationLead09"
                                                    readonly>
                                                @endif

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationLead09">
                                                        {{__('labels.leads.creation_date')}}
                                                    </label>
                                                    <input class="form-control" type="text" value="{{ $lead->created_at}}"
                                                    name="creation_date" id="validationLead09"
                                                    readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Row -->
                                    @endisset
                                    
                                    <h2 class="form-label">
                                        {{ __('labels.leads.lead_inquiry') }}
                                    </h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationLead11" class="form-label">
                                                    {{__('labels.leads.property_types')}}
                                                </label>
                                                @if($property_types != "")
                                                @foreach ($property_types as $property_type)
                                                {{-- <input class="form-control" type="text" value=" {{ $property_type->name }}"
                                                name="property_types" id="validationLead11"
                                                readonly> --}}
                                               <p>{{ $property_type->name }}</p> 
                                                @endforeach
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="property_types" id="validationLead11"
                                                readonly>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationLead12" class="form-label">
                                                    {{__('labels.leads.property_categories')}}
                                                </label>
                                                @if($property_categories != "")
                                                @foreach ($property_categories as $property_category)
                                                <p>{{ $property_category->name }}</p> 
                                                {{-- <input class="form-control" type="text" value=" {{ $property_category->name }} "
                                                name="property_categories" id="validationLead12"
                                                readonly> --}}
                                                @endforeach
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="property_categories" id="validationLead12"
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
                                                <label for="validationLead11" class="form-label">
                                                    {{__('labels.leads.property_status')}}
                                                </label>
                                                @if($property_statuses != "")
                                                @foreach ($property_statuses as $property_status)
                                                <p>{{ $property_status->name }}</p> 
                                                {{-- <input class="form-control" type="text" value=" {{ $property_status->name }}"
                                                name="property_status" id="validationLead11"
                                                readonly> --}}
                                                @endforeach
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="property_status" id="validationLead11"
                                                readonly>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationLead12" class="form-label">
                                                    {{__('labels.leads.payment_frequencies')}}
                                                </label>
                                                @if($payment_frequencies != "")
                                                @foreach ($payment_frequencies as $payment_frequency)
                                                <p>{{ $payment_frequency->name }}</p> 
                                                {{-- <input class="form-control" type="text" value=" {{ $payment_frequency->name }} "
                                                name="payment_frequency" id="validationLead12"
                                                readonly> --}}
                                                @endforeach
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="payment_frequency" id="validationLead12"
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
                                                <label for="validationLead11" class="form-label">
                                                    {{__('labels.leads.min_price')}}
                                                </label>
                                                @if (isset($lead_inquery->min_price))
                                                <input class="form-control" type="number" value="{{ $lead_inquery->min_price }}"
                                                name="min_price" id="validationLead11"
                                                readonly>
                                                @else
                                                <input class="form-control" type="number" value=""
                                                name="min_price" id="validationLead11"
                                                readonly>
                                                @endif
                                               
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationLead12" class="form-label">
                                                    {{__('labels.leads.max_price')}}
                                                </label>
                                                @if(isset($lead_inquery->max_price))
                                                <input class="form-control" type="number" value="{{$lead_inquery->max_price }}"
                                                name="max_price" id="validationLead12"
                                                readonly>
                                                @else
                                                <input class="form-control" type="number" value=""
                                                name="max_price" id="validationLead12"
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
                                                <label for="validationLead13" class="form-label">
                                                    {{__('labels.leads.min_area')}}
                                                </label>
                                                @if(isset($lead_inquery->min_area))
                                                <input class="form-control" type="number" value="{{ $lead_inquery->min_area }}"
                                                name="min_area" id="validationLead13" 
                                                readonly>
                                                @else
                                                <input class="form-control" type="number" value=""
                                                name="min_area" id="validationLead13" 
                                                readonly>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationLead14" class="form-label">
                                                    {{__('labels.leads.max_area')}}
                                                </label>
                                                @if(isset($lead_inquery->max_area))
                                                <input class="form-control" type="number" value="{{ $lead_inquery->max_area }}"
                                                name="max_area" id="validationLead14"
                                                readonly>
                                                @else
                                                <input class="form-control" type="number" value=""
                                                name="max_area" id="validationLead14"
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
                                                <label for="validationLead15" class="form-label">
                                                    {{__('labels.leads.min_number_of_bedrooms')}}
                                                </label>
                                                @if(isset($lead_inquery->min_number_of_bedrooms))
                                                <input class="form-control" type="number" value="{{ $lead_inquery->min_number_of_bedrooms }}"
                                                name="min_number_of_bedrooms" id="validationLead15" 
                                                readonly>
                                                @else
                                                <input class="form-control" type="number" value=""
                                                name="min_number_of_bedrooms" id="validationLead15" 
                                                readonly>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationLead16" class="form-label">
                                                    {{__('labels.leads.max_number_of_bedrooms')}}
                                                </label>
                                                @if(isset($lead_inquery->max_number_of_bedrooms))
                                                <input class="form-control" type="number" value="{{ $lead_inquery->max_number_of_bedrooms }}"
                                                name="max_number_of_bedrooms" id="validationLead16"
                                                readonly>
                                                @else
                                                <input class="form-control" type="number" value=""
                                                name="max_number_of_bedrooms" id="validationLead16"
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
                                                <label for="validationLead11" class="form-label">
                                                    {{__('labels.leads.property_amenities')}}
                                                </label>
                                                
                                                @if($property_amenities != "")
                                                <br>
                                                {{-- <button class="btn btn-info" data-toggle = "modal" data-target = "#myModal">
                                                    show amenities
                                                </button> --}}
                                                @foreach ($property_amenities as $property_amenity)
                                                {{-- <input class="form-control" type="text" value=" {{ $property_amenity->name }}"
                                                name="property_amenities" id="validationLead11"
                                                readonly> --}}
                                               <p> {{ $property_amenity->name }}</p> 
                                                @endforeach
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="property_amenities" id="validationLead11"
                                                readonly>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col -->
                                    <!-- End Row -->
                                    <h2 class="form-label">
                                        {{ __('labels.leads.personal_information') }}
                                    </h2>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationLead18" class="form-label">
                                                    {{__('labels.leads.passport_id')}}
                                                </label>
                                                <input class="form-control" type="text" value="{{ $lead->passportId}}"
                                                name="passport_id" id="validationLead18" 
                                                readonly>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationLead19" class="form-label">
                                                    {{__('labels.leads.passport_expiry')}}
                                                </label>
                                                <input class="form-control" type="date" value="{{ $lead->passport_expiry}}"
                                                name="passport_expiry"  id="validationLead19" 
                                                placeholder="Enter a Passport Expiry"
                                                readonly>
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationLead20" class="form-label">
                                                    {{__('labels.leads.emirates_id')}}
                                                </label>
                                                <input class="form-control" type="text" value="{{ $lead->emiratesId}}"
                                                name="emirates_id" id="validationLead20"
                                                readonly>
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
                                                @if($lead->city_id != "")
                                                <input class="form-control" type="text" value="{{ $lead->city->name}}"
                                                name="city_id" id="validationLead22"
                                                readonly>
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="city_id" id="validationLead22"
                                                readonly>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationLead23" class="form-label">
                                                    {{__('labels.leads.country')}}
                                                </label>
                                                @if($lead->city_id != "")
                                                <input class="form-control" type="text" value="{{ $lead->city->country->name}}"
                                                name="city_id" id="validationLead23"
                                                readonly>
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="city_id" id="validationLead23"
                                                readonly>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col -->
                                    <!-- End Row -->
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria- 
                                    labelledby="demoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModal">{{__('labels.leads.property_amenities')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria- 
                                                    label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                @if($property_amenities != "")

                                                @foreach ($property_amenities as $property_amenity)
                                                <input class="form-control" type="text" value=" {{ $property_amenity->name }}"
                                                name="property_amenities" id="validationLead11"
                                                readonly>
                                                @endforeach
                                                @else
                                                <input class="form-control" type="text" value=""
                                                name="property_amenities" id="validationLead11"
                                                readonly>
                                                @endif

                                            </div>
                                            <div class = "modal-footer">
                                                <button type = "button" class = "btn btn-secondary" data-dismiss = "modal">
                                                    Close
                                                </button>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
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
        <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        @endsection
@endsection
