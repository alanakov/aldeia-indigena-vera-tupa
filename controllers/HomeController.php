<?php

class HomeController
{
    private ProductModel $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function index(): array
    {
        $rawProducts = $this->model->findFeatured(4);
        $products    = array_map([self::class, 'formatProduct'], $rawProducts);

        return compact('products');
    }

    private static function formatProduct(array $product): array
    {
        return [
            'id'          => (int) $product['id'],
            'name'        => $product['name'],
            'description' => $product['description'],
            'imageUrl'    => Formatter::productImageUrl($product['cover']),
            'whatsappUrl' => Formatter::whatsappUrl($product['whatsapp'], $product['name']),
        ];
    }
}
