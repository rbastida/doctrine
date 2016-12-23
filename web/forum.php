<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$forum = $app['controllers_factory'];

$forum->get("/", function() {
    return new Response("Acesso ao forum");
});

return $forum;