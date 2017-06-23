<?php

require 'vendor/autoload.php';

use Symfony\Component\Console\Application;
use Xarser\ParserMunicipios;

ini_set('memory_limit', '3G');

$application = new Application();
$application->add(new ParserMunicipios());
$application->run();