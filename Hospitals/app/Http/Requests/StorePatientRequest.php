<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            "name" => 'required',
            "email" => 'required|email|unique:patients,email,'.$this->route('patient').',id',
            "password" => 'required|sometimes',
            "Phone" => 'required|numeric|unique:patients,Phone,'.$this->route('patient').',id',
            'Date_Birth' => 'required|date|date_format:Y-m-d',
            "Gender" => 'required|integer|in:1,2',
            "Blood_Group" => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('validation.required'),
            'email.unique' => __('validation.unique'),
            'password.required' => __('validation.required'),
            'password.sometimes' => __('validation.sometimes'),
            'Phone.required' => __('validation.required'),
            'Phone.unique' => __('validation.unique'),
            'Phone.numeric' => __('validation.numeric'),
            'Date_Birth.required' => __('validation.required'),
            'Date_Birth.date' => __('validation.date'),
            'Gender.required' => __('validation.required'),
            'Gender.integer' => __('validation.integer'),
            'Blood_Group.required' => __('validation.required'),
        ];
    }
}
