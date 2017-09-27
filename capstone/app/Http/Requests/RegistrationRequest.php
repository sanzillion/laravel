<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class RegistrationRequest extends FormRequest
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
            'name' => 'required|unique:users',   
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'institution' => 'required',
            'phone_number' => 'required|numeric|min:12',
            'city' => 'required'
        ];
    }

    public function persist(){

        // auth()->login($user);
    }
}
