<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|max:60',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O campo e-mail é obrigatorio.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail valido.',
            'password.required' => 'O campo senha é obrigatorio.',
            'password.min' => 'O campo senha deve ter no minimo 6 caracteres.',
            'password.max' => 'O campo senha deve ter no maximo 60 caracteres.',
        ];
    }
}
