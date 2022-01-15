<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        echo "ini controller Coba method index";
    }

    public function coba($name = '', $umur = 0)
    {
        echo "helo nama saya adalah $name, umur saya $umur";
    }
}
