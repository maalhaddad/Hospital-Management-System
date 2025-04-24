<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmbulanceRequest extends FormRequest
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
        'car_number' => 'required|string|max:255|unique:ambulances,car_number,'.$this->route('ambulance').',id',
        'car_model' => 'required|string|max:255',
        'car_year_made' => 'required|integer|digits:4',
        'car_type' => 'required',
        'driver_name' => 'required|string|max:255',
        'driver_license_number' => 'required|string|max:255',
        'driver_phone' => 'required|string|max:15',
        'notes' => 'nullable|string',
        ];
    }

    public function attributes(): array
    {
        return [
        'car_number' => __('ambulances.car_number') ,
        'car_model' =>  __('ambulances.car_model'),
        'car_year_made' => __('ambulances.manufacture_year') ,
        'car_type' => __('ambulances.car_type') ,
        'driver_name' => __('ambulances.driver_name') ,
        'driver_license_number' => __('ambulances.license_number') ,
        'driver_phone' => __('ambulances.phone_number') ,
        'notes' => __('ambulances.notes') ,
        ];
    }
}
