<?php

if (config('app.env') !== 'local') {

    $router->group(['prefix' => 'v1/staff'], function() use ($router){
        $router->get('/', ['uses' => 'StaffController@getAllData', 'middleware' => 'scope:crud-list,create-list,validate-list']);
        $router->get('/{id}', ['uses' => 'StaffController@getDataById', 'middleware' => 'scope:crud-list,create-list,validate-list']);
        $router->post('/', ['uses' => 'StaffController@upsertData', 'middleware' => 'scope:crud-list']);
        $router->delete('/{id}', ['uses' => 'StaffController@deleteData', 'middleware' => 'scope:crud-list']);
    });
    
    $router->group(['prefix' => 'v1/mahasiswa'], function() use ($router){
        $router->get('/', ['uses' => 'MahasiswaController@getAllData', 'middleware' => 'scope:crud-list,create-list,validate-list']);
        $router->get('/{id}', ['uses' => 'MahasiswaController@getDataById', 'middleware' => 'scope:crud-list,create-list,validate-list']);
        $router->post('/', ['uses' => 'MahasiswaController@upsertData', 'middleware' => 'scope:crud-list,create-list']);
        $router->delete('/{id}', ['uses' => 'MahasiswaController@deleteData', 'middleware' => 'scope:crud-list,create-list']);
    });
    
    $router->group(['prefix' => 'v1/ticket'], function() use ($router){
        $router->get('/', ['uses' => 'TicketController@getAllData', 'middleware' =>'scope:crud-list,create-list,validate-list']);
        $router->get('/{id}', ['uses' => 'TicketController@getDataById', 'middleware' =>'scope:crud-list,create-list,validate-list']);
        $router->post('/', ['uses' => 'TicketController@upsertData', 'middleware' =>'scope:crud-list,create-list']);
        $router->delete('/{id}', ['uses' => 'TicketController@deleteData', 'middleware' =>'scope:crud-list']);
    });

} else {

    $router->group(['prefix' => 'v1/staff'], function() use ($router){
        $router->get('/', ['uses' => 'StaffController@getAllData']);
        $router->get('/{id}', ['uses' => 'StaffController@getDataById']);
        $router->post('/', ['uses' => 'StaffController@upsertData']);
        $router->delete('/{id}', ['uses' => 'StaffController@deleteData']);
    });
    
    $router->group(['prefix' => 'v1/mahasiswa'], function() use ($router){
        $router->get('/', ['uses' => 'MahasiswaController@getAllData']);
        $router->get('/{id}', ['uses' => 'MahasiswaController@getDataById']);
        $router->post('/', ['uses' => 'MahasiswaController@upsertData']);
        $router->delete('/{id}', ['uses' => 'MahasiswaController@deleteData']);
    });
    
    $router->group(['prefix' => 'v1/ticket'], function() use ($router){
        $router->get('/', ['uses' => 'TicketController@getAllData']);
        $router->get('/{id}', ['uses' => 'TicketController@getDataById']);
        $router->post('/', ['uses' => 'TicketController@upsertData']);
        $router->delete('/{id}', ['uses' => 'TicketController@deleteData']);
    });
}

$router->group(['prefix' => 'v1/pengajuan'], function() use ($router){
    $router->post('/', ['uses' => 'PengajuanController@insertData']);
    $router->get('/', ['uses' => 'PengajuanController@tiketStatus']);
});