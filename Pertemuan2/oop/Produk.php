<?php

class Produk
{
  // 1. Properti kelas
  public $judul;
  public $penulis;
  public $penerbit;
  protected $harga;
  


  // 2. Konstruktor untuk menginisialisasi properti
  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  // 3. Method untuk menampilkan info produ

  public function getJudul()
  {
    return $this->judul;
  } 

  public function setJudul($judul)
  {
    $this->judul = $judul;
  }

  public function getHarga()
  {
    return $this->harga;
  }

  public function setHarga($harga)
  {
    $this->harga = $harga;
  }

  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }

  

  public function getInfoProduk()
  {
    $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    return $str;
  }

  $produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
  $produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);
  echo $produk1->getInfoProduk();
  echo "<br>";
  echo $produk2->getInfoProduk();
  echo "<hr>";

  echo $produk2->getHarga();
  
}