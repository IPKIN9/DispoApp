<?php

namespace App\Interfaces;

interface TicketInterface 
{
    public function getAll($params);
    public function getStatus($noTiket);
    public function getById($dataId);
    public function Upsert($dataId, array $detail);
    public function delete($dataId);
}