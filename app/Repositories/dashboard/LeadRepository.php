<?php

namespace App\Repositories\dashboard;

use App\Models\Lead;
use App\Models\PropertyType;
use App\Models\PropertyCategory;
use App\Models\PropertyStatus;
use App\Models\PaymentFrequency;
use App\Models\PropertyAmenity;
use App\Models\LeadInquiry;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Carbon\Carbon;


class LeadRepository extends BaseRepository
{
    public function model()
    {
        return Lead::class;
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data){
            $lead = parent::create([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'mobile_number'=>$data['mobile_number'],
                'comment'=>$data['comment'],
                'passportId'=>$data['passport_id'],
                'passport_expiry'=>$data['passport_expiry'],
                'emiratesId'=>$data['emirates_id'],
                'address'=>$data['address'],
                'city_id'=>$data['city'],
                'entry_user_id'=>auth()->user()->id,
                'creation_date' => Carbon::now(),
                'lead_source_id'=>3,
                'status_id'=>1,
                'project_id'=>$data['project_name'],
                // 'user_id'=>
            ]);
            if($data['comment']){
                $lead->update([
                    'has_comment' => true
                ]);
            }
            if(strlen($data['additional_mobile_number']) > 4){
                $lead->update([
                    'additional_mobile_number'=>$data['additional_mobile_number'],

                ]);

            }
            if($data['min_price'] ==null && $data['max_price'] == null&& $data['min_area'] ==null 
                    && $data['max_area'] ==null && $data['min_number_of_bedrooms'] ==null 
                    && $data['max_number_of_bedrooms'] ==null ){
                        
                    }else{
                        $leads_inquiry=LeadInquiry::create([
                            'min_price'=>$data['min_price'],
                            'max_price'=>$data['max_price'],
                            'min_area'=>$data['min_area'],
                            'max_area'=>$data['max_area'],
                            'min_number_of_bedrooms'=>$data['min_number_of_bedrooms'],
                            'max_number_of_bedrooms'=>$data['max_number_of_bedrooms'],
                            'lead_id'=>$lead->id
                        ]);
                        if(isset($data['property_types'])){
                            foreach($data['property_types'] as $item){
                                $property_type=PropertyType::find($item);
                                DB::table('lead_inquiry_property_type')->insert([
                                    'lead_inquiry_id'=>$leads_inquiry->id,
                                    'property_type_id'=>$property_type->id,
                                    
                                ]);
                                }
                        }
                        if(isset($data['property_categories'])){
                            foreach($data['property_categories'] as $item){
                                $property_category=PropertyCategory::find($item);
                                DB::table('lead_inquiry_property_category')->insert([
                                    'lead_inquiry_id'=>$leads_inquiry->id,
                                    'property_category_id'=>$property_category->id,
                                    
                                ]);
                            }
                        }
                        if(isset($data['property_status'])){
                            foreach($data['property_status'] as $item){
                                $property_status=PropertyStatus::find($item);
                                DB::table('lead_inquiry_property_status')->insert([
                                    'lead_inquiry_id'=>$leads_inquiry->id,
                                    'property_status_id'=>$property_status->id,
                                    
                                ]);
                            }
                        }
                        if(isset($data['payment_frequencies'])){
                            foreach($data['payment_frequencies'] as $item){
                                $payment_frequencies=PaymentFrequency::find($item);
                                DB::table('lead_inquiry_payment_frequency')->insert([
                                    'lead_inquiry_id'=>$leads_inquiry->id,
                                    'payment_frequency_id'=>$payment_frequencies->id,
                                    
                                ]);
                            }
                        }
                        if(isset($data['property_amenities'])){
                            foreach($data['property_amenities'] as $item){
                                $property_amentities=PropertyAmenity::find($item);
                                DB::table('lead_inquiry_property_amenity')->insert([
                                    'lead_inquiry_id'=>$leads_inquiry->id,
                                    'property_amenity_id'=>$property_amentities->id,
                                    
                                ]);
                            }
                        }
                    }
            return $lead;
        });

        return new GeneralException('error');
    }

    public function update(Lead $lead,array $data){
        // dd($data);
        return DB::transaction(function () use ($lead,$data){
            if ($lead->update([
                'name'=>$data['name'] !== null ? $data['name'] : $lead->name,
                'email'=>$data['email'] !== null ? $data['email'] : $lead->email,
                'mobile_number'=>$data['mobile_number'] !== null ? $data['mobile_number'] : $lead->mobile_number,
                'additional_mobile_number'=>$data['additional_mobile_number'],
                'comment'=>$data['comment'],
                'passportId'=>$data['passport_id'],
                'passport_expiry'=>$data['passport_expiry'],
                'emiratesId'=>$data['emirates_id'],
                'address'=>$data['address'],
                'city_id'=>$data['city'],
                'status_id'=>$data['status'] !== null ? $data['status'] : $lead->status_id,
                'project_id'=>$data['project_name'],
                'user_id'=>$data['assigned_agent'],
            ])){
                if($data['comment']){
                    $lead->update([
                        'has_comment' => true
                    ]);
                }
                $leads_inquiry=LeadInquiry::where('lead_id',$lead->id)->first();
                if(isset($leads_inquiry)){
                    $leads_inquiry->update([
                        'min_price'=>$data['min_price'],
                        'max_price'=>$data['max_price'],
                        'min_area'=>$data['min_area'],
                        'max_area'=>$data['max_area'],
                        'min_number_of_bedrooms'=>$data['min_number_of_bedrooms'],
                        'max_number_of_bedrooms'=>$data['max_number_of_bedrooms'],
                    ]);
                }else{
                    $leads_inquiry=LeadInquiry::create([
                        'min_price'=>$data['min_price'],
                        'max_price'=>$data['max_price'],
                        'min_area'=>$data['min_area'],
                        'max_area'=>$data['max_area'],
                        'min_number_of_bedrooms'=>$data['min_number_of_bedrooms'],
                        'max_number_of_bedrooms'=>$data['max_number_of_bedrooms'],
                        'lead_id'=>$lead->id
                    ]);  
                }

                    if(isset($data['property_types']) && isset($leads_inquiry) ){
                        DB::table('lead_inquiry_property_type')->where('lead_inquiry_id',$leads_inquiry->id)
                        ->delete();
                        foreach($data['property_types'] as $item){
                            DB::table('lead_inquiry_property_type')->insert([
                                'lead_inquiry_id'=>$leads_inquiry->id,
                                'property_type_id'=>$item,
                            ]);
                        }
                    }
                    if(isset($data['property_categories'])){
                        DB::table('lead_inquiry_property_category')->where('lead_inquiry_id',$leads_inquiry->id)
                        ->delete();
                        foreach($data['property_categories'] as $item){
                        DB::table('lead_inquiry_property_category')->insert([
                            'lead_inquiry_id'=>$leads_inquiry->id,
                            'property_category_id'=>$item,
                            
                        ]);
                    }}
                    if(isset($data['property_status'])){
                        DB::table('lead_inquiry_property_status')->where('lead_inquiry_id',$leads_inquiry->id)
                        ->delete();
                        foreach($data['property_status'] as $item){
                            DB::table('lead_inquiry_property_status')->insert([
                                'lead_inquiry_id'=>$leads_inquiry->id,
                                'property_status_id'=>$item,
                                
                            ]);
                    }}
                    if(isset($data['payment_frequencies'])){
                        DB::table('lead_inquiry_payment_frequency')->where('lead_inquiry_id',$leads_inquiry->id)
                        ->delete();
                        foreach($data['payment_frequencies'] as $item){
                            DB::table('lead_inquiry_payment_frequency')->insert([
                                'lead_inquiry_id'=>$leads_inquiry->id,
                                'payment_frequency_id'=>$item,
                                
                            ]);
                    }}
                    if(isset($data['property_amenities'])){
                        DB::table('lead_inquiry_property_amenity')->where('lead_inquiry_id',$leads_inquiry->id)
                        ->delete();
                        foreach($data['property_amenities'] as $item){
                            DB::table('lead_inquiry_property_amenity')->insert([
                                'lead_inquiry_id'=>$leads_inquiry->id,
                                'property_amenity_id'=>$item,
                                
                            ]);
                        }}
                
               
                return $lead;
            }
            throw new GeneralException('error');
        });
    }
}
