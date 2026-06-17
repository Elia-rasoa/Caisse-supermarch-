<?php

namespace App\Models;
use CodeIgniter\Model;

class CaisseModel extends Model
{
    protected $table = 'caisses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['libelle'];
}