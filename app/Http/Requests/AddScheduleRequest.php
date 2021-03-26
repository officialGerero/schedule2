<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddScheduleRequest extends FormRequest
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
            'day.required'=>'You have to provide a day',
            'time.required'=>'You haven`t specified the time',
            'subject_id.required'=>'Subject id is required',
            'subject_id.numeric'=>'Subject id must be a number',
            'subject_id.exists:subjects,id'=>'Subject with this id doesn`t exist',
            'group_id.required'=>'Group id is required',
            'group_id.numeric'=>'Group id must be a number',
            'group_id.exists:users,id'=>'Group with this id doesn`t exist',
            'classroom.required'=>'You haven`t specified classrooms number',
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
            'day'=>'required',
            'time'=>'required',
            'subject_id'=>'required|numeric|exists:subjects,id',
            'group_id'=>'required|numeric|exists:users,id',
            'classroom'=>'required',
        ];
    }
}
