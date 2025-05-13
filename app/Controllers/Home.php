<?php

namespace App\Controllers;
use CodeIgniter\Shield\Authentication\Authentication;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
