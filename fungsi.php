<?php
class Buku{
  // state/field
  var $penulis = "";
  var $judul = "";
  // command function
  function setPenulis($nama){
    $this->penulis = "Sang penulis $nama";
  }
  // query function
  function getPenulis($nama){
    return "Penulis: $nama";
  }

  function __construct(){
    echo "otomatis \n";
  }

  static function fungsi_kelas(){
    echo "fungsi kelas\n";
  }

  function fungsi_instance(){
    echo "fungsi milik instance kelas $this->penulis \n";
  }
}

function main(){
  echo "hi, ini fungsi main \n";
  // Buku::fungsi_kelas();

  $bukuMatematika = new Buku();
  $bukuMatematika->setPenulis("rian");
  echo $bukuMatematika->fungsi_instance();

  $bukuBiologi = new Buku();
  $bukuBiologi->setPenulis("dr. Zaid");
  echo $bukuBiologi->fungsi_instance();

}


main();


?>