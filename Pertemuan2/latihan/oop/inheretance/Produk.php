<?php

class Produk
{
  // 1. Properti kelas
  public $judul;
  public $penulis;
  public $penerbit;
  protected $harga;

  // 2. Konstruktor properti
  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  // 3. method milik parent
  public function getLabel(){
    return "$this->penulis, $this->penerbit";
  }
}

  // CHILD CLASS 
  // kita buat class komik dan game yang mewarisi class produk

  class Komik extends Produk 
  {
    public $jmlHalaman;

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman)
    {
      parent::__construct($judul, $penulis, $penerbit, $harga);
      $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
      $str = "Komik: " . parent::getLabel() . " | Rp. {$this->harga} - {$this->jmlHalaman} Halaman.";
      return $str;
    }
  }

  // CHILD CLASS KELAS GAME

  class Game extends Produk { 

  public $waktuMain;

  public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->waktuMain = $waktuMain;
  }

  // method khusus game
  public function getInfoProduk()
  {
    $str = "Game: " . parent::getLabel() . " | Rp. {$this->harga} ~ {$this->waktuMain} Jam.";
    return $str;
  }
  
}

// BAGIAN OBJECT
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();