<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoRequest extends FormRequest
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
            'first_name'=>'required|max:255|min:4',
            'last_name'=>'required|max:255|min:4',
            'genero'=>'required',
            'vc_path'=>'required|image:png,jpeg,jpg',
            'especialidades_id'=>'required|exists:especialidades,id',
            'areas_id'=>'required|exists:hospital_areas,id',
            'hospitais_id'=>'required|exists:hospitais,id'
        ];
    }
}
