<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoHospitalRequest extends FormRequest
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
            'vc_nome'=>'required|string|max:255|min:3|unique:tipo_hospitais,vc_nome,except,id'
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'O campo é obrigatório.',
            'string' => 'Digite só caracteres.',
            'max' => 'O campo precisa ter no máximo :max caracteres.',
            'min' => 'O campo precisa ter no mínimo :min caracteres.',
            'unique' => 'Já existe este tipo de hospital'
        ];
    }
}
