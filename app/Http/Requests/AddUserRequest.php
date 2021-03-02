<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.max:255' => 'Name can`t be longer than 255 characters',
            'email.required' => 'An email is required',
            'email.email' => 'Please provide a valid email',
            'email.max:255' => 'Email can`t be longer than 255 characters',
            'email.unique:users' => 'User with this email already exists',
            'password.required' => 'A password is required',
            'password.min:8' => 'Password minimal length is 8 characters',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }
}
