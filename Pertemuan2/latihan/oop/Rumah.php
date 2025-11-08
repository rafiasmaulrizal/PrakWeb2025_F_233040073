<?php

// Definisi kelas Rumah
class Rumah
{
  // 1. Properti kelas
  public $warna;
  public $alamat;

  // 2. Konstruktor untuk menginisialisasi properti
  public function __construct($warna, $alamat)
  {
    $this->warna = $warna;
    $this->alamat = $alamat;
  }

  // 3. Method untuk memasang listrik
  public function pasangListrik(Rumah $dataRumah)
  {
    return "Listrik telah dipasang di rumah yang beralamat di " . $dataRumah->alamat .
      " dengan warna rumah " . $dataRumah->warna . ".";
  }
}

// Membuat objek dan menjalankan method
$rumahSaya = new Rumah("Merah", "Jl. Merpati No. 10");
echo $rumahSaya->pasangListrik($rumahSaya);
echo "<br>";
