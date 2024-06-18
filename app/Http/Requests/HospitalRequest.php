<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospitalRequest extends FormRequest
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
        //dd($this->all());
        return [
            'hospital_name' => ['required', 'string', 'max:255'],
            'hospital_type' => ['required'],
            'hospital_area' => ['required'],
            'hospital_servico' => ['required'],
            'logotipo' => 'required', 'image:png,jpg, jpeg',
            'documento' => 'required', 'file',
            'user_id' => ['required'],
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
