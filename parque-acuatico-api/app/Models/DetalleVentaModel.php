<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleVentaModel extends Model
{
    protected $table = 'Detalle_Venta';
    protected $primaryKey = 'id';
    protected $allowedFields = ['venta_id','producto_id','entrada_id','cantidad','subtotal'];
}
