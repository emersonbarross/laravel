<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class meuControlador extends Controller
{
    public function produtos(){
        echo '<h1>Produtos</h1>';
        echo '<ol>';
        echo '<li>Celular</li>';
        echo '<li>Monitor</li>';
        echo '<li>Notebook</li>';
    }

    public function contador($n1, $n2){
        return $n1 *$n2;
    }
}
