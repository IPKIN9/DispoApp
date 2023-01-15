<?php

$router->group(['prefix' => 'v1/staff', 'middleware' => 'auth'], function() use ($router){
    $router->get('/', ['uses' => 'StaffController@getAllData', 'middleware' => 'scope:crud-list,create-list,validate-list']);
    $router->get('/{id}', ['uses' => 'StaffController@getDataById', 'middleware' => 'scope:crud-list,create-list,validate-list']);
    $router->post('/', ['uses' => 'StaffController@upsertData', 'middleware' => 'scope:crud-list']);
    $router->delete('/{id}', ['uses' => 'StaffController@deleteData', 'middleware' => 'scope:crud-list']);
});

$router->group(['prefix' => 'v1/mahasiswa', 'middleware' => 'auth'], function() use ($router){
    $router->get('/', ['uses' => 'MahasiswaController@getAllData', 'middleware' => 'scope:crud-list,create-list,validate-list']);
    $router->get('/{id}', ['uses' => 'MahasiswaController@getDataById', 'middleware' => 'scope:crud-list,create-list,validate-list']);
    $router->post('/', ['uses' => 'MahasiswaController@upsertData', 'middleware' => 'scope:crud-list,create-list']);
    $router->delete('/{id}', ['uses' => 'MahasiswaController@deleteData', 'middleware' => 'scope:crud-list,create-list']);
});

$router->group(['prefix' => 'v1/ticket', 'middleware' => 'auth'], function() use ($router){
    $router->get('/', ['uses' => 'TicketController@getAllData', 'middleware' =>'scope:crud-list,create-list,validate-list']);
    $router->get('/{id}', ['uses' => 'TicketController@getDataById', 'middleware' =>'scope:crud-list,create-list,validate-list']);
    $router->post('/', ['uses' => 'TicketController@upsertData', 'middleware' =>'scope:crud-list,create-list']);
    $router->delete('/{id}', ['uses' => 'TicketController@deleteData', 'middleware' =>'scope:crud-list']);
});