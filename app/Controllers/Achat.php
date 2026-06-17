<?php

namespace App\Controllers;

use App\Models\AchatModel;

class Achat extends BaseController
{
    public function index() {
        return view('achat/index');
    }

    public function create() {
        $data = [
            'produit' => $this->request->getPost('produit'),
            'quantite' => $this->request->getPost('quantite'),
            'prix_unitaire' => $this->request->getPost('prix_unitaire'),
            'total' => $this->request->getPost('total'),
        ];

        $model = new AchatModel();
        $model->insert($data);

        return redirect()->to('/achat')->with('success', 'Achat ajouté avec succès.');
    }
}
