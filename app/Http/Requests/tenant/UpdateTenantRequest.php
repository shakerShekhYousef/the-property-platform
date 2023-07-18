<?php

namespace App\Http\Requests\tenant;

use App\Exceptions\GeneralException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTenantRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>['nullable'],
            'email'=>['email', 'max:191'],
            'password'=>['nullable', 'min:6', 'confirmed'],
            'trade_licence'=>['nullable'],
            'trade_licence_expiry'=>['nullable'],
            'TRN'=>['nullable'],
            'date_of_birthday'=>['nullable'],
            'gender'=>['nullable'],
            'marital_status'=>['nullable'],
            'mobile_number'=>['nullable'],
            'additional_mobile_number'=>['nullable'],
            'national_number'=>['nullable'],
            'national_id_expiry'=>['nullable'],
            'passport_number'=>['nullable'],
            'passport_expiry'=>['nullable'],
            'visa_state'=>['nullable'],
            'nationality'=>['nullable'],
            'address1'=>['nullable'],
            'address2'=>['nullable'],
            'postcode'=>['nullable'],
            'national_id_photo'=>['nullable','mimes:jpg,png,jpeg,gif','max:2000'],
            'visa_photo'=>['nullable','mimes:jpg,png,jpeg,gif','max:2000'],
            'passport_photo'=>['nullable','mimes:jpg,png,jpeg,gif','max:2000'],
            'city_id'=>['nullable',Rule::exists('cities','id')],
            'property_id'=>['nullable',Rule::exists('properties','id')]
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
