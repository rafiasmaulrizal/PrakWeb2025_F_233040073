<?php

spl_autoload_register(function ($class) {
  $classPath = str_replace('\\', '/', $class);
  $parts = explode('/', $classPath);
  $className = end($parts);

  require_once __DIR__ . '/Produk/' . $className . '.php';
});

spl_autoload_register(function ($class) {
  $classPath = str_replace('\\', '/', $class);
  $parts = explode('/', $classPath);
  $className = end($parts);

  require_once __DIR__ . '/Service/' . $className . '.php';
});
