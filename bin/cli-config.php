<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../bootstrap.php';


// Any way to access the EntityManager from  your application
$em = GetMyEntityManager();

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));


//
//\Doctrine\ORM\Tools\Console\ConsoleRunner::run($helperSet);