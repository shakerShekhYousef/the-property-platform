<?php

namespace App\Http\Controllers\dashboard;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Repositories\dashboard\LeadRepository;
use Illuminate\Http\Request;
use App\Models\LeadProject;
use App\Models\PropertyType;
use App\Models\PropertyCategory;
use App\Models\PropertyStatus;
use App\Models\PaymentFrequency;
use App\Models\PropertyAmenity;
use App\Models\City;
use App\Models\Country;
use App\Models\Lead;
use App\Models\LeadStatus;
use App\Models\LeadSource;
use App\Models\LeadType;
use App\Models\LeadInquiry;
use App\Models\User;
use App\Models\Campaign;
use App\Models\CampaignUtmSource;
use App\Models\CampaignUtmMedium;
use App\Models\CampaignUtmCampaign;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LeadsImport;
use App\Exports\LeadsExport;
use Carbon\Carbon;
use App\Http\Requests\lead\CreateLeadRequest;
use App\Http\Requests\lead\UpdateLeadRequest;




class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $leadRepository;

    public function __construct(LeadRepository $leadRepository)
    {
        return $this->leadRepository=$leadRepository;
    }

    public function index(Request $request)
    {
       

    }
    public function leadspool (Request $request){
        $countries = Country::all();
        $cities = City::all();
        $projects = LeadProject::all();
        $statuses = LeadStatus::all();
        $sources = LeadSource::all();
        $types = LeadType::all();
        $agent_users = User::where('role_id',3)->get();
        $users = User::all();
        $campaigns = Campaign::all();
        $campaign_sources = CampaignUtmSource::all();
        $campaign_mediums = CampaignUtmMedium::all();
        $campaign_campiagns = CampaignUtmCampaign::all();
       

        if ($request->ajax()){
            $data = Lead::query();
            try {
                if ($request->start_date || $request->end_date) {
                    $start_date = Carbon::parse($request->start_date)->toDateTimeString();
                    $end_date = Carbon::parse($request->end_date)->toDateTimeString();
                    $data->whereBetween('created_at',[$start_date,$end_date])->get();
                } 
                  $search = $request->get('search');
                  $data->where('name','like', '%' .$search. '%')
                    ->orWhere('email','like', '%' .$search. '%')
                    ->orWhere('mobile_number','like', '%' .$search. '%')
                    ->leadSource($request->get('lead_source_id'))
                    ->leadProject($request->get('project_id'))
                    ->city($request->get('city_id'))
                    ->user($request->get('user_id'))
                    ->entryUser($request->get('entry_user_id'))
                    ->creation_date($request->get('creation_date'))
                    ->leadStatus($request->get('status_id'))
                    ->hasComment($request->get('has_comment'))
                    ->campaign($request->get('campaign_id'))
                    ->campaignUtmSource($request->get('campaign_utm_source_id'))
                    ->campaignUtmMedium($request->get('campaign_utm_medium_id'))
                    ->campaignUtmCampaign($request->get('campaign_utm_campaign_id'))
                    ->additional_mobile_number($request->get('additional_mobile_number'))
                    ->comment($request->get('comment'))
                    ->address($request->get('address'))
                    ->emiratesId($request->get('emiratesId'))
                    ->get();
                     return datatables($data)
                    ->addColumn('checkbox', function ($item) {
                        return '<input type="checkbox" id="'.$item->id.'" name="someCheckbox" />';
                    })
                    ->addColumn('mobile_number', function ($item) {
                        return '<a  href="https://wa.me/'.$item->mobile_number.'">'.$item->mobile_number.'    <i class="fab fa-whatsapp"></i></a>';
                    })
                    ->addColumn('additional_mobile_number', function ($item) {
                        if(isset($item->additional_mobile_number)){
                        return '<a  href="https://wa.me/'.$item->additional_mobile_number.'">'.$item->additional_mobile_number.'    <i class="fab fa-whatsapp"></i></a>';
                        }
                    })
                    ->addColumn('email', function ($item) {
                        return '<a  href="mailto:'.$item->eamil.'">'.$item->email.'    <i class="far fa-envelope"></i></a>';
                    })
                    ->addColumn('leadSource',function (Lead $lead){
                        return $lead->leadSource->name;
                    })
                    ->addColumn('leadProject',function (Lead $lead){
                        $project_lead = !empty($lead->leadProject->name) ? $lead->leadProject->name : 'empty';
                        return $project_lead;
                    })
                    ->addColumn('city',function (Lead $lead){
                        $city_lead = !empty($lead->city->name) ? $lead->city->name : 'empty';
                        return $city_lead;
                    })
                    ->addColumn('country',function (Lead $lead){
                        $country_lead = !empty($lead->city->country->name) ? $lead->city->country->name : 'empty';
                        return $country_lead;
                    })
                    ->addColumn('campaign',function (Lead $lead){
                        $campaign_lead = !empty($lead->campaign->name) ? $lead->campaign->name : 'empty';
                        return $campaign_lead;
                    })
                    ->addColumn('campaign_utm_source',function (Lead $lead){
                        $utm_source_lead = !empty($lead->campaignUtmSource->source_name) ? $lead->campaignUtmSource->source_name : 'empty';
                        return $utm_source_lead;
                    })
                    ->addColumn('campaign_utm_medium',function (Lead $lead){
                        $utm_medium_lead = !empty($lead->campaignUtmMedium->medium_name) ? $lead->campaignUtmMedium->medium_name : 'empty';
                        return $utm_medium_lead;
                    })
                    ->addColumn('campaign_utm_campaign',function (Lead $lead){
                        $utm_campaign_lead = !empty($lead->campaignUtmCampaign->campaign_name) ? $lead->campaignUtmCampaign->campaign_name : 'empty';
                        return $utm_campaign_lead;
                    })
                    ->addColumn('creation_date',function (Lead $lead){
                        $creation_date_lead = !empty($lead->creation_date) ? $lead->creation_date : 'empty';
                        return $creation_date_lead;
                    })
                    ->addColumn('user',function (Lead $lead){
                        $user_lead = !empty($lead->user->name) ? $lead->user->name : 'empty';
                        return $user_lead;
                    })
                    ->addColumn('entryUser',function (Lead $lead){
                        $entryUser=User::where('id',$lead->entry_user_id)->first();
                        $entryUser_lead = !empty($entryUser->name) ? $entryUser->name : 'empty';
                        return $entryUser_lead;
                    })
                    ->addColumn('leadStatus',function (Lead $lead){
                        $status_lead = !empty($lead->leadStatus->name) ? $lead->leadStatus->name : 'empty';
                        return $status_lead;
                    })
                    ->addColumn('leadType',function (Lead $lead){
                        $type_lead = !empty($lead->leadStatus->leadType->name) ? $lead->leadStatus->leadType->name : 'empty';
                        return $type_lead;
                    })
                    ->addColumn('hasComment',function (Lead $lead){
                        $comment_lead = !empty($lead->has_comment) ? $lead->has_comment : 'empty';
                        return $comment_lead;
                    })
                    ->addColumn('additional_mobile_number_lead',function (Lead $lead){
                        $additional_mobile_number_lead = !empty($lead->additional_mobile_number) ? $lead->additional_mobile_number : 'empty';
                        return $additional_mobile_number_lead;
                    })
                    ->addColumn('comment',function (Lead $lead){
                        $comment_lead = !empty($lead->comment) ? $lead->comment : 'empty';
                        return $comment_lead;
                    })
                    ->addColumn('address',function (Lead $lead){
                        $address_lead = !empty($lead->address) ? $lead->address : 'empty';
                        return $address_lead;
                    })
                    ->addColumn('emiratesId',function (Lead $lead){
                        $emiratesId_lead = !empty($lead->emiratesId) ? $lead->emiratesId : 'empty';
                        return $emiratesId_lead;
                    })
                     ->addColumn('passport_expiry',function (Lead $lead){
                        $passport_expiry_lead = !empty($lead->passport_expiry) ? $lead->passport_expiry : 'empty';
                        return $passport_expiry_lead;
                    })
                    ->addColumn('passportId',function (Lead $lead){
                        $passportId_lead = !empty($lead->passportId) ? $lead->passportId : 'empty';
                        return $passportId_lead;
                    })
                    ->addColumn('action', function ($item) {
                    return '<div class="activity-icon">
                    <ul style="list-style: none">
                        <li><a href="' . route('leads.show', $item->id) . '" class="user-list-actions-icon bg"><i class="mdi mdi-eye"></i></a></li>
                        <li><a href="' . route('leads.edit', $item->id) . '" class="user-list-actions-icon bg"><i class="fa fa-pen"></i></a></i>
                        <li><a id="delete" onclick="fire()" data-lead="'.$item->id.'" data-url="' . route('delete_lead') . '" class=""><i class="fas fa-trash-alt"></i></a></li>
                     </ul>
                </div>';
                })->rawColumns(['checkbox','mobile_number','additional_mobile_number','email','action'])->make(true);
            } catch (\Exception $e) {
                return new GeneralException($e);
            }
        }
        return view('dashboard.lead.index',compact('countries','cities','projects','statuses','sources','types','agent_users'
            ,'campaigns','campaign_sources','campaign_mediums','campaign_campiagns','users'));


    }
    public function get_cities(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $select = $select . "_id";
        $data = DB::table('cities')
            ->where('country_id', $value)
            ->get();
        $output = '<option class="" value="" >Select a city</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        echo $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leads_projects =LeadProject::all();
        $property_types =PropertyType::all();
        $property_categories =PropertyCategory::all();
        $property_statuses =PropertyStatus::all();
        $payment_frequencies =PaymentFrequency::all();
        $property_amenities =PropertyAmenity::all();
        $cities =City::all();
        $countries =Country::all();

        return view('dashboard.lead.create',compact('leads_projects','property_types','property_categories'
        ,'property_statuses','payment_frequencies','property_amenities','cities','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLeadRequest $request)
    {
        $this->leadRepository->create($request->all());
        session()->flash('success', 'Item has been added successfully!');
        return redirect()->route('leads.pool');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead = Lead::where('id',$id)->first();
        $lead_inquery = LeadInquiry::where('lead_id',$lead->id)->first();
        if(isset($lead_inquery)){
            $property_types =$lead_inquery->propertyTypes()->get();
            $property_categories =$lead_inquery->propertyCategories()->get();
            $property_statuses =$lead_inquery->propertyStatuses()->get();
            $payment_frequencies =$lead_inquery->paymentFrequencies()->get();
            $property_amenities =$lead_inquery->propertyAmenities()->get();
           
        }else{
            $property_types ="";
            $property_categories ="";
            $property_statuses ="";
            $payment_frequencies ="";
            $property_amenities ="";

        }
       
        $entry_user= User::find($lead->entry_user_id);
        if($lead->lead_source_id == 1 || $lead->lead_source_id == 3){
           $entered_by=$entry_user->name;
        }else{
           $entered_by=null;
            
        }
        if($lead->lead_source_id == 2){
           $campaign = 'yes';
        }else{
            $campaign = null;
        }
        // dd($lead->campaignUtmMedium->medium_name);
        return view('dashboard.lead.show',compact('lead','lead_inquery','property_types'
        ,'property_categories','property_statuses','payment_frequencies','property_amenities',
        'entered_by','campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lead = Lead::where('id',$id)->first();
        $lead_inquery = LeadInquiry::where('lead_id',$lead->id)->first();
        $statuses = LeadStatus::all();
        $leads_projects =LeadProject::all();
        $all_property_types =PropertyType::all();
        $all_property_categories =PropertyCategory::all();
        $all_property_statuses =PropertyStatus::all();
        $all_property_frequencies =PaymentFrequency::all();
        $all_property_amenities =PropertyAmenity::all();
        if(isset($lead_inquery)){
            $property_types =$lead_inquery->propertyTypes()->get();
            $property_categories =$lead_inquery->propertyCategories()->get();
            $property_statuses =$lead_inquery->propertyStatuses()->get();
            $payment_frequencies =$lead_inquery->paymentFrequencies()->get();
            $property_amenities =$lead_inquery->propertyAmenities()->get();
           
        }else{
            $property_types ="";
            $property_categories ="";
            $property_statuses ="";
            $payment_frequencies ="";
            $property_amenities ="";

        }
      
        $cities =City::all();
        $countries =Country::all();
        $entry_user= User::find($lead->entry_user_id);
        $agents = User::where('role_id',3)->get();
        if($lead->lead_source_id == 1 || $lead->lead_source_id == 3){
            $entered_by=$entry_user->name;
         }else{
            $entered_by=null;
             
         }
         if($lead->lead_source_id == 2){
            $campaign = 'yes';
         }else{
             $campaign = null;

         }
        return view('dashboard.lead.edit',compact('lead','lead_inquery','statuses','leads_projects','property_types',
        'all_property_types','all_property_categories','all_property_statuses','all_property_frequencies','all_property_amenities',
        'property_categories','property_statuses','payment_frequencies','property_amenities','cities','countries',
        'entered_by','campaign','agents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        // dd($request);

        $this->leadRepository->update($lead,$request->all());
        session()->flash('success', 'Lead has been updated successfully!');
        return redirect()->route('leads.show',$lead->id);
    }
    
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->leadRepository->deleteById($lead->id);
        session()->flash('success', 'Lead has been deleted successfully!');
        return redirect()->back();
    }

    public function leadsimport(){
        return view('dashboard.lead.import');
    }

    public function getLeadsFile($filename){
        // $path = public_path($filename);
        dd(1);
        // return response()->download($path);
    }
    public function leadsimportfile(Request $request){
        Excel::import(new LeadsImport, $request->file('filename')->store('temp'));
        session()->flash('success', 'File has been added successfully!');
        return back();
    }

    public function delete_lead(Request $request){
        $this->leadRepository->deleteById($request->id);
        session()->flash('success', 'Lead has been deleted successfully!');

    }
    public function leadsexportfile(Request $request){
        $date=Carbon::now();

        return Excel::download(new LeadsExport($request),'leads_'.$date.'.xls');
    }

    public function selectcity($id)
    {
        $cities = DB::table("cities")->where("country_id", $id)->pluck("name", "id");
        return json_encode($cities);
    }
}
