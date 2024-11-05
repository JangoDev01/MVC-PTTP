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
     * @param string
     * 
     */

    public static function render($view){

        // CONTEUDO DA VIEW
        $contentView = self::getContentView($view);

        //RETORNA O CONTEUDO RENDERIZADO
        return $contentView;

    }
}