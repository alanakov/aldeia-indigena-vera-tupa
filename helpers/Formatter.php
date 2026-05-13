<?php

class Formatter
{
    public static function price(mixed $price): string
    {
        if ($price === null || $price === '') {
            return 'Consulte-nos';
        }

        return 'R$ ' . number_format((float) $price, 2, ',', '.');
    }

    public static function productImageUrl(?string $cover): string
    {
        if (empty($cover)) {
            return 'assets/img/placeholder-product.jpg';
        }

        return 'assets/uploads/products/' . $cover;
    }

    public static function whatsappUrl(?string $whatsapp, string $name): string
    {
        $number = !empty($whatsapp)
            ? preg_replace('/\D/', '', $whatsapp)
            : '5500000000000';

        $message = 'Olá, tenho interesse no produto: ' . $name;

        return 'https://wa.me/' . $number . '?text=' . rawurlencode($message);
    }
}
