<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlsrv'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrvUser' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_USER', '103.226.250.37,1433'),
            'port' => env('DB_PORT_USER', '1433'),
            'database' => env('DB_DATABASE_USER', 'Hune-Users'),
            'username' => env('DB_USERNAME_USER', 'sa'),
            'password' => env('DB_PASSWORD_USER', '1qazXSW@'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'sqlsrvTransport' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_TRANS', '103.226.250.37,1433'),
            'port' => env('DB_PORT_TRANS', '1433'),
            'database' => env('DB_DATABASE_TRANS', 'Hune-Transport'),
            'username' => env('DB_USERNAME_TRANS', 'sa'),
            'password' => env('DB_PASSWORD_TRANS', '1qazXSW@'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'sqlsrvLandHouse' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_LANDHS', '103.226.250.37,1433'),
            'port' => env('DB_PORT_LANDHS', '1433'),
            'database' => env('DB_DATABASE_LANDHS', 'Hune-LandHouse'),
            'username' => env('DB_USERNAME_LANDHS', 'sa'),
            'password' => env('DB_PASSWORD_LANDHS', '1qazXSW@'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'sqlsrvRecruitment' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_RECR', '103.226.250.37,1433'),
            'port' => env('DB_PORT_RECR', '1433'),
            'database' => env('DB_DATABASE_RECR', 'Hune-Recruitment'),
            'username' => env('DB_USERNAME_RECR', 'sa'),
            'password' => env('DB_PASSWORD_RECR', '1qazXSW@'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'sqlsrvNail' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_NAIL', '103.226.250.37,1433'),
            'port' => env('DB_PORT_NAIL', '1433'),
            'database' => env('DB_DATABASE_NAIL', 'Hune-Nail'),
            'username' => env('DB_USERNAME_NAIL', 'sa'),
            'password' => env('DB_PASSWORD_NAIL', '1qazXSW@'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'sqlsrvAds' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_ADS', '103.226.250.37,1433'),
            'port' => env('DB_PORT_ADS', '1433'),
            'database' => env('DB_DATABASE_ADS', 'Hune-Ads'),
            'username' => env('DB_USERNAME_ADS', 'sa'),
            'password' => env('DB_PASSWORD_ADS', '1qazXSW@'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'sqlsrvTour' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_TOUR', '103.226.250.37,1433'),
            'port' => env('DB_PORT_TOUR', '1433'),
            'database' => env('DB_DATABASE_TOUR', 'Hune-Tour'),
            'username' => env('DB_USERNAME_TOUR', 'sa'),
            'password' => env('DB_PASSWORD_TOUR', '1qazXSW@'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'sqlsrvShop' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_SHOP', '103.226.250.37,1433'),
            'port' => env('DB_PORT_SHOP', '1433'),
            'database' => env('DB_DATABASE_SHOP', 'Hune-Shop'),
            'username' => env('DB_USERNAME_SHOP', 'sa'),
            'password' => env('DB_PASSWORD_SHOP', '1qazXSW@'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'sqlsrvPromotion' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_PROMOTION', '103.226.250.37,1433'),
            'port' => env('DB_PORT_PROMOTION', '1433'),
            'database' => env('DB_DATABASE_PROMOTION', 'Hune-Promotion'),
            'username' => env('DB_USERNAME_PROMOTION', 'sa'),
            'password' => env('DB_PASSWORD_PROMOTION', '1qazXSW@'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'sqlsrvTracking' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_TRACKING', '103.226.250.37,1433'),
            'port' => env('DB_PORT_TRACKING', '1433'),
            'database' => env('DB_DATABASE_TRACKING', 'Hune-Tracking'),
            'username' => env('DB_USERNAME_TRACKING', 'sa'),
            'password' => env('DB_PASSWORD_TRACKING', '1qazXSW@'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'pushNoti' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST_TRACKING', '103.75.184.158,1436'),
            'port' => env('DB_PORT_TRACKING', '1436'),
            'database' => env('DB_DATABASE_TRACKING', 'hune-push'),
            'username' => env('DB_USERNAME_TRACKING', 'sa'),
            'password' => env('DB_PASSWORD_TRACKING', 'Vps@#28072020'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'predis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'predis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DB', 0),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_CACHE_DB', 1),
        ],

    ],

];
