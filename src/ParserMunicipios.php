<?php

namespace Xarser;

use SplFileObject;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ParserMunicipios extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:parse-ine')
            // the short description shown while running "php bin/console list"
            ->setDescription('Parses de whole ine.')
            // the "--help" option
            ->setHelp('This command allows you to create a user...')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $file = new SplFileObject(__DIR__.'/../var/TRAMOS-NAL.F161231');

        $postalCodes = [];

        while (!$file->eof()) {
            $row = $this->getDataRow($file);
            $codigoProvincia = substr($row, 0, 2);
            $codigoMunicipio = substr($row, 2, 3);
//            $distrito = substr($row, 5, 2);
//            $seccion = substr($row, 7, 3);
//            $letraSeccion = substr($row, 10, 1);
//            $subseccion = substr($row, 11, 2);
//            $codigoUnidadPoblacional = substr($row, 13, 7);
//            $codigoDeVia = substr($row, 20, 5);
//            $codigoDePseudovia = substr($row, 25, 5);
//            $manzana = substr($row, 30, 12);
            $codigoPostal = substr($row, 42, 5);
//            $tipoNumeracion = substr($row, 47, 1);
//            $extremoInferiorNumeracion = substr($row, 48, 4);
//            $calificadorDeESN = substr($row, 52, 1);
//            $tipoDeInformacion = substr($row, 58, 1);
//            $causaDeDevolucion = substr($row, 59, 2);
//            $fechaDeVariacion = substr($row, 61, 8);
//            $codigoDeVariacion = substr($row, 69, 1);
//            $vdistrito = substr($row, 70, 2);
//            $vseccion = substr($row, 72, 3);
//            $vletraSeccion = substr($row, 75, 1);
//            $vsubseccion = substr($row, 76, 2);
//            $vsubseccion = substr($row, 76, 2);
//            $vCodigoUnidadPoblacional = substr($row, 78, 7);
//            $vNombreCortoEntidadColectivo = substr($row, 85, 25);
            $vNombreCortoEntidadSingular = substr($row, 110, 25);
//            $vNombreCortoNucleoDiseminado = substr($row, 135, 25);
//            $vCodigoDeVia = substr($row, 160, 5);
//            $vNombreCortoVia = substr($row, 165, 25);
//            $vCodigoPseudovia = substr($row, 190, 5);
//            $vNombrePseudovia = substr($row, 195, 50);
//            $vManzanaCatastral = substr($row, 245, 12);
//            $vCodigoPostal = substr($row, 257, 5);
//            $vTipoNumeracion = substr($row, 262, 1);
//            $vExtremoInferiorNumeracion = substr($row, 263, 4);
//            $vCalificadorEIN = substr($row, 267, 1);
//            $vExtremoSuperiorNumeracion = substr($row, 268, 4);
//            $vCalificadorESN = substr($row, 268, 1);

            if (!empty($codigoMunicipio)) {
                $postalCodes[] = [
                    'postal_code' => $codigoPostal,
                    'province_id' => $codigoProvincia,
                    'ine' => (new Ine($codigoProvincia . $codigoMunicipio))->ine(),
                    'municipality' => $vNombreCortoEntidadSingular,
                ];
            }
        }

        $return = $this->removeDuplicates($postalCodes);

        (new FileGenerator)->execute(__DIR__.'/../var/codigos_postales.csv', $return);
    }

    private function removeDuplicates($postalCodes)
    {
        return array_map(
            "unserialize",
            array_unique(array_map("serialize", $postalCodes))
        );
    }

    /**
     * @param $file
     * @return mixed
     */
    protected function getDataRow($file)
    {
        return $file->fgets();
    }
}