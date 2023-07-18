<?php

namespace App\Exports;

use App\Models\Lead;
use App\Models\User;
use App\Models\City;
use App\Models\LeadSource;
use App\Models\LeadStatus;
use App\Models\LeadProject;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LeadsExport implements FromCollection, WithHeadings, ShouldAutoSize,WithMapping
{
    use Exportable;
    protected $request;
    public function __construct($request)
    {
        $this->request=$request;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Mobile Number',
            'Additional Mobile Number',
            'Campaign',
            'Campaign UTM Source',
            'Campaign UTM Medium',
            'Campaign UTM Campaign',
            'Entered By',
            'Creation Date',
            'Comment',
            'Passport ID',
            'Passport Expiry',
            'Emirates ID',
            'Address',
            'Assigned Agent',
            'City',
            'Source',
            'Status',
            'Type',
            'Project Name',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lead::query()
            ->where('name','like', '%' .$this->request->get('search'). '%')
            ->orWhere('email','like', '%' .$this->request->get('search'). '%')
            ->orWhere('mobile_number','like', '%' .$this->request->get('search'). '%')
            ->city($this->request->get('city_id'))
            ->with(['city'])
            ->get();
    }

    
    public function map($row): array
    {
        $city =City::where('id',$row->city_id)->first();
        if($city){
            $city_name = $city->name;
        }else{
            $city_name = null;
        }
       $user = User::where('id',$row->user_id)->first();
       if(!$user){
        $assigned_agent = '';
       }else{
        $assigned_agent = $user->name; 
       }
       $leadsource = LeadSource::where('id',$row->lead_source_id)->first();
       $leadstatus = LeadStatus::where('id',$row->status_id)->first();
       $project = LeadProject::where('id',$row->project_id)->first();
       if(!$project){
        $leadproject = '';
       }else{
        $leadproject = $project->name;
       }
       if($row->campaign_id){
        $campaign_name =  $row->campaign->name;
        }else{
        $campaign_name = null;
        }
        if($row->campaign_utm_source_id){
            $campaign_utm_source_name =  $row->campaignUtmSource->source_name;
        }else{
            $campaign_utm_source_name = null;
        }
        if($row->campaign_utm_medium_id){
            $campaign_utm_medium_name =  $row->campaignUtmMedium->medium_name;
            }else{
            $campaign_utm_medium_name = null;
        }
        if($row->campaign_utm_campaign_id){
            $campaign_utm_campaign_name =  $row->campaignUtmCampaign->campaign_name;
            }else{
            $campaign_utm_campaign_name = null;
        }    
        return [
            $row->name,
            $row->email,
            $row->mobile_number,
            $row->additional_mobile_number,
            $campaign_name,
            $campaign_utm_source_name,
            $campaign_utm_medium_name,
            $campaign_utm_campaign_name,
            auth()->user()->name,
            $row->creation_date,
            $row->comment,
            $row->passportId,
            $row->passport_expiry,
            $row->emiratesId,
            $row->address,
            $assigned_agent,
            $city_name,
            $leadsource->name,
            $leadstatus->name,
            $leadstatus->leadType->name,
            $leadproject,

        ] ;
    }
}
