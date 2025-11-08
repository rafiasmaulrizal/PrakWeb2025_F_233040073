<?php

abstract class Animal {
  public $name =  'kucing';

  public abstract function run();
}

class Cat extends Animal {
  public function run() {
    return "$this->name berlari sangat cepat kali";
  }
}

$cat = new Cat();

echo $cat->run();
