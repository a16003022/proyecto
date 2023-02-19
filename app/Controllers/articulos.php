<?php 

namespace App\Controllers;

class articulos extends BaseController
{
    public function mensaje()
    {
        echo "Entrando al mensaje";
    }
    public function vista_mensaje(){
        return view("articulos");
    }
}
?>