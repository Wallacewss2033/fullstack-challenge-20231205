<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'description' => 'required|max:240',
            'date' => 'required|date',
            'user_id' => 'required',
            'value' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'insira a descriação.',
            'description.max' => 'caracteres excedidos.',
            'date.required' => 'insira a data',
            'user_id.required' => 'usuário obrigatório',
            'value.required' => 'insira o valor.',
        ];
    }
}
