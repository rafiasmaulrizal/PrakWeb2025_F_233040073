<?php

require_once __DIR__ . '/App/Init.php';

use App\Service\User as ServiceUser;
use App\Produk\User as ProdukUser;

new ServiceUser();
echo "<br>";
new ProdukUser();
