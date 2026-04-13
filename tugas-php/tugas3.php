<?php 
// Array Function
// is_array()
// count()
// sort()
// shuffle()
$hewan = ['buaya','sapi','kucing', 'ayam', 'kambing'];

$cekarray = is_array($hewan);
if($cekarray){
    echo "Ini adalah array \n\n";
}else{
    echo "Ini bukan array \n\n";
}

$panjangArr = count($hewan);
echo "$panjangArr \n\n";

$hewan2 = sort($hewan);
foreach($hewan as $h){
    echo "$h \n";
}
echo "\n\n";


$hewan3 = shuffle($hewan);
foreach($hewan as $h){
    echo "$h \n";
}



// String
// $judulBuku = $hewan[0];
// $sub = substr($judulBuku,0,3);
// echo "$judulBuku \n";
// echo "$sub \n";
?>