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
            'cpf' => 'required|cpf',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date',
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
            'cpf' => 'CPF inválido!'
        ];
    }
}
