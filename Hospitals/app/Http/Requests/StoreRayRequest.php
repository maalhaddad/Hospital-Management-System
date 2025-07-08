<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRayRequest extends FormRequest
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

        if ($this->isMethod('POST')) {
            $Rules = [
                'description' => 'required|string',
                'invoice_id' => 'required|exists:invoices,id',
                'patient_id' => 'required|exists:patients,id',
                'doctor_id' => 'required|exists:doctors,id',
            ];
        }

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $Rules = [
                'employee_id' => 'nullable|exists:ray_employees,id',
                'description_employee' => 'required|string',
                // 'photo' => 'required|file',
                 'attachments' => 'required|array',
                //  'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf,docx|max:2048',
            ];           
        }
        return $Rules;
    }

    public function messages()
    {
        return [
            'description.required' => 'يجب ادخال الوصف',
            'description.string' => 'يجب ادخال نص',
            'invoice_id.required' => 'يجب ادخال الفاتورة',
            'invoice_id.exists' => 'يجب ادخال فاتورة صحيحة',
            'patient_id.required' => 'يجب ادخال المريض',
            'patient_id.exists' => 'يجب ادخال مريض صحيح',
            'doctor_id.required' => 'يجب ادخال الطبيب',
            'doctor_id.exists' => 'يجب ادخال طبيب صحيح',
            'employee_id.exists' => 'يجب ادخال موظف صحيح',
            'description_employee.required' => 'يجب ادخال الوصف',
            'description_employee.string' => 'يجب ادخال نص',
            'photo.mimes' => 'يجب ادخال صورة',
            'photo.file' => 'يجب ادخال ملف',
        ];
    }
}
