<?php

namespace App\Utils;

class View{

    /**
     * VARIAVEIS PADROES DA VIEW
     * @var array
     */
    private static $vars = [];

    /**
     * METODO RESPONSAVEL POR DEFINIR OS DADOS INICIAS DA CLASSE
     * @param array $vars
     * 
     */
    public static function init($vars = []){
        self::$vars = $vars;
    }

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

        // MERGES DE VARIAVEIS DA VIEW
        $vars = array_merge(self::$vars,$vars);

        // CHAVES DO ARRAY DE VARIAVEIS
        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        }, $keys);

        //RETORNA O CONTEUDO RENDERIZADO
        return str_replace($keys,array_values($vars),$contentView);

    }
}