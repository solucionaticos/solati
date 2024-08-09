<?php

class ProductModel
{
    private string $apiUrl;

    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getProducts(): array
    {
        $response = file_get_contents($this->apiUrl); // Trae la data en JSON de los productos
        if ($response === false) {
            throw new Exception('Error al recuperar productos');
        }

        $data = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

        if (!is_array($data)) {
            throw new Exception('Error: el formato de los datos no es válido');
        }

        return $data;
    }
}