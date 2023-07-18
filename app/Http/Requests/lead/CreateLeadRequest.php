<?php

namespace App\Http\Requests\lead;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\GeneralException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class CreateLeadRequest extends FormRequest
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
            'email'=>['required', 'email', 'max:191', Rule::unique('leads','email')],
            'mobile_number'=>['required'],
            'additional_mobile_number'=>['max:13'],
            'min_area'=>['nullable','lt:max_area'],
            'max_area'=>['nullable','gt:min_area'],
            'min_number_of_bedrooms'=>['nullable','lt:max_number_of_bedrooms'],
            'max_number_of_bedrooms'=>['nullable','gt:min_number_of_bedrooms'],
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new GeneralException($validator->errors()->first());
    }
}
