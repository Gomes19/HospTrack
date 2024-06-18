<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospitalUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'hospital_name' => ['required', 'string', 'max:255'],
            'hospital_type' => ['required'],
            'hospital_area' => ['required'],
            'hospital_servico' => ['required'],
            'logotipo' =>  'image:png,jpg, jpeg',
            'documento' => 'file',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public  function messages() : array
    {
        return [
            'required' => 'O campo é obrigatório.',
            'string' => 'Digite só caracteres.',
            'max' => 'O campo precisa ter no máximo :max caracteres.',
            'min' => 'O campo precisa ter no mínimo :min caracteres.',
            'file' => 'O campo precisa ser um ficheiro',
            'image' => 'O campo precisa de ser uma imagem',
        ];
    }
}
