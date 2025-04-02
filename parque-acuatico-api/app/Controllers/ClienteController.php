<?php

namespace App\Controllers;

use App\Models\VentaModel;
use App\Models\DetalleVentaModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class ClienteController extends ResourceController
{


    public function comprar() {
        $modelVenta = new VentaModel();
        $modelDetalle = new DetalleVentaModel();
        $input = $this->request->getJSON();

        // Crear la venta
        $ventaData = [
            'usuario_id' => $input->usuario_id,
            'codigo_unico' => uniqid(),
            'total' => $input->total
        ];
        $ventaId = $modelVenta->insert($ventaData);

        // Registrar detalles de la venta
        foreach ($input->productos as $producto) {
            $modelDetalle->insert([
                'venta_id' => $ventaId,
                'producto_id' => $producto->id,
                'cantidad' => $producto->cantidad,
                'subtotal' => $producto->subtotal
            ]);
        }

        return $this->respondCreated(['message' => 'Compra realizada']);
    }

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
