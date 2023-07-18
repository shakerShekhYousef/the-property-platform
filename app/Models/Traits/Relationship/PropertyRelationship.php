<?php

namespace App\Models\Traits\Relationship;

use App\Models\City;
use App\Models\FurnitureType;
use App\Models\InventoryItem;
use App\Models\Landlord;
use App\Models\PaymentFrequency;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyCategory;
use App\Models\PropertyImage;
use App\Models\PropertyStatus;
use App\Models\PropertyType;

trait PropertyRelationship
{
    public function propertyType(){
        return $this->belongsTo(PropertyType::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function landlord(){
        return $this->belongsTo(Landlord::class);
    }

    public function propertyAmenities(){
        return
            $this->belongsToMany(
                PropertyAmenity::class,
                'property_amenity_property',
                'property_id',
                'property_amenity_id');
    }

    public function furnitureType(){
        return $this->belongsTo(FurnitureType::class);
    }

    public function propertyCategory(){
        return $this->belongsTo(PropertyCategory::class);
    }

    public function propertyStatus(){
        return $this->belongsTo(PropertyStatus::class);
    }

    public function propertyImages(){
        return $this->hasMany(PropertyImage::class);
    }

    public function paymentFrequency(){
        return $this->belongsTo(PaymentFrequency::class);
    }

    public function inventoryItems(){
        return $this->hasMany(InventoryItem::class);
    }

}
