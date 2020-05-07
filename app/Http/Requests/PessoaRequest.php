<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
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
            //
            'nome'           => 'required|max:100',
            'dataNascimento' => 'required|max:10|date',
            'sexo'           => 'required|max:1',
            'email'          => 'required|max:100|email|unique:pessoas',
            'telefone'       => 'required|max:15',
            'desativado'     => 'required|max:1',
        ];
    }
}
