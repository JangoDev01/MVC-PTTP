<?php

require __DIR__.'/vendor/autoload.php';

use App\Http\Router;
use App\Http\Response;
use \App\Controller\Pages\Home;

define('URL','http://localhost/MVC');
// DEBUGANDO
$obRouter = new Router(URL);
// ROTA HOME
$obRouter->get('/',[
    function(){
        return new Response(200,Home::getHome());
    }
]);
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