<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page{


    /**
     * METODO RESPONSAVEL POR RETORNAR O CONTEUDO (view) DA NOSSA HOME
     * @return string
     *  */    
    public static function getHome(){

        // ORGANIZACAO
        $obOrganization = new Organization;

        $content = View::render('pages/home', [
            'name' => $obOrganization->name,
            'description' => $obOrganization->description,
            'site' => $obOrganization->site
        ]);   

        // RETORNA A VIEW DA PAGINA
        return parent::getPage('JangoDev', $content);
    }

}