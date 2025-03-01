<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradesRequest extends FormRequest
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
            'Name' => 'required',
            // Instead of typing it in Controller===
            // code for "Unique" not repeating the same coloumn name in the table:
            // return [
            //     'Name' => 'required|unique:grades,name->ar,'.$this->id,
            //     'Name_en' => 'required|unique:grades,name->en,'.$this->id,
            // ];
        ];
    }

    public function messages()
{
    return [
        'Name.required' =>  trans('validation.required'),
    ];
    // Instead of typing it in Controller===
    // return [
    //     'Name.required' => trans('validation.required'),
    //     'Name.unique' => trans('validation.unique'),
    //     'Name_en.required' => trans('validation.required'),
    //     'Name_en.unique' => trans('validation.unique'),
    // ];
}
}
