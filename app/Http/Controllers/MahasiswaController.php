<?php

namespace App\Http\Controllers;

use App\Interfaces\MahasiswaInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    private MahasiswaInterface $studentRepo;

    public function __construct(MahasiswaInterface $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }
    public function getAllData():JsonResponse
    {
        $params = array(
            'search' => request('search'),
            'limit' => request('limit'),
            'page' => request('page'),
        );
        $data = $this->studentRepo->getAll($params);

        return response()->json($data, $data['code']);
    }

    public function getDataById($id)
    {
        $data = $this->studentRepo->getById($id);

        return response()->json($data, $data['code']);
    }

    public function upsertData(Request $request):JsonResponse
    {
        $dataId = $request->id | null;
        $detail = array(
            'nama' => $request->nama,
            'stambuk' => $request->stambuk,
            'prodi' => $request->prodi,
            'fakultas' => $request->fakultas,
        );
        $detail['updated_at'] = Carbon::now();

        $data = $this->studentRepo->upsert($dataId, $detail);

        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $data = $this->studentRepo->delete($id);

        return response()->json($data, $data['code']);
    }
}
