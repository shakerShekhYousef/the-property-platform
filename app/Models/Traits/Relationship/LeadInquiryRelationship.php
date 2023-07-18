<?php

namespace App\Models\Traits\Relationship;

use App\Models\LeadInquiriesLocation;
use App\Models\PaymentFrequency;
use App\Models\PropertyAmenity;
use App\Models\PropertyCategory;
use App\Models\PropertyStatus;
use App\Models\PropertyType;
use App\Models\User;

trait LeadInquiryRelationship
{
    public function leadInquiryLocations(){
        return $this->hasMany(LeadInquiriesLocation::class);
    }
    public function propertyCategories(){
        return
            $this->belongsToMany(
                PropertyCategory::class,
                'lead_inquiry_property_category',
                'lead_inquiry_id',
                'property_category_id'
                );
    }

    public function propertyStatuses(){
        return
            $this->belongsToMany(
                PropertyStatus::class,
                'lead_inquiry_property_status',
                'lead_inquiry_id',
                'property_status_id'
               );
    }
    public function paymentFrequencies(){
        return
            $this->belongsToMany(
                PaymentFrequency::class,
                'lead_inquiry_payment_frequency',
                'lead_inquiry_id',
                'payment_frequency_id'
            );
    }

    public function propertyTypes(){
        return
            $this->belongsToMany(
                PropertyType::class,
                'lead_inquiry_property_type',
                'lead_inquiry_id',
                'property_type_id'
                );
    }

    public function propertyAmenities(){
        return
            $this->belongsToMany(
                PropertyAmenity::class,
                'lead_inquiry_property_amenity',
                'lead_inquiry_id',
                'property_amenity_id'
                );
    }
}
