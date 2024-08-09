<?php

require_once __DIR__.'/../vendor/autoload.php';

// Conexión a la Base de Datos
$config = require __DIR__.'/../config/config.php';
$pdo = new PDO(
    "pgsql:host={$config['db']['host']};port={$config['db']['port']};dbname={$config['db']['dbname']}",
    $config['db']['user'],
    $config['db']['password']
);

// Autenticación
session_start();
if (! isset($_SESSION['authenticated'])) {
    header('Location: /'.$_ENV['PROJECT_PATH'].'/public/login.php');
    exit;
}

// MVC
require_once __DIR__.'/../controllers/ProductController.php';
$apiUrl = 'http://localhost/'.$_ENV['PROJECT_PATH'].'/api/products.php';
$controller = new ProductController($apiUrl);
$controller->showProducts();
