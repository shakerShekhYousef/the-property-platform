<?php

namespace App\Http\Requests\backend\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:191'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'language' => ['required'],
            'role_id' => ['nullable',Rule::exists('roles','id')],
            'image'=> ['nullable'],
        ];
    }
}
