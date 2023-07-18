<?php

namespace App\Repositories\dashboard;

use App\Exceptions\GeneralException;
use App\Models\InventoryItem;
use App\Models\InventoryItemImage;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Tenant;
use App\Repositories\BaseRepository;
use App\Repositories\traits\UploadFiles;
use Illuminate\Support\Facades\DB;

class PropertyRepository extends BaseRepository
{
    use UploadFiles;

    public function model()
    {
        return Property::class;
    }

    public function create(array $data)
    {
       return DB::transaction(function () use ($data){
           $property = parent::create([
               'name'=>$data['name'],
               'makani_number'=>$data['makani_number'],
               'p-number'=>$data['p-number'],
               'floors'=>$data['floors'],
               'price'=>$data['price'],
               'area'=>$data['area'],
               'address'=>$data['address'],
               'notes'=>$data['notes'],
               'state'=>$data['state'],
               'property_number'=>$data['property_number'],
               'floor_number'=>$data['floor_number'],
               'number_of_bedrooms'=>$data['number_of_bedrooms'],
               'number_of_bathrooms'=>$data['number_of_bathrooms'],
               'is_published'=>isset($data['is_published']) ? 1 : 0,
               'lat'=>$data['lat'],
               'lng'=>$data['lng'],
               'description'=>$data['description'],
               'property_type_id'=>$data['property_type_id'],
               'landlord_id'=>$data['landlord_id'],
               'furniture_type_id'=>$data['furniture_type_id'],
               'property_category_id'=>$data['property_category_id'],
               'city_id'=>$data['city_id'],
               'property_status_id'=>$data['property_status_id'],
               'payment_frequency_id'=>$data['payment_frequency_id'],
           ]);
           $invetory = InventoryItem::create([
               'name'=>$data['inventory_name'],
               'QTY'=>$data['QTY'],
               'location'=>$data['inventory_name'],
               'property_id'=>$property->id
           ]);
           if (isset($data['inventory_images'])){
               foreach ($data['inventory_images'] as $image){
                   InventoryItemImage::create([
                       'path'=>$this->UploadImage(
                           $image,
                           FILE_INVENTORY_PHOTO_PATH.'/'.$property->id),
                       'inventory_item_id'=>$invetory->id
                   ]);
               }
           }
           if (isset($data['is_occupied'])){
               $tenant= Tenant::find($data['tenant_id']);
               $tenant->update(['property_id'=>$property->id]);
           }
           if (isset($data['property_images'])){
               foreach ($data['property_images'] as $image){
                   PropertyImage::create([
                       'path'=>$this->UploadImage(
                           $image,
                           FILE_PROPERTY_PHOTO_PATH.'/'.$property->id),
                       'property_id'=>$property->id
                   ]);
               }
           }
           if (isset($data['amenity_id'])){
               foreach ($data['amenity_id'] as $amenity){
                   $property->propertyAmenities()->attach($amenity);
               }
           }
           return $property;
       });
       throw new GeneralException('error');
    }

    public function update(Property $property,array $data){
        return DB::transaction(function () use ($property,$data){
            if ($property->update([
                'name'=>$data['name'] !== null ? $data['name'] : $property->name,
                'makani_number'=>$data['makani_number'] !== null ? $data['makani_number'] : $property->makani_number,
                'p-number'=>$data['p-number'] !== null ? $data['p-number'] : $property["p-number"],
                'floors'=>$data['floors'] !== null ? $data['floors'] : $property->floors,
                'price'=>$data['price'] !== null ? $data['price'] : $property->price,
                'area'=>$data['area'] !== null ? $data['area'] : $property->area,
                'address'=>$data['address'] !== null ? $data['address'] : $property->address,
                'notes'=>$data['notes'] !== null ? $data['notes'] : $property->notes,
                'state'=>$data['state'] !== null ? $data['state'] : $property->state,
                'property_number'=>$data['property_number'] !== null ? $data['property_number'] : $property->property_number,
                'floor_number'=>$data['floor_number'] !== null ? $data['floor_number'] : $property->floor_number,
                'number_of_bedrooms'=>$data['number_of_bedrooms'] !== null ? $data['number_of_bedrooms'] : $property->number_of_bedrooms,
                'number_of_bathrooms'=>$data['number_of_bathrooms' ]!== null ? $data['number_of_bathrooms'] : $property->number_of_bathrooms,
                'is_published'=>isset($data['is_published']) ? 1 : 0,
                'is_occupied'=>isset($data['is_occupied']) ? 1 : 0,
                'lat'=>$data['lat'] !== null ? $data['lat'] : $property->lat,
                'lng'=>$data['lng'] !== null ? $data['lng'] : $property->lng,
                'description'=>$data['description'] !== null ? $data['description'] : $property->description,
                'property_type_id'=>$data['property_type_id'] !== null ? $data['property_type_id'] : $property->property_type_id,
                'landlord_id'=>$data['landlord_id'] !== null ? $data['landlord_id'] : $property->landlord_id,
                'furniture_type_id'=>$data['furniture_type_id'] !== null ? $data['furniture_type_id'] : $property->furniture_type_id,
                'property_category_id'=>$data['property_category_id'] !== null ? $data['property_category_id'] : $property->property_category_id,
                'city_id'=>$data['city_id'] !== null ? $data['city_id'] : $property->city_id,
                'property_status_id'=>$data['property_status_id'] !== null ? $data['property_status_id'] : $property->property_status_id,
                'payment_frequency_id'=>$data['payment_frequency_id'] !== null ? $data['payment_frequency_id'] : $property->payment_frequency_id,
            ])){
                $property->inventoryItems()->update([
                    'name'=>$data['inventory_name'],
                    'QTY'=>$data['QTY'],
                    'location'=>$data['inventory_name'],
                    'property_id'=>$property->id
                ]);
                if (isset($data['inventory_images'])){
                    foreach ($data['inventory_images'] as $image){
                        InventoryItemImage::create([
                            'path'=>$this->UploadImage(
                                $image,
                                FILE_INVENTORY_PHOTO_PATH.'/'.$property->id),
                            'inventory_item_id'=>$property->inventoryItems()->first()->id
                        ]);
                    }
                }
                if (isset($data['is_occupied'])){
                    $tenant= Tenant::find($data['tenant_id']);
                    $tenant->update(['property_id'=>$property->id]);
                }
                if (isset($data['property_images'])){
                    foreach ($data['property_images'] as $image){
                        PropertyImage::create([
                            'path'=>$this->UploadImage(
                                $image,
                                FILE_PROPERTY_PHOTO_PATH.'/'.$property->id),
                            'property_id'=>$property->id
                        ]);
                    }
                }
                $property->propertyAmenities()->sync($data['amenity_id']);
                return $property;
            }
            throw new GeneralException('error');
        });
    }


}
