<?php

interface BisaDiMakan {
  public function makan();
}

class Buah implements BisaDiMakan {
  public function makan() {
    return "Apel dimakan : Langsung dikunyah";
  }
}

class jeruk implements BisaDiMakan {
  public function makan() {
    return "Jeruk dimakan : Kupas dulu baru dimakan";
  }
}

$apel = new Buah();
$jeruk = new jeruk();

echo $apel->makan();
echo "<br>";
echo $jeruk->makan();