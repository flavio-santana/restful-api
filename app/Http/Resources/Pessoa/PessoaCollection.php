<?php

namespace App\Http\Resources\Pessoa;

use Illuminate\Http\Resources\Json\JsonResource;

class PessoaCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        //return parent::toArray($request);

        return [
            //'id'             => $this->id,
            'nome'           => $this->nome,
            'dataNascimento' => $this->dataNascimento,
            'email'          => $this->email,
            'telefone'       => $this->telefone,
            'desativado'     => $this->desativado,
            'imoveis'        => $this->imoveis->count() > 0 ? $this->imoveis->count() : 'Está pessoa não possui imóveis!',

            'ref' => [
                'href' => route('pessoas.show', $this->id),
            ]   
        ];
        
    }
}
