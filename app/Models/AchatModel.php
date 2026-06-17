<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatModel extends Model
{
    protected $table         = 'achats';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';

    protected $allowedFields = ['client', 'caisse', 'produit', 'PU', 'qnt', 'montant'];
}
