<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'email|unique:students,email,'.$this->id, //.$this->id means: if the updated mail is the same mail, pass it.
            // 'password' => 'required|string|min:4|max:15',
            'gender_id' => 'required',
            'nationalitie_id' => 'required',
            // 'blood_id' => 'required',
            'Date_Birth' => 'required|date|date_format:Y-m-d',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
        ];
    }
}
