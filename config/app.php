<?php
declare(strict_types=1);

return [
    'name' => 'Chief Complaints Master Dataset',
    'version' => '4.0.0',
    'description' => 'Production-grade Clinical Master Dataset for HIS/EMR/Telemedicine',
    'environment' => env('APP_ENV', 'production'),
    'debug' => env('APP_DEBUG', false),
    'timezone' => env('APP_TIMEZONE', 'UTC'),
    'locale' => env('APP_LOCALE', 'en_US'),
    'dataset' => [
        'path' => __DIR__ . '/../dataset',
        'format' => env('DATASET_FORMAT', 'json'),
        'cache' => env('DATASET_CACHE', true),
        'cache_ttl' => env('DATASET_CACHE_TTL', 3600),
    ],
];

function env(string $key, mixed $default = null): mixed
{
    return $_ENV[$key] ?? $_SERVER[$key] ?? $default;
}
