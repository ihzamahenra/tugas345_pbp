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
        $this->assertEquals(5000000, $calc->hitungThr($gajiPokok, $masaKerjaBulan));
    }

    public function testThrProporsionalUntukKurangDari12Bulan()
    {
        $calc = new ThrCalculator();
        $masaKerjaBulan = 6;
        $gajiPokok = 5000000;
        $this->assertEquals(2500000, $calc->hitungThr($gajiPokok, $masaKerjaBulan));
    }

    public function testThrNolJikaMasaKerja0()
    {
        $masaKerjaBulan = 0;
        $gajiPokok = 5000000;
        $calc = new ThrCalculator();
        $this->assertEquals(0, $calc->hitungThr($gajiPokok, $masaKerjaBulan));
    }
}