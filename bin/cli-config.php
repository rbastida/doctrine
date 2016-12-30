<!--use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__.'/../bootstrap.php';


return ConsoleRunner::createHelperSet($em);-->


<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../bootstrap.php';

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

\Doctrine\ORM\Tools\Console\ConsoleRunner::run($helperSet);