<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HosptitalUpdateRequest extends FormRequest
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
            //
            'hospital_name' => 'required|string|max:255|min:3',
            'logotipo' => 'image:PNG,JPG,JPEG' ,
            'descricao' => 'string|max:255',
            //'long' => 'required|string',
            'endereco' => 'required|string',
            //'lat' => 'required|string',
            'documento' => 'file',
            'hospital_type' => 'required'
            
        ];
    }
}
