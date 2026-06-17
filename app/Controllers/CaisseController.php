<?php

namespace App\Controllers;

class CaisseController extends BaseController
{
    public function index(): string
    {
        return view('caisse/accueil');
    }
}
