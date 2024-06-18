<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelatorioRequest extends FormRequest
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
            //
            'inicio' => 'required|date',
            'fim' => 'required|date|after_or_equal:data_inicio|before_or_equal:' . now()->format('Y-m-d'),
        ];
    }
    public function messages(): array
    {
        return [

            'inicio.required' => 'O campo data de início é obrigatório.',
            'inicio.date' => 'O campo data de início deve ser uma data válida.',
            'fim.required' => 'O campo data de término é obrigatório.',
            'fim.date' => 'O campo data de término deve ser uma data válida.',
            'fim.after_or_equal' => 'A data de término deve ser igual ou posterior à data de início.',
            'fim.before_or_equal' => 'A data de término deve ser igual ou anterior à data atual.'
        ];
    }
}
