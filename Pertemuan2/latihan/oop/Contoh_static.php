<?php

class ContohStatic {
  public static $angka = 1;

  public static function hallo() {
    return 'hallo';
  }
}

echo ContohStatic::$angka;
echo "<br>";
echo ContohStatic::hallo();