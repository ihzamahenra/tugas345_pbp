<?php 
// Array Function
// is_array()
// count()
// sort()
// shuffle()
$arrString = ['biologi dasar','kimia dasar','kalkulus', 'fisika'];
$panjangArr = count($arrString);
echo "$panjangArr \n\n";

// String
$judulBuku = $arrString[0];
$sub = substr($judulBuku,0,3);
echo "$judulBuku \n";
echo "$sub \n";
?>