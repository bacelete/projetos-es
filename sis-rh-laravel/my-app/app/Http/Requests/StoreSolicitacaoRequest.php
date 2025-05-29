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
            'cpf' => 'required|numeric',
            'data_inicio' => [
                'date',
                Rule::date()->format('Y-m-d'),
            ],
            'data_fim' => [
                'date',
                Rule::date()->format('Y-m-d'),
                Rule::date()->afterOrEqual(today()), //chama uma instancia do Rule:: e acessa os metodos; 
            ],
            'motivo' => 'required',
            'observacao' => 'required|max:255'
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
            'data_inicio.required' => 'A data de início deve ser preenchida.',
            'data_fim.after_or_equal' => 'A data de conclusão não pode ser anterior à data de hoje.',
            'data_fim.required' => 'A data de conclusão deve ser preenchida.',
            'motivo.required' => 'O campo motivo deve ser preenchido.',
        ];
    }
}
