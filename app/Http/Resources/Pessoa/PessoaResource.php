<?php

namespace App\Http\Resources\Pessoa;

use Illuminate\Http\Resources\Json\JsonResource;

class PessoaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'nome'           => $this->nome,
            'dataNascimento' => $this->dataNascimento,
            'email'          => $this->email,
            'telefone'       => $this->telefone,
            'desativado'     => $this->desativado,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
            'imoveis'        => $this->imoveis->count() > 0 ? $this->imoveis->count() : 'Está pessoa não possui imóveis!',

            'ref' => [
                'imoveis' => route('imoveis.index', $this->id),
            ]   
        ];
    }
}
