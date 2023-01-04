<?php

namespace App\Repositories;

use App\Interfaces\MahasiswaInterface;
use App\Models\Mahasiswa;

class MahasiswaRepository implements MahasiswaInterface
{
    public function getAll($params)
    {
        $con = new Mahasiswa();
        $count = $con->count();
        try {
            $data = array(
                'message' => 'Get data successfully',
                'code' => 201,
                'data' => $con->MahasiswaList($params)->get(),
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

    public function getById($dataId)
    {
        $con = new Mahasiswa();
        try {
            $findId = $con->whereId($dataId);
            if ($findId->count() >= 1) {
                $data = array(
                    'message' => 'Get data successfully',
                    'code' => 201,
                    'data' => $findId->first(),
                );
            } else {
                $data = array(
                    'message' => 'Data not found',
                    'code' => 404
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

    public function Upsert($dataId, array $detail)
    {
        $con = new Mahasiswa();
        try {
            if (!$dataId) {
                $data = array(
                    'message' => 'Created data successfully',
                    'code' => 201,
                    'data' => $con->create($detail),
                );
            } else {
                $data = array(
                    'message' => 'Update data successfully',
                    'code' => 201,
                    'data' => $con->whereId($dataId)->update($detail),
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

    public function delete($dataId)
    {
        $con = new Mahasiswa();
        try {
            $findId = $con->whereId($dataId);
            if ($findId->count() >= 1) {
                $data = array(
                    'message' => 'Deleted data successfully',
                    'code' => 201,
                    'data' => $findId->delete(),
                );
            } else {
                $data = array(
                    'message' => 'Data not found',
                    'code' => 404
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
}