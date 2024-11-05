<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Page{


    /**
     * METODO RESPONSAVEL POR RETORNAR O CONTEUDO (view) DA NOSSA PAGINA GENERICA
     * @return string
     *  */    
    public static function getPage($title,$content){
        return View::render('pages/page', [
            'title' => $title,
            'content' => $content
        ]);   
    }

}