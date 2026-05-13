<?php

class ProductController
{
    private ProductModel $model;

    private const PER_PAGE = 6;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function listProducts(): array
    {
        $categories         = $this->model->findActiveCategories();
        $selectedCategoryId = $this->resolveCategory($categories);

        $total       = $this->model->countActive($selectedCategoryId);
        $totalPages  = max(1, (int) ceil($total / self::PER_PAGE));
        $currentPage = $this->resolvePage($totalPages);
        $offset      = ($currentPage - 1) * self::PER_PAGE;

        $rawProducts = $this->model->findActive(self::PER_PAGE, $offset, $selectedCategoryId);
        $products    = array_map([self::class, 'formatProduct'], $rawProducts);

        return compact('products', 'categories', 'selectedCategoryId', 'total', 'totalPages', 'currentPage');
    }

    private function resolveCategory(array $categories): ?int
    {
        if (!isset($_GET['category']) || !ctype_digit((string) $_GET['category'])) {
            return null;
        }

        $requestedId = (int) $_GET['category'];
        $validIds    = array_column($categories, 'id');

        return in_array($requestedId, $validIds, true) ? $requestedId : null;
    }

    private function resolvePage(int $totalPages): int
    {
        if (!isset($_GET['page']) || !ctype_digit((string) $_GET['page'])) {
            return 1;
        }

        return max(1, min((int) $_GET['page'], $totalPages));
    }

    private static function formatProduct(array $product): array
    {
        return [
            'id'           => (int) $product['id'],
            'name'         => $product['name'],
            'description'  => $product['description'],
            'categoryName' => $product['category_name'] ?? 'Sem categoria',
            'price'        => Formatter::price($product['price']),
            'imageUrl'     => Formatter::productImageUrl($product['cover']),
            'whatsappUrl'  => Formatter::whatsappUrl($product['whatsapp'], $product['name']),
        ];
    }
}
