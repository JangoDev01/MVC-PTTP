<?php

namespace App\Utils;

class View{

    /**
     *  METODO RESPONSAVEL POR RETORNAR O CONTEUDO DE UMA VIEW
     * @param string $view
     * @param string
     */

    private static function getContentView($view){
        $file = __DIR__.'/../../resources/view/'.$view.'.html';

        return file_exists($file) ? file_get_contents($file) : '';
    }


    /**
     * METODO RESPONSAVEL POR RETORNAR O CONTEUDO RENDERIZADO DE UMA VIEW
     * @param string $view
     * @param array $vars (string/numeric)
     * @param string
     * 
     */

    public static function render($view, $vars = []){

        // CONTEUDO DA VIEW
        $contentView = self::getContentView($view);

        // CHAVES DO ARRAY DE VARIAVEIS
        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        }, $keys);

        /*
        echo "<pre>";
        print_r($keys);
        echo  "</pre>"; exit;
        */ 

        //RETORNA O CONTEUDO RENDERIZADO
        return str_replace($keys,array_values($vars),$contentView);

    }
}