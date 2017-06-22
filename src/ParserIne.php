<?php

namespace Xarser;

use SplFileObject;

class ParserIne
{
    public function execute($filename)
    {
        $file = new SplFileObject($filename);

        $postalCodes = [];

        while (!$file->eof()) {
            $row = $this->getDataRow($file);
            $municipio = str_getcsv($row);
            var_dump($municipio);
            $ine[] = $municipio[1].$municipio[2].$municipio[3];
        }
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