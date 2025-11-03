<?php

class Komik extends Produk
{
  // 1. Properti tambahan untuk kelas Komik
  public $jmlHalaman;

  // 2. Konstruktor untuk menginisialisasi properti, termasuk properti dari kelas induk
  public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman) {
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->jmlHalaman = $jmlHalaman;
  }

  public function getInfoProduk()
  {
    $infoParent = parent::getInfoProduk();

    return "Komik: " . $infoParent . " - {$this->jmlHalaman} Halaman.";
  }
}
