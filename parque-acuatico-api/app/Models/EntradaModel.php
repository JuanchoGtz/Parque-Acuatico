<?php

namespace App\Models;

use CodeIgniter\Model;

class EntradaModel extends Model
{
   protected $table = 'Entradas';
   protected $primaryKey = 'id';
   protected $allowedFields = ['tipo', 'precio'];
}
