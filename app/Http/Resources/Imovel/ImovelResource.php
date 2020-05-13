<?php

namespace App\Http\Resources\Imovel;

use Illuminate\Http\Resources\Json\JsonResource;

class ImovelResource extends JsonResource
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
            
            'imovel_id'   => $this->id,
            
            'pessoa_id'   => $this->pessoa_id,

            'endereco'    => $this->endereco,
            
            'numero'      => $this->numero,
            
            'complemento' => $this->complemento,
            
            'cep'         => $this->cep,
            
            'bairro'      => $this->bairro,
            
            'cidade'      => $this->cidade,
            
            'uf'          => $this->uf,
            
            'descricao'   => $this->descricao,
            
            'desativado'  => $this->desativado,

            /*
            'ref' => [
                'href' => route('pessoas.show', $this->pessoa_id),
            ] 
            */  
        ];
    }
}
