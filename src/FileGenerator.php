<?php

namespace Xarser;

class FileGenerator
{
    public function execute($file, $rows)
    {
        $current = '';

        foreach($rows as $row) {
            $current .= "['province_id' => '" . $row['province_id'] . "'"
                . ",'ine' => '" . $row['ine'] . "'"
                . ",'postal_code' => '" . $row['postal_code'] . "'"
                . ", 'name' => '" . addslashes(trim($row['municipality'])) . "'"
                . "],". PHP_EOL;
        }

        file_put_contents($file, utf8_encode($current));
    }

}