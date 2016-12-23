<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$app = new Silex\Application();
$app['debug'] = true;

$app['parametro1'] = "valor1";

//$app['res'] = function() {
//    return new Response('OI');
//};

$app['res'] = $app->share(function() {
    return new Response('OI');
});

$res1 = $app['res'];
$res2 = $app['res'];

if($res1 === $res2) {
    echo "Sao iguais<br>";
}
else {
    echo "sao diferentes<br>";
}


//// Declarando servicos
//$app['pdo'] = function() {
//    return new PDO("dsn","usuario","senha");
//};
//
//$app['pessoa'] = function() use ($app) {
//    return new Pessoa($app['pdo']);
//};
//
//// Instanciando servicos
//$pessoa = $app['pessoa']; // nesse momento esta sendo dado o new Pessoa
//$pdo = $app['pdo']; //gera o objeto PDO

$app->mount("/enquete", include 'enquete.php');
$app->mount("/forum", include 'forum.php');

$app->run();