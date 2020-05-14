<?php

namespace App\Exceptions;

use Exception;

class ImovelNotBelongsToPessoa extends Exception
{
    //
    public function render()
    {
        return ['error' => 'Imóvel não pertence a pessoa'];
    }
}
