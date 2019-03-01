<?php

require 'vendor/autoload.php';

use Symfony\Component\Console\Application;
use Xarser\GenerateMunicipalities;

ini_set('memory_limit', '3G');

$application = new Application();
$application->add(new GenerateMunicipalities());
$application->run();