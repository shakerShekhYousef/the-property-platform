<?php

namespace App\Imports;

use App\Models\Lead;
use App\Models\LeadInquiry;
use App\Models\PropertyType;
use App\Models\PropertyCategory;
use App\Models\PropertyStatus;
use App\Models\PaymentFrequency;
use App\Models\PropertyAmenity;
use App\Models\City;
use App\Models\LeadProject;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LeadsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $entry_user = auth()->user()->id;
        $project =LeadProject::where('name',$row['project_name'])->first();
        if($project){
            $project_id =  $project->id;
        }else{
            $project_id = null ;
        }
        $city=City::where('name',$row['city'])->first();
         if($city){
            $city_id =  $city->id;
        }else{
            $city_id = null ;
        }
        $lead = Lead::create([
            'name' => $row['name'],
            'email' => $row['email'],
            'mobile_number' => $row['mobile_number'],
            'additional_mobile_number' => $row['additional_mobile_number'],
            // 'campaign_utm_source_id' =>  $row['campaign_utm_source_id'],
            // 'campaign_utm_medium_id' =>  $row['campaign_utm_medium_id'],
            // 'campaign_utm_campaign_id' =>  $row['campaign_utm_campaign_id'],
            'entry_user_id' => $entry_user,
            'creation_date' => Carbon::now(),
            'comment' =>$row['comment'],
            'passportId' => $row['passport_id'],
            'passport_expiry' => $row['passport_expiry'],
            'emiratesId' =>$row['emirates_id'],
            'address' => $row['address'],
            // 'user_id' => 1,
            'lead_source_id' => 1,
            'status_id' => 1,
            'city_id' =>$city_id,
            'project_id' => $project_id,

        ]);
        if(!empty($row['comment'])){
            $lead->update([
            'has_comment' => true,
        ]);
        }
        $leads_inquiry=LeadInquiry::create([
            'min_price' => $row['min_price'],
            'max_price' => $row['max_price'],
            'min_area' => $row['min_area'],
            'max_area' => $row['max_area'],
            'min_number_of_bedrooms' => $row['min_number_of_bedrooms'],
            'max_number_of_bedrooms' => $row['max_number_of_bedrooms'],
            'lead_id'=>$lead->id
            
        ]);
       
        if( str_contains( $row['property_types'], ',') ){
            $exploded_types = explode(",", $row['property_types']);
            foreach( $exploded_types as $item){
                $property_type=PropertyType::create([
                    'name' => $item,
                ]);
                DB::table('lead_inquiry_property_type')->insert([
                    'lead_inquiry_id'=>$leads_inquiry->id,
                    'property_type_id'=>$property_type->id,
                    
                ]);
            }
        }else{
            if(isset( $row['property_types'])){
                $property_type=PropertyType::create([
                    'name' => $row['property_types'],
                ]);
                DB::table('lead_inquiry_property_type')->insert([
                    'lead_inquiry_id'=>$leads_inquiry->id,
                    'property_type_id'=>$property_type->id,
                    
                ]);
            }
            
        }
        if( str_contains( $row['property_categories'], ',') ){
            $exploded_categories = explode(",", $row['property_categories']);
            foreach( $exploded_categories as $item){
                $property_category=PropertyCategory::create([
                    'name' => $row['property_categories'],
                ]);
                DB::table('lead_inquiry_property_category')->insert([
                    'lead_inquiry_id'=>$leads_inquiry->id,
                    'property_category_id'=>$property_category->id,
                    
                ]);
            }
        }else{
            if(isset( $row['property_categories'])){

            $property_category=PropertyCategory::create([
                'name' => $row['property_categories'],
            ]);
            DB::table('lead_inquiry_property_category')->insert([
                'lead_inquiry_id'=>$leads_inquiry->id,
                'property_category_id'=>$property_category->id,
                
            ]);
            }
        }
        if( str_contains( $row['property_status'], ',') ){
            $property_status = explode(",", $row['property_status']);
            foreach( $property_status as $item){
                $property_status=PropertyStatus::create([
                    'name' => $row['property_status'],
                ]);
                DB::table('lead_inquiry_property_status')->insert([
                    'lead_inquiry_id'=>$leads_inquiry->id,
                    'property_status_id'=>$property_status->id,
                    
                ]);
            }
        }else{
            if(isset( $row['property_status'])){

            $property_status=PropertyStatus::create([
                'name' => $row['property_status'],
            ]);
            DB::table('lead_inquiry_property_status')->insert([
                'lead_inquiry_id'=>$leads_inquiry->id,
                'property_status_id'=>$property_status->id,
                
            ]);
        }
        }
        if( str_contains( $row['payment_frequencies'], ',') ){
            $payment_frequencies = explode(",", $row['payment_frequencies']);
            foreach( $payment_frequencies as $item){
                $payment_frequency=PaymentFrequency::create([
                    'name' => $row['payment_frequencies'],
                ]);
                DB::table('lead_inquiry_payment_frequency')->insert([
                    'lead_inquiry_id'=>$leads_inquiry->id,
                    'payment_frequency_id'=>$payment_frequency->id,
                    
                ]);
            }
        }else{
            if(isset( $row['payment_frequencies'])){

            $payment_frequency=PaymentFrequency::create([
                'name' => $row['payment_frequencies'],
            ]);
            DB::table('lead_inquiry_payment_frequency')->insert([
                'lead_inquiry_id'=>$leads_inquiry->id,
                'payment_frequency_id'=>$payment_frequency->id,
                
            ]);
        }
        }
        if( str_contains( $row['property_amenities'], ',') ){
            $property_amenities = explode(",", $row['property_amenities']);
            foreach( $property_amenities as $item){
                $property_amenity=PropertyAmenity::create([
                    'name' => $row['property_amenities'],
                ]);
                DB::table('lead_inquiry_property_amenity')->insert([
                    'lead_inquiry_id'=>$leads_inquiry->id,
                    'property_amenity_id'=>$property_amenity->id,
                    
                ]);
            }
        }else{
            if(isset( $row['property_amenities'])){

            $property_amenity=PropertyAmenity::create([
                'name' => $row['property_amenities'],
            ]);
            DB::table('lead_inquiry_property_amenity')->insert([
                'lead_inquiry_id'=>$leads_inquiry->id,
                'property_amenity_id'=>$property_amenity->id,
                
            ]);
        }
        }
        return $lead;
    }
}
