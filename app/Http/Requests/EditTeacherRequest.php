<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTeacherRequest extends FormRequest
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
            'name_sub.required' => 'A subjects name is required',
            'name_sub.max:128' => 'A subjects name can`t be longer than 128 characters',
            'name_teacher.required' => 'A teachers name is required',
            'name_teacher.max:60' => 'A teachers name can`t be longer than 60 characters',
            'groupID.required' => 'A group ID is required',
            'groupID.numeric' => 'A group ID is supposed to be a number',
            'groupID.max:100' => 'A group ID can`t be bigger than 100',
            'semester.required' => 'A semester is required',
            'semester.numeric' => 'A semester is supposed to be a number',
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
            'name_sub'=>'required|max:128',
            'name_teacher'=>'required|max:60',
            'groupID'=>'required|numeric|max:100',
            'semester' => 'required|numeric',
        ];
    }
}
