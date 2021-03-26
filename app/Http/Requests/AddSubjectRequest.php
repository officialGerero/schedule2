<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSubjectRequest extends FormRequest
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
            'name_sub.unique:subjects,name_sub' => 'A subjects with the same name already exists',
            'name_teacher.required' => 'A teachers name is required',
            'name_teacher.max:60' => 'A teachers name can`t be longer than 60 characters',
            'group_id.required' => 'A group Id is required',
            'group_id.numeric' => 'A group Id is supposed to be a number',
            'group_id.max:100' => 'A group Id can`t be bigger than 100',
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
            'name_sub'=>'required|max:128|unique:subjects,name_sub',
            'name_teacher'=>'required|max:60',
            'group_id'=>'required|numeric|max:100',
            'semester' => 'required|numeric',
        ];
    }
}
