<?php

class ProductModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function countActive(?int $categoryId = null): int
    {
        [$where, $params] = $this->buildActiveFilter($categoryId);

        $stmt = $this->db->prepare("SELECT COUNT(*) FROM products WHERE {$where}");
        $stmt->execute($params);

        return (int) $stmt->fetchColumn();
    }

    public function findActive(int $limit, int $offset, ?int $categoryId = null): array
    {
        [$where, $params] = $this->buildActiveFilterWithAlias($categoryId);

        $sql = "SELECT p.id, p.name, p.description, p.cover, p.price, p.whatsapp,
                       c.name AS category_name
                  FROM products p
             LEFT JOIN categories c ON c.id = p.category_id
                 WHERE {$where}
              ORDER BY p.created_at DESC
                 LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, PDO::PARAM_STR);
        }
        $stmt->bindValue(':limit',  $limit,  PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findFeatured(int $limit = 4): array
    {
        $stmt = $this->db->prepare(
            'SELECT p.id, p.name, p.description, p.cover, p.price, p.whatsapp,
                    c.name AS category_name
               FROM products p
          LEFT JOIN categories c ON c.id = p.category_id
              WHERE p.active = :active
           ORDER BY p.created_at DESC
              LIMIT :limit'
        );
        $stmt->bindValue(':active', 'yes', PDO::PARAM_STR);
        $stmt->bindValue(':limit',  $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findActiveCategories(): array
    {
        $stmt = $this->db->prepare(
            'SELECT id, name FROM categories WHERE active = :active ORDER BY name ASC'
        );
        $stmt->execute([':active' => 'yes']);

        return $stmt->fetchAll();
    }

    private function buildActiveFilter(?int $categoryId): array
    {
        $where  = 'active = :active';
        $params = [':active' => 'yes'];

        if ($categoryId !== null) {
            $where                  .= ' AND category_id = :category_id';
            $params[':category_id']  = $categoryId;
        }

        return [$where, $params];
    }

    private function buildActiveFilterWithAlias(?int $categoryId): array
    {
        $where  = 'p.active = :active';
        $params = [':active' => 'yes'];

        if ($categoryId !== null) {
            $where                  .= ' AND p.category_id = :category_id';
            $params[':category_id']  = $categoryId;
        }

        return [$where, $params];
    }
}
