<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
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
        /**
         * 
         */
        return [
            //
            //'pessoa_id'   => 'required|integer',
            'endereco'    => 'required|max:100',
            'numero'      => 'required|max:10',
            'complemento' => 'max:10',
            'cep'         => 'required|max:10',
            'bairro'      => 'required|max:100',
            'cidade'      => 'required|max:100',
            'uf'          => 'required|max:2',
            'descricao'   => 'required|max:250',
            'desativado'  => 'required|max:1|integer|between:0,1',
        ];
    }
}
