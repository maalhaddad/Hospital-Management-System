<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:doctors,email',
            'password'  => 'required|string|min:8',
            'phone' => 'required|numeric',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'section_id' => 'required|exists:sections,id', //
        ];


    }

    public function attributes(): array
    {
        return [
            'email' => 'البريد الإلكتروني',
            'password' => 'كلمة المرور',
            'phone' => ' الهاتف',
            'name' => 'الاسم',
            'section_id' => 'القسم',
            'photo' => 'الصورة',
        ];
    }


    // public function messages(): array
    // {
    //     return [
    //         'email.required' => 'يرجى إدخال البريد الإلكتروني.',
    //         'email.email' => 'البريد الإلكتروني غير صالح.',
    //         'email.unique' => 'البريد الإلكتروني مسجل بالفعل.',
    //         'password.required' => 'كلمة المرور مطلوبة.',
    //         'password.min' => 'يجب أن تكون كلمة المرور على الأقل 8 أحرف.',
    //         'phone.required' => 'يرجى إدخال رقم الهاتف.',
    //         'phone.unique' => 'رقم الهاتف مسجل بالفعل.',
    //         'price.required' => 'يرجى إدخال السعر.',
    //         'price.numeric' => 'السعر يجب أن يكون رقماً.',
    //         'name.required' => 'يرجى إدخال اسم الدكتور.',
    //         'photo.image' => 'يجب أن تكون الصورة من نوع صورة.',
    //         'photo.mimes' => 'يجب أن تكون الصورة بصيغة jpeg أو png أو jpg أو gif.',
    //         'photo.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجابايت.',
    //         'section_id.required' => 'يرجى اختيار القسم.',
    //         'section_id.exists' => 'القسم المحدد غير موجود.',
    //     ];
    // }
}
