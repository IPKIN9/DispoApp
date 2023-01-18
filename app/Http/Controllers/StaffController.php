<?php

namespace App\Http\Controllers;

use App\Interfaces\StaffInterface;
use App\Interfaces\UserInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    private StaffInterface $staffRepo;
    private UserInterface $userRepo;

    public function __construct(StaffInterface $staffRepo, UserInterface $userRepo)
    {
        $this->staffRepo = $staffRepo;
        $this->userRepo = $userRepo;
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

        if ($data['code'] === 201) {
            $user = $this->userRepo->insertData(array(
                "nama" => $request->nama,
                "email" => $request->email,
                "role" => $request->role,
                "password" => Hash::make($request->password)
            ));
            
        return response()->json($user, $user['code']);
        }

    }

    public function deleteData($id)
    {
        $data = $this->staffRepo->delete($id);

        return response()->json($data, $data['code']);
    }
}
