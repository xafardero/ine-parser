<?php
declare(strict_types=1);

namespace Xarser;

interface MunicipalityReaderInterface
{
    public function read(string $filename): array;
}