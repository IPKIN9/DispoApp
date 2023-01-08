<?php

namespace App\Http\Controllers;

use App\Interfaces\TicketInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    private TicketInterface $ticketRepo;

    public function __construct(TicketInterface $ticketRepo)
    {
        $this->ticketRepo = $ticketRepo;
    }
    public function getAllData():JsonResponse
    {
        $params = array(
            'search' => request('search'),
            'limit' => request('limit'),
            'page' => request('page'),
        );
        $data = $this->ticketRepo->getAll($params);

        return response()->json($data, $data['code']);
    }

    public function getDataById($id)
    {
        $data = $this->ticketRepo->getById($id);

        return response()->json($data, $data['code']);
    }

    public function upsertData(Request $request):JsonResponse
    {
        $dataId = $request->id | null;
        $detail = array(
            'no_tiket' => $request->no_tiket,
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_staff' => $request->id_staff,
            'keterangan' => $request->keterangan,
            'verifikasi' => $request->verifikasi,
        );
        $detail['updated_at'] = Carbon::now();

        $data = $this->ticketRepo->upsert($dataId, $detail);

        return response()->json($data, $data['code']);
    }

    public function deleteData($id)
    {
        $data = $this->ticketRepo->delete($id);

        return response()->json($data, $data['code']);
    }
}
