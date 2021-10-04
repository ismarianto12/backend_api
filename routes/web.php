<?php

/** @var \Laravel\Lumen\Routing\Router $router */

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}




$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('register', 'AuthController@register');
});


$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->group(['prefix' => 'user'], function () use ($router) {
        $router->get('list', 'UserController@index');
        $router->put('add', 'UserController@store');
        $router->patch('update/{id}', 'UserController@update');
        $router->delete('delete/{id}', 'UserController@delete');
    });


    // kategory
    $router->group(['prefix' => 'kategori'], function () use ($router) {
        $router->get('list', 'TmkategoriController@index');
        $router->put('add', 'TmkategoriController@create');
        $router->get('show/{id}', 'TmkategoriController@show');
        $router->patch('update/{id}', 'TmkategoriController@update');
        $router->delete('delete/{id}', 'TmkategoriController@delete');
    });
    // baragn


    // suplier
    $router->group(['prefix' => 'suplier'], function () use ($router) {
        $router->get('list', 'TmsuplierController@index');
        $router->get('show/{id}', 'TmsuplierController@show');
        $router->put('add', 'TmsuplierController@store');
        $router->patch('update/{id}', 'TmsuplierController@update');
        $router->delete('delete/{id}', 'TmsuplierController@delete');
    });
    // 
    $router->group(['prefix' => 'barang'], function () use ($router) {
        $router->get('list', 'TmbarangController@index');
        $router->put('add', 'TmbarangController@store');
        $router->patch('update/{id}', 'TmbarangController@update');
        $router->delete('delete/{id}', 'TmbarangController@delete');
    });

    //purchase orderc 
    $router->group(['prefix' => 'purchase'], function () use ($router) {
        $router->get('list', 'PurchaseOrderController@index');
        $router->put('add', 'PurchaseOrderController@store');
        $router->patch('update/{id}', 'PurchaseOrderController@update');
        $router->delete('delete/{id}', 'PurchaseOrderController@delete');
    });
});
