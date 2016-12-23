<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$enquete = $app['controllers_factory'];

$enquete->get("/", function() {
    return new Response('Acesso a enquente');
});

$enquete->get("/show", function() {
    return new Response('Exibir uma enquente');
});

return $enquete;