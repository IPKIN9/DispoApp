<?php

namespace App\Http\Controllers;

use App\Interfaces\MahasiswaInterface;
use App\Interfaces\TicketInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    private MahasiswaInterface $studentRepo;
    private TicketInterface $ticketRepo;

    public function __construct(MahasiswaInterface $studentRepo, TicketInterface $ticketRepo)
    {
        $this->studentRepo = $studentRepo;
        $this->ticketRepo = $ticketRepo;
    }

    public function insertData(Request $request)
    {
        $student = array(
            'nama' => $request->nama,
            'stambuk' => $request->stambuk,
            'prodi' => $request->prodi,
            'fakultas' => $request->fakultas,
        );

        $tiket = array(
            'no_tiket' => $request->stambuk,
            'id_mahasiswa' => 0,
            'id_staff' => 3,
            'keterangan' => $request->keterangan,
            'verifikasi' => false,
        );

        $mahasiswaResponse = $this->studentRepo->Upsert(null, $student);
        $tiket['id_mahasiswa'] = $mahasiswaResponse['data']['id'];

        $ticketResponse = $this->ticketRepo->Upsert(null, $tiket);

        return response()->json($ticketResponse, $ticketResponse['code']);
    }

    public function tiketStatus():JsonResponse
    {
        $params = array(
            'search' => request('search'),
            'limit' => 1,
            'page' => 1,
        );
        $data = $this->ticketRepo->getAll($params);

        return response()->json($data, $data['code']);
    }
}
