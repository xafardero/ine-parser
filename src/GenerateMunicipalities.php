<?php

namespace Xarser;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateMunicipalities extends Command
{
    public function __construct(?string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this
            ->setName('app:generate-municipalities')
            ->setDescription('Parses de whole ine.')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): void
    {
        $filename = '/../var/TRAM-NAL.F180630';

        $municipalities = (new IneMunicipalityReader)->read($filename);
        (new FileGenerator)->execute(__DIR__.'/../var/codigos_postales.csv', $municipalities);
    }
}
