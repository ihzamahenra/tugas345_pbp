<?php
// tests/ThrCalculatorTest.php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../ThrCalculator.php';

class ThrCalculatorTest extends TestCase
{
    public function testThrFullUntukMasaKerja12Bulan()
    {
        $calc = new ThrCalculator();
        $masaKerjaBulan = 12;
        $gajiPokok = 5000000;
        $expected = 5000000;
        $this->assertEquals($expected, $calc->hitungThr($gajiPokok, $masaKerjaBulan));
    }

    public function testThrProporsionalUntukKurangDari12Bulan()
    {
        $calc = new ThrCalculator();
        $masaKerjaBulan = 6;
        $gajiPokok = 5000000;
        $expected = 2500000;
        $this->assertEquals($expected, $calc->hitungThr($gajiPokok, $masaKerjaBulan));
    }

    public function testThrNolJikaMasaKerja0()
    {
        $masaKerjaBulan = 0;
        $gajiPokok = 5000000;
        $calc = new ThrCalculator();
        $expected =0;
        $this->assertEquals($expected, $calc->hitungThr($gajiPokok, $masaKerjaBulan));
    }
}