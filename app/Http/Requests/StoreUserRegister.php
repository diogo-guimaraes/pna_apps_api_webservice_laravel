<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255', 
            'lastname' => 'required|max:255', 
            // 'cpf' => 'required|unique:users|max:255', 
            // 'data_nascimento' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O Nome é obrigatório.',
            'lastname.required' => 'O Sobrenome é obrigatório.',
            // 'cpf.required' => 'O CPF é obrigatório.',
            // 'cpf.unique' => 'Este CPF já está sendo utilizado.',
            // 'data_nascimento.required' => 'A Data de cascimento é obrigatório.',
            'email.required' => 'O Email é obrigatório.',
            'email.unique' => 'Este Email já está sendo utilizado.',
            'password.required' => 'A Senha é obrigatório.',
            'c_password.required' => 'A Senha é obrigatório.',
            'c_password.same' => 'A Re-Senha e a Senha devem corresponder.'
        ];
    }
}
