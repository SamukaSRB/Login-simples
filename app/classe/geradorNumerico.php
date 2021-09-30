<?php
namespace App\classe;

class geradorNumerico{

    public static function criarCodigo(){
        //criar um codigo aleatorio senha com 10 caracteres

        $valor = '';
        $caracteres = 'abcdefghijlmnopqrstuvwxz_ABCDEEFGHIJLMNOPQRSTUVWXZ1234567890!?#$%';
        for($i = 0;$i<10;$i++){
            $index = rand(0,strlen($caracteres));
            $valor.= substr($caracteres,$index,1);
        }
        return $valor;

    }

}




?>
