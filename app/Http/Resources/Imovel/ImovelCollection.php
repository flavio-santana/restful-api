<?php

namespace App\Http\Resources\Imovel;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ImovelCollection extends ResourceCollection
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

            'endereco' => $this->endereco,

            'numero' => $this->numero,
            
            'complemento' => $this->complemento,
            
            'cep' => $this->cep,
            
            'bairro' => $this->bairro,

            'cidade' => $this->cidade,

            'uf' => $this->uf,

            'descricao' => $this->descricao

        ];

    }
}
