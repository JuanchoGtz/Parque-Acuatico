<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('login', 'AuthController::login');

$routes->get('admin/usuarios', 'AdminController::usuarios');
$routes->get('admin/productos', 'AdminController::productos');
$routes->get('admin/ventas', 'AdminController::ventas');

$routes->post('cliente/comprar', 'ClienteController::comprar');
