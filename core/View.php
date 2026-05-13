<?php

class View
{
    private static string $viewsPath = '';

    public static function init(string $viewsPath): void
    {
        self::$viewsPath = rtrim($viewsPath, '/');
    }

    public static function render(string $view, array $data = []): void
    {
        extract($data, EXTR_SKIP);

        require self::$viewsPath . '/layouts/header.php';
        require self::$viewsPath . '/' . $view . '.php';
        require self::$viewsPath . '/layouts/footer.php';
    }
}
