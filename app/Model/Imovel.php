<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Pessoa; 

class Imovel extends Model
{
    //
    public function pessoas()
    {
        $this->belongsTo(Pessoa::class);
    }
}
