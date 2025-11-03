<?php

class Game extends Produk
{
  public $waktuMain;

  public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->waktuMain = $waktuMain;
  }

  public function getHarga()
  {
    return $this->harga;
  }

  public function getInfoProduk()
  {
    $infoParent = parent::getInfoProduk();
    return "Game: " . $infoParent . " ~ {$this->waktuMain} Jam.";
  }
}

// Membuat objek dan menampilkan info
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

echo $produk2->getHarga();