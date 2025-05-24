<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiagnosisRequest extends FormRequest
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
        $rules =  [
            'invoice_id' => 'required|exists:invoices,id',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'diagnosis' => 'required|string|min:10',
            'medicine'  => 'nullable|string|max:1000',
        ];

        if($this->has('review_date')) {
            $rules['review_date'] = 'required|date|after_or_equal:today';
        }
       return $rules;
    }

    public function messages(): array
    {
        $messages = [
            'invoice_id.required' => 'رقم الفاتورة مطلوب.',
            'invoice_id.exists'   => 'رقم الفاتورة غير موجود.',
            'patient_id.required' => 'رقم المريض مطلوب.',
            'patient_id.exists'   => 'رقم المريض غير موجود.',
            'doctor_id.required'  => 'رقم الطبيب مطلوب.',
            'doctor_id.exists'    => 'رقم الطبيب غير موجود.',
            'diagnosis.required'  => 'يرجى إدخال التشخيص.',
            'diagnosis.min'       => 'التشخيص يجب أن يحتوي على 10 أحرف على الأقل.',
            'medicine.max'        => 'عدد أحرف الأدوية كبير جدًا.',
            'review_date.required' => 'يرجى إدخال تاريخ المراجعة.',
            'review_date.date'    => 'تاريخ المراجعة يجب أن يكون تاريخًا صالحًا.',
            'review_date.after_or_equal' => 'تاريخ المراجعة يجب أن يكون اليوم أو بعده.',
        ];

        if($this->has('review_date'))
        {
        $messages['review_date.required'] = 'يرجى إدخال تاريخ المراجعة.';
        $messages['review_date.date'] = 'تاريخ المراجعة يجب أن يكون تاريخًا صالحًا.';
        $messages['review_date.after_or_equal'] = 'تاريخ المراجعة يجب أن يكون اليوم أو بعده.';
        }
       
        return $messages;
    }
}
