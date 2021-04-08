<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchSchedulesRequest extends FormRequest
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
            'search.required' => 'You haven`t specified the group number',
            'search.numeric' => 'The field must be a number',
            'search.max:8' => 'The field can`t be more than 8 digits',
            'field.required' => 'Please select a field you want to be searched on',
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
            'search'=>'required|numeric|max:8',
            'field'=>'required',
        ];
    }
}
