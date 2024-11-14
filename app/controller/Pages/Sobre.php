<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Sobre extends Page{


    /**
     * METODO RESPONSAVEL POR RETORNAR O CONTEUDO (view) DA NOSSA SOBRE
     * @return string
     *  */    
    public static function getSobre(){

        // ORGANIZACAO
        $obOrganization = new Organization;

        $content = View::render('pages/sobre', [
            'name' => $obOrganization->name,
            'description' => $obOrganization->description,
            'site' => $obOrganization->site
        ]);   

        // RETORNA A VIEW DA PAGINA
        return parent::getPage('SOBRE - JangoDevOps', $content);
    }

}