<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                    'name' => 'required|string',
                    'insurance_code' => 'required|unique:insurances,insurance_code,'.$this->route('insurance').',id',
                    'discount_percentage' => 'required|numeric',
                    'Company_rate' =>'required|numeric',
                    'notes' => 'nullable|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('insurance.Company_name')  ,
            'insurance_code' =>__('insurance.Company_code') ,
            'discount_percentage' =>__('insurance.discount_percentage') ,
            'Company_rate' =>__('insurance.Insurance_bearing_percentage'),
            'notes' => __('insurance.notes') ,
        ];
    }
}
