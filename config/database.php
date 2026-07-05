<?php
declare(strict_types=1);

return [
    'default' => env('DB_DRIVER', 'sqlite'),
    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'path' => env('DB_PATH', __DIR__ . '/../database/chief_complaints.db'),
        ],
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', 3306),
            'database' => env('DB_NAME', 'chief_complaints'),
            'username' => env('DB_USER', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ],
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', 5432),
            'database' => env('DB_NAME', 'chief_complaints'),
            'username' => env('DB_USER', 'postgres'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
        ],
    ],
];

function env(string $key, mixed $default = null): mixed
{
    return $_ENV[$key] ?? $_SERVER[$key] ?? $default;
}
