<?php

namespace App\Http\Requests\property;

use App\Exceptions\GeneralException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdatePropertyRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['nullable'],
            'makani_number' => ['nullable'],
            'p-number' => ['nullable'],
            'floors' => ['nullable'],
            'price' => ['nullable'],
            'area' => ['nullable'],
            'address' => ['nullable'],
            'state' => ['nullable'],
            'property_number' => ['nullable'],
            'floor_number' => ['nullable', 'numeric'],
            'number_of_bedrooms' => ['nullable', 'numeric'],
            'number_of_bathrooms' => ['nullable', 'numeric'],
            'lat' => ['nullable'],
            'lng' => ['nullable'],
            'amenity_id.*'=>['nullable'],
            'inventory_name'=>['nullable'],
            'inventory_location'=>['nullable'],
            'QTY'=>['nullable'],
            'inventory_images.*'=>['nullable','mimes:jpg,png,jpeg,gif','max:2000'],
            'property_images.*'=>['nullable','mimes:jpg,png,jpeg,gif','max:2000'],
            'property_type_id' => ['nullable', Rule::exists('property_types', 'id')],
            'landlord_id' => ['nullable', Rule::exists('landlords', 'id')],
            'furniture_type_id' => ['nullable', Rule::exists('furniture_types', 'id')],
            'property_category_id' => ['nullable', Rule::exists('property_categories', 'id')],
            'city_id' => ['nullable', Rule::exists('cities', 'id')],
            'property_status_id' => ['nullable', Rule::exists('property_statuses', 'id')],
            'payment_frequency_id' => ['nullable', Rule::exists('payment_frequencies', 'id')],
        ];
    }
    public function messages()
    {
        return[
            'lat.nullable'=>'Please select a place on the map.',
            'lng.nullable'=>'Please select a place on the map.'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new GeneralException($validator->errors()->first());
    }
}
