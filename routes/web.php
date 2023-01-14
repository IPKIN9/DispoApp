<?php

$router->group(['prefix' => 'v1/staff'], function() use ($router){
    $router->get('/', ['uses' => 'StaffController@getAllData', 'middleware' => ['auth', 'scope:crud-list,create-list,validate-list']]);
    $router->get('/{id}', ['uses' => 'StaffController@getDataById', 'middleware' => ['auth', 'scope:crud-list,create-list,validate-list']]);
    $router->post('/', ['uses' => 'StaffController@upsertData', 'middleware' => ['auth', 'scope:crud-list']]);
    $router->delete('/{id}', ['uses' => 'StaffController@deleteData', 'middleware' => ['auth', 'scope:crud-list']]);
});

$router->group(['prefix' => 'v1/mahasiswa'], function() use ($router){
    $router->get('/', ['uses' => 'MahasiswaController@getAllData', 'middleware' => ['auth', 'scope:crud-list,create-list,validate-list']]);
    $router->get('/{id}', ['uses' => 'MahasiswaController@getDataById', 'middleware' => ['auth', 'scope:crud-list,create-list,validate-list']]);
    $router->post('/', ['uses' => 'MahasiswaController@upsertData', 'middleware' => ['auth', 'scope:crud-list,create-list']]);
    $router->delete('/{id}', ['uses' => 'MahasiswaController@deleteData', 'middleware' => ['auth', 'scope:crud-list,create-list']]);
});

$router->group(['prefix' => 'v1/ticket'], function() use ($router){
    $router->get('/', ['uses' => 'TicketController@getAllData', 'middleware' => ['auth', 'scope:crud-list,create-list,validate-list']]);
    $router->get('/{id}', ['uses' => 'TicketController@getDataById', 'middleware' => ['auth', 'scope:crud-list,create-list,validate-list']]);
    $router->post('/', ['uses' => 'TicketController@upsertData', 'middleware' => ['auth', 'scope:crud-list,create-list']]);
    $router->delete('/{id}', ['uses' => 'TicketController@deleteData', 'middleware' => ['auth', 'scope:crud-list']]);
});