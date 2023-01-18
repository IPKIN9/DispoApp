<?php

namespace App\Interfaces;

interface UserInterface {
  public function getAll($params);
  public function getRole($username);
  public function insertData(array $detail);
  public function delete($dataId);
}