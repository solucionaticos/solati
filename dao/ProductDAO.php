<?php

class ProductDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllProducts()
    {
        $stmt = $this->pdo->query('SELECT id, name, price FROM products');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
