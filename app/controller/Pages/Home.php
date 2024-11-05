<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Home{


    /**
     * METODO RESPONSAVEL POR RETORNAR O CONTEUDO (view) DA NOSSA HOME
     * @return string
     *  */    
    public static function getHome(){
        return View::render('pages/home');   
    }

}