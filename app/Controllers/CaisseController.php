<?php

namespace App\Controllers;
use App\Models\CaisseModel;

class CaisseController extends BaseController
{
    public function index(): string
    {

        $data = [
            'Nom'    => $this->request->getPost('Nom'),
            'Prenom' => $this->request->getPost('Prenom')
        ];

        $session = session();
        $session->set('client', $data['Nom']);

        $model = new CaisseModel();
        $caisses = $model->findAll();
        return view('caisse/accueil', ['caisses' => $caisses]);
    }
}
