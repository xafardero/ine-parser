<?php

require 'vendor/autoload.php';
use Symfony\Component\Console\Application;
use Xarser\FileGenerator;
use Xarser\ParserMunicipios;

ini_set('memory_limit', '3G');



//$municipios = (new ParserIne)->execute(__DIR__.'/../var/codis-ine-municipis.csv');
$postalCodes = (new ParserMunicipios())->execute(__DIR__.'/../var/TRAMOS-NAL.F161231');

(new FileGenerator)->execute(__DIR__.'/../var/codigos_postales.csv', $postalCodes);



//$application = new Application('holaluz');
//$fraudCommand = new FraudCommand();
//$application->add($fraudCommand);
//$application->setDefaultCommand($fraudCommand->getName(), false);
//$application->run();
