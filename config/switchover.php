<?php 

return [
    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Manage Switchover cache. It uses the driver defined in the
    | config/cache.php file.
    |
    */
    'cache' => [

        /*
        |--------------------------------------------------------------------------
        | Time to store in cache feature toggles
        |--------------------------------------------------------------------------
        |
        | Determines the time in SECONDS to store feature toggles in the cache.
        |
        */
        'time' => env('SWITCHOVER_CACHE_TIME', 60)
    ],

    /*
    |--------------------------------------------------------------------------
    | Switchover SDK KEY
    |--------------------------------------------------------------------------
    |
    | Manage SDK KEY of Switchover environment
    |
    */
    'sdkkey' => env('SWITCHOVER_SDK_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Options for Guzzle Http
    |--------------------------------------------------------------------------
    |
    | Manage your options for guzzle http client
    |
    */
    'http' => [],

];