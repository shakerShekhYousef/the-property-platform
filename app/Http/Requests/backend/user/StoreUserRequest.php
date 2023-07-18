<?php

namespace App\Http\Requests\backend\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;
class StoreUserRequest extends FormRequest
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

            'role_id' => ['required',Rule::exists('roles','id')],
            'name' => ['required', 'max:191'],
            'email' => ['required', 'email', 'max:191', Rule::unique('users')],
            'phone_number' => ['required'],
            'language' => ['required'],
            'password' => ['required', 'confirmed'],
            'image'=> ['nullable'],

        ];
    }
}
