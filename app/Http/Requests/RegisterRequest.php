<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|max:60|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatorio.',
            'name.max' => 'O campo nome deve ter no maximo 255 caracteres.',
            'email.required' => 'O campo e-mail é obrigatorio.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail valido.',
            'email.max' => 'O campo e-mail deve ter no maximo 255 caracteres.',
            'email.unique' => 'O e-mail informado já está em uso.',
            'password.required' => 'O campo senha é obrigatorio.',
            'password.min' => 'O campo senha deve ter no minimo 6 caracteres.',
            'password.max' => 'O campo senha deve ter no maximo 60 caracteres.',
            'password.confirmed' => 'As senhas não coincidem.',
        ];
    }
}
