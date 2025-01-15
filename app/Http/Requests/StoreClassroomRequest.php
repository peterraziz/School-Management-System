<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class StoreClassroomRequest extends FormRequest
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
        // 'Name' => 'required',
        // 'Name_class_en' => 'required',
        // if i wanna do it with the form's name 'List_Classes'
        'List_Classes.*.Name' => 'required',
        'List_Classes.*.Name_class_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'Name.required' => trans('validation.required'),
            // 'Name_classes_en.required' => trans('validation.required'),
            'List_Classes.*.Name.required' => trans('validation.required'),
            'List_Classes.*.Name_class_en.required' => trans('validation.required'),
        ];
    }
}
