<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$app = new Silex\Application();
$app['debug'] = true;

$before = function() {
    echo "Executou antes do callback";
};

$after = function(Request $request, Response $response) use ($app) {
  echo "Rodou depois do callback.";
};

$app->get('/rota/{nome}', function($nome) {
    return new Response("Ola mundo: {$nome}",200);
})
    ->value('nome','Wesley')
    ->bind('rota_wesley')
    ->before($before)
    ->after($after);

$app->get('/json',function() use ($app) {

    $array = array('nome'=>'Wesley');
    $erro = array('message'=>'Erro ao processar');

    return $app->json($erro,404);

});

// Executado antes do response para o browser.
$app->after(function(Request $request, Response $response) {
   #echo "Rodou antes";
});

// Executado DEPOIS do response para o browser.
$app->finish(function(Request $request, Response $response) {
   #echo "Rodou antes";
});

$app->run();