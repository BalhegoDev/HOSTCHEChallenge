<?php

namespace App\Controllers;

use App\Models\Cliente;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->to("/pages");
    }
}
