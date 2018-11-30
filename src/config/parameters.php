<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Layout extend
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default layout for views!
    |
    */
    "layout_extend" => 'layouts.app',

    /*
    |--------------------------------------------------------------------------
    | Route middleware
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default middleware for the routes!
    |
    */
    "route_middleware" => ['web','auth'],

    /*
    |--------------------------------------------------------------------------
    | Route prefix
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default prefix for the routes!
    |
    */
    "route_prefix" => 'config',

    /*
    |--------------------------------------------------------------------------
    | Paginate
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default register per page!
    |
    */
    "per_page" => 10,
];
