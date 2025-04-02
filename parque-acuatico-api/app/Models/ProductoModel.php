<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
   protected $table = 'Productos';
   protected $primaryKey = 'id';
   protected $allowedFields = ['nombre','descripcion','precio','tipo'];
}
