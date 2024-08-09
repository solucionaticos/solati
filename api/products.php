<?php

// Configuración de la base de datos
$config = require __DIR__.'/../config/config.php';
$pdo = new PDO(
    "pgsql:host={$config['db']['host']};port={$config['db']['port']};dbname={$config['db']['dbname']}",
    $config['db']['user'],
    $config['db']['password']
);

// Crear el DAO y obtener el arreglo de los productos
require_once __DIR__.'/../dao/ProductDAO.php';
$productDAO = new ProductDAO($pdo);
$products = $productDAO->getAllProducts();

// Configurar el tipo de contenido como JSON
header('Content-Type: application/json');
echo json_encode($products);
