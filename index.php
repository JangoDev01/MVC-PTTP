<?php

require __DIR__.'/vendor/autoload.php';

use \App\Controller\Pages\Home;


// DEBUGANDO
/*
$obR = new \App\Http\Response(200,'Ola Mundo!');
$obR->sendResponse();

$ob = new \App\Http\Request;
echo "<pre>";
print_r($ob);
echo  "</pre>";
exit;
*/

echo Home::getHome();

?>