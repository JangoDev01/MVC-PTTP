<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Page{

    /**
     * METODO  RESPONSÁVEL POR RENDERIZAR O TOPO DA PAGINA
     * @return string
     * 
     */
    private static function getHeader(){
        return View::render('pages/header');
    }

    /**
     * METODO  RESPONSÁVEL POR RENDERIZAR O footer DA PAGINA
     * @return string
     * 
     */
    private static function getFooter(){
        return View::render('pages/footer');
    }


    /**
     * METODO RESPONSAVEL POR RETORNAR O CONTEUDO (view) DA NOSSA PAGINA GENERICA
     * @return string
     *  */    
    public static function getPage($title,$content){
        return View::render('pages/page', [
            'title' => $title,
            'header' => self::getHeader(),
            'footer' => self::getFooter(),
            'content' => $content
        ]);   
    }

}