<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Imovel; 

class Pessoa extends Model
{
    //

    public function imoveis()
    {
        return $this->hasMany(Imovel::class);
    }
}
