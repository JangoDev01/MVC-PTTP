<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Home extends Page{


    /**
     * METODO RESPONSAVEL POR RETORNAR O CONTEUDO (view) DA NOSSA HOME
     * @return string
     *  */    
    public static function getHome(){
        $content = View::render('pages/home', [
            'name' => 'JangoDev',
            'description' => 'Youtube: https://youtube.com'
        ]);   

        // RETORNA A VIEW DA PAGINA
        return parent::getPage('JangoDev', $content);
    }

}