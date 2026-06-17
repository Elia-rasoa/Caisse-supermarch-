<?php

namespace App\Controllers;

use App\Models\AchatModel;
use App\Models\ProduitModel;

class Achat extends BaseController
{
    public function index()
    {
        $model = new ProduitModel();

        $data['produits'] = $model->findAll();
        $data['caisse'] = $this->request->getPost('caisse');

        $session = session();
        $session->set('caisse', $data['caisse']);

        return view('achat/index', $data);
    }

    public function create()
    {
        $lignes = json_decode($this->request->getPost('lignes'), true);
        $caisse = $this->request->getPost('caisse');

        if (empty($lignes)) {
            return redirect()->back()->with('error', 'Aucun produit sélectionné.');
        }

        $model = new AchatModel();

        $client = session()->get('client');

        foreach ($lignes as $l) {
            $data = [
                'client'  => $client,
                'caisse'  => $caisse,
                'produit' => $l['nom'],
                'PU'      => $l['prix'],
                'qnt'     => $l['qte'],
                'montant' => $l['montant'],
            ];
            $model->insert($data);
        }

        return redirect()->to('/')->with('success', 'Achat clôturé avec succès.');
    }
}
