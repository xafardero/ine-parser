<?php

use Xarser\Ine;
use PHPUnit\Framework\TestCase;

class IneTest extends TestCase
{
    /**
     * @dataProvider getRealInes
     * @test
     */
    public function GivenWhenThen($codigoMunicipio, $ine)
    {
        $ine = new Ine($codigoMunicipio);
        $this->assertEquals($ine, $ine->ine());
    }

    public function getRealInes()
    {
        return [
            ['01051', '010513'],
            ['01001', '010014'],
            ['02901', '029010'],
            ['17006', '170062'],
            ['44151', '441510'],
            ['50221', '502210'],
            ['20034', '200343'],
            ['03021', '030211'],
            ['03042', '030422'],
            ['04010', '040101'],
        ];
    }
}