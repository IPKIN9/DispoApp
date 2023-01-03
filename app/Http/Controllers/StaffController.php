<?php

namespace App\Http\Controllers;

use App\Interfaces\StaffInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    private StaffInterface $staffRepo;

    public function __construct(StaffInterface $staffRepo)
    {
        $this->staffRepo = $staffRepo;
    }
    public function getAllData():JsonResponse
    {
        $params = array(
            'search' => request('search'),
            'limit' => request('limit'),
            'page' => request('page'),
        );
        $data = $this->staffRepo->getAll($params);

        return response()->json($data, $data['code']);
    }

    public function getDataById($id)
    {
        $data = $this->staffRepo->getById($id);

        return response()->json($data, $data['code']);
    }

    public function upsertData(Request $request):JsonResponse
    {
        $dataId = $request->id | null;
        $detail = array(
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        );
        $detail['updated_at'] = Carbon::now();

        $data = $this->staffRepo->upsert($dataId, $detail);

        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $data = $this->staffRepo->delete($id);

        return response()->json($data, $data['code']);
    }
}
