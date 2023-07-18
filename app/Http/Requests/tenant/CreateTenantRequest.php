<?php

namespace App\Http\Requests\tenant;

use App\Exceptions\GeneralException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTenantRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>['required'],
            'email'=>['required', 'email', 'max:191', Rule::unique('tenants','email')],
            'password'=>['required', 'min:6', 'confirmed'],
            'trade_licence'=>['required'],
            'trade_licence_expiry'=>['required'],
            'TRN'=>['required'],
            'date_of_birthday'=>['required'],
            'gender'=>['required'],
            'marital_status'=>['required'],
            'mobile_number'=>['required'],
            'additional_mobile_number'=>['required'],
            'national_number'=>['required'],
            'national_id_expiry'=>['required'],
            'passport_number'=>['required'],
            'passport_expiry'=>['required'],
            'visa_state'=>['required'],
            'nationality'=>['required'],
            'address1'=>['required'],
            'address2'=>['required'],
            'postcode'=>['required'],
            'national_id_photo'=>['required','mimes:jpg,png,jpeg,gif','max:2000'],
            'visa_photo'=>['required','mimes:jpg,png,jpeg,gif','max:2000'],
            'passport_photo'=>['required','mimes:jpg,png,jpeg,gif','max:2000'],
            'city_id'=>['required',Rule::exists('cities','id')],
            'property_id'=>['required',Rule::exists('properties','id')],
        ];
    }

    public function messages()
    {
        return[
            'email.unique'=>'Email has already taken.',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new GeneralException($validator->errors()->first());
    }

}
