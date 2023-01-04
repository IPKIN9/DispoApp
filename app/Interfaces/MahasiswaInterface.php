<?php

namespace App\Interfaces;

interface MahasiswaInterface 
{
    public function getAll($params);
    public function getById($dataId);
    public function Upsert($dataId, array $detail);
    public function delete($dataId);
}