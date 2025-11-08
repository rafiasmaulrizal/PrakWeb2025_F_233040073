<?php

class Produk {
  public $judul, $penulis, $penerbit, $harga;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
}

  public function getILabel() {
    return "$this->penulis, $this->penerbit";
  }

  public function getInfoProduk() {
    return "{$this->judul} | {$this->getILabel()} (Rp. {$this->harga})";
  }
}

class Komik extends Produk {

  public $jmlHalaman;

  public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman) {
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->jmlHalaman = $jmlHalaman;
  }

  public function getInfoProduk() {

    $infoParent = parent::getInfoProduk();
    return "Komik: {$infoParent} - {$this->jmlHalaman} Halaman.";
  }
  }

  class Game extends Produk {

    public $waktuMain;
  
    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain) {
      parent::__construct($judul, $penulis, $penerbit, $harga);
      $this->waktuMain = $waktuMain;
    }
  
    public function getInfoProduk() {
  
      $infoParent = parent::getInfoProduk();
      return "Game: {$infoParent} ~ {$this->waktuMain} Jam.";
    }
  }


  // -- BAGIAN UNTUK MENAMPILKAN PRODUK --
  $produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
  $produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

  echo $produk1->getInfoProduk();
  echo "<br>";
  echo $produk2->getInfoProduk();
