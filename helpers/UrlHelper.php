<?php

class UrlHelper
{
    public static function pageUrl(int $page, ?int $categoryId): string
    {
        $params = ['page' => $page];

        if ($categoryId !== null) {
            $params['category'] = $categoryId;
        }

        return 'produtos.php?' . http_build_query($params);
    }

    public static function categoryUrl(?int $categoryId): string
    {
        $params = ['page' => 1];

        if ($categoryId !== null) {
            $params['category'] = $categoryId;
        }

        return 'produtos.php?' . http_build_query($params);
    }
}
