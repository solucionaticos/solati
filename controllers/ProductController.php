<?php

require_once __DIR__.'/../src/ProductModel.php';

class ProductController
{
    private $model;

    private $viewUrl;

    public function __construct($apiUrl)
    {
        $this->model = new ProductModel($apiUrl);
        $this->viewUrl = 'views/productView.php';
    }

    public function showProducts()
    {
        try {
            $products = $this->model->getProducts(); // Trae el arreglo de productos
        } catch (Exception $e) {
            $products = [];
        }

        include $this->viewUrl;
    }
}
