<?php

namespace App\Models;

use CodeIgniter\Model;

class VentaModel extends Model
{
    protected $table = 'Ventas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id ','codigo_unico','total','fecha'];
}
