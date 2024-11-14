<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;

define('URL','http://localhost/Projectos/MVC');

// DEFINE O VALOR DAS VARIAVEIS DA VIEW
View::init([
    'URL' => URL
]);

// INICIA O ROUTER
$obRouter = new Router(URL);

// INCLUI AS ROTAS DE PAGINAS
include __DIR__.'/routes/pages.php';

// IMPRIME O RESPONSE DA ROTA
$obRouter->run()->sendResponse();

/*
    echo "<pre>";
    print_r($obs);
    echo  "</pre>";
    exit;

    $obR = new \App\Http\Response(200,'Ola Mundo!');
    $obR->sendResponse();

    $ob = new \App\Http\Request;
    echo "<pre>";
    print_r($ob);
    echo  "</pre>";
    exit;

    echo Home::getHome();
*/

?>