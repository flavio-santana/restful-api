<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Pessoa; 

class Imovel extends Model
{

    //
    protected $fillable = array(
        'pessoa_id', 
        'endereco', 
        'numero', 
        'complemento', 
        'cep', 
        'bairro',
        'cidade',
        'uf',
        'descricao',
        'desativado',
    );

    //
    public function pessoas()
    {
        $this->belongsTo(Pessoa::class);
    }
}
