<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface {

  public function getRole($username)
  {
    $con = new User();
    try {
      $user = $con->where('email', $username)->value('role');
      if ($user) {
        $data = array(
          'message' => 'User founded',
          'code' => 200,
          'data' => $user
        );
      } else {
        $data = array(
          'message' => 'Not founded',
          'code' => 404,
        );
      }
    } catch (\Throwable $th) {
      $data = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $data;
  }

  public function getAll($params)
  {
    $con = new User();
    $count = $con->count();
    
    try {
      $data = array(
          'message' => 'Get data successfully',
          'code' => 201,
          'data' => $con->UserList($params)->get(),
          'meta' => array(
              'limit' => (int)$params['limit'],
              'page'  => (int)$params['page'],
              'page_of'  => ceil($count / $params['limit']),
              'total'  => $count
          )
      );
    } catch (\Throwable $th) {
        $data = array(
            'message' => $th->getMessage(),
            'code' => 500
        );
    }

    return $data;
  }

  public function insertData(array $detail)
  {
    $con = new User();
    try {
      $data = array(
        'message' => 'Created data successfully',
        'code' => 201,
        'data' => $con->create($detail),
      );
    } catch (\Throwable $th) {
      $data = array(
        'message' => $th->getMessage(),
        'code' => 500
      );
    }

    return $data;
  }

  public function delete($dataId)
  {
    
  }
}