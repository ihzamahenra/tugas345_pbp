<?php 
// src/ThrCalculator.php
class ThrCalculator
{
    public function hitungThr($gajiBulanan, $masaKerjaBulan)
    {
        if ($masaKerjaBulan >= 12) {
            return $gajiBulanan;
        }

        return ($masaKerjaBulan / 12) * $gajiBulanan;
    }
}