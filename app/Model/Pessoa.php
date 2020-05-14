<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Imovel; 

class Pessoa extends Model
{
    //
    protected $fillable = array(
        'nome', 
        'dataNascimento', 
        'sexo', 
        'email', 
        'telefone', 
        'desativado'
    );

    public function imoveis()
    {
        return $this->hasMany(Imovel::class);
    }
}
