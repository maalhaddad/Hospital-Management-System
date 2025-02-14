<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorUpdateRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'phone' => 'required',

            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'section_id' => 'required|exists:sections,id', //
        ];
    }


    public function attributes(): array
    {
        return [
            'email' => 'البريد الإلكتروني',
            'phone' => ' الهاتف',
            'name' => 'الاسم',
            'section_id' => 'القسم',
            'photo' => 'الصورة',
        ];
    }
}
