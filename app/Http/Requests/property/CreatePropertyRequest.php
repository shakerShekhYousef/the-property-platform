<?php

namespace App\Http\Requests\property;

use App\Exceptions\GeneralException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CreatePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>['required'],
            'makani_number'=>['required'],
            'floors'=>['required'],
            'price'=>['required'],
            'area'=>['required'],
            'address'=>['required'],
            'state'=>['required'],
            'property_number'=>['required'],
            'floor_number'=>['required','numeric'],
            'number_of_bedrooms'=>['required','numeric'],
            'number_of_bathrooms'=>['required','numeric'],
            'lat'=>['required'],
            'lng'=>['required'],
            'amenity_id.*'=>['required'],
            'inventory_name'=>['required'],
            'inventory_location'=>['required'],
            'QTY'=>['required'],
            'inventory_images.*'=>['required','mimes:jpg,png,jpeg,gif','max:2000'],
            'property_images.*'=>['required','mimes:jpg,png,jpeg,gif','max:2000'],
            'property_type_id'=>['required',Rule::exists('property_types','id')],
            'landlord_id'=>['required',Rule::exists('landlords','id')],
            'furniture_type_id'=>['required',Rule::exists('furniture_types','id')],
            'property_category_id'=>['required',Rule::exists('property_categories','id')],
            'city_id'=>['required',Rule::exists('cities','id')],
            'property_status_id'=>['required',Rule::exists('property_statuses','id')],
            'payment_frequency_id'=>['required',Rule::exists('payment_frequencies','id')],
        ];
    }

    public function messages()
    {
        return[
            'lat.required'=>'Please select a place on the map.',
            'lng.required'=>'Please select a place on the map.'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new GeneralException($validator->errors()->first());
    }

}
