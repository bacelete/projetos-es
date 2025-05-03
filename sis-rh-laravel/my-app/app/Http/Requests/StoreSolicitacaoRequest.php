<?php

namespace App\Http\Requests;

use App\Models\Solicitacao;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 

class StoreSolicitacaoRequest extends FormRequest
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
            'unidade' => 'required|max:80',
            'name' => 'required|max:80',
            'data_inicio' => [
                'required',
                Rule::date()->beforeToday()
            ], 
            'data_fim' => 'required',
            'motivo' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'unidade.required' => 'O campo unidade deve ser preenchido.',
            'name.required' => 'O campo nome deve ser preenchido.',
            'data_inicio.required' => 'A data de início deve ser válida',
            'data_fim.required' => 'A data de conclusão deve ser válida',
            'motivo.required' => 'O campo motivo deve ser preenchido.',
        ];
    }
}
