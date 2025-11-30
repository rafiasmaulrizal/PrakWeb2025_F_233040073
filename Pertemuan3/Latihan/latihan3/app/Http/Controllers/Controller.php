<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Iluminate\Http\Request;
use Illuminate\Foundation\Auth\User as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        return ('Ini adalah PostController');
    }
    

}
