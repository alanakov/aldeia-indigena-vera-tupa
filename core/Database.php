<?php

class Database
{
    private const HOST    = 'localhost';
    private const NAME    = 'aldeia';
    private const USER    = 'root';
    private const PASS    = '';
    private const CHARSET = 'utf8mb4';

    private static ?PDO $instance = null;

    public static function connect(): PDO
    {
        if (self::$instance === null) {
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=%s',
                self::HOST,
                self::NAME,
                self::CHARSET
            );

            self::$instance = new PDO($dsn, self::USER, self::PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        }

        return self::$instance;
    }

    private function __construct() {}
}
