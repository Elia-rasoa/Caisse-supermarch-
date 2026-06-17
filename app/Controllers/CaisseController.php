<?php

namespace App\Controllers;
use App\Models\CaisseModel;

class CaisseController extends BaseController
{
    public function index(): string
    {
        $model = new CaisseModel();
        $caisses = $model->findAll();
        return view('caisse/accueil', ['caisses' => $caisses]);
    }
}
