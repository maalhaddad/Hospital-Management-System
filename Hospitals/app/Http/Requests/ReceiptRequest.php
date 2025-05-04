<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiptRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مصرح له بإجراء هذا الطلب
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * قواعد التحقق من البيانات
     */
    public function rules(): array
    {
        return [
            'patient_id' => 'required|exists:patients,id',
            'Debit' => 'required|numeric|min:0',
            'description' => 'required|string|max:500',
        ];
    }

    /**
     * رسائل الخطأ المخصصة
     */
    public function messages(): array
    {
        return [
            'patient_id.required' => 'يرجى اختيار المريض',
            'patient_id.exists' => 'المريض المحدد غير موجود',
            'Debit.required' => 'يرجى إدخال المبلغ',
            'Debit.numeric' => 'المبلغ يجب أن يكون رقماً',
            'Debit.min' => 'المبلغ يجب أن يكون أكبر من أو يساوي صفر',
            'description.required' => 'يرجى إدخال البيان',
            'description.string' => 'البيان يجب أن يكون نصاً',
            'description.max' => 'البيان يجب ألا يتجاوز 500 حرف',
        ];
    }
}