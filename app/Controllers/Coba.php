<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        echo "ini controller Coba method index";
    }

    public function coba($name = '')
    {
        echo "helo nama saya adalah $name";
    }
}
