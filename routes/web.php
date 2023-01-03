<?php

$router->group(['prefix' => 'v1/staff'], function() use ($router){
    $router->get('/', ['uses' => 'StaffController@getAllData']);
    $router->get('/{id}', ['uses' => 'StaffController@getDataById']);
    $router->post('/', ['uses' => 'StaffController@upsertData']);
    $router->delete('/{id}', ['uses' => 'StaffController@deleteData']);
});