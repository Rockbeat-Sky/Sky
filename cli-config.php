<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Sky\doctrine\ORM;

require_once __DIR__. DIRECTORY_SEPARATOR .'vendor'. DIRECTORY_SEPARATOR . 'autoload.php';
$orm = new ORM;

return ConsoleRunner::createHelperSet($orm->entity);