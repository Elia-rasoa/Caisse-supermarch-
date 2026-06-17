<?php

namespace App\Controllers;

use App\Models\AchatModel;
use App\Models\ProduitModel;

class Achat extends BaseController
{
    public function index() {
        $model = new ProduitModel();
        
        $data['produits'] = $model->findAll();
        $data['caisse'] = $this->request->getPost('caisse');

        $session = session();
        $session->set('caisse', $data['caisse']);

        return view('achat/index', $data);
    }

    public function create() {
        $data = [
            'produit' => $this->request->getPost('produit'),
            'qnt' => $this->request->getPost('quantite'),
        ];

        $model = new AchatModel();
        $model->insert($data);

        return redirect()->to('/achat')->with('success', 'Achat ajouté avec succès.');
    }
}
