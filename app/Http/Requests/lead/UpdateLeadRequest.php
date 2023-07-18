<?php

namespace App\Http\Requests\lead;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\GeneralException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UpdateLeadRequest extends FormRequest
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
            'mobile_number'=>['nullable'],
            'additional_mobile_number'=>['nullable','max:13'],
            'comment'=>['nullable'],
            'passportId'=>['nullable'],
            'passport_expiry'=>['nullable'],
            'emiratesId'=>['nullable'],
            'address'=>['nullable'],
            'city_id'=>['nullable',Rule::exists('cities','id')],
            'status_id'=>['nullable',Rule::exists('lead_statuses','id')],
            'project_id'=>['nullable',Rule::exists('lead_projects','id')],
            'user_id'=>['nullable'],
            'min_price'=>['nullable','lt:max_price'],
            'max_price'=>['nullable','gt:min_price'],
            'min_area'=>['nullable','lt:max_area'],
            'max_area'=>['nullable','gt:min_area'],
            'min_number_of_bedrooms'=>['nullable','lt:max_number_of_bedrooms'],
            'max_number_of_bedrooms'=>['nullable','gt:min_number_of_bedrooms'],
           
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
