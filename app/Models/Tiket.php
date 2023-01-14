<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = 'tikets';
    protected $fillable = [
        'no_tiket',
        'id_mahasiswa',
        'id_staff',
        'keterangan',
        'verifikasi'
    ];

    public function scopeJoinList($query)
    {
        return $query
        ->join('mahasiswa as students', 'tikets.id_mahasiswa', '=', 'students.id')
        ->join('staff as staff_user', 'tikets.id_staff', '=', 'staff_user.id')
        ->select(
            'tikets.*', 
            'students.nama as nama_mahasiswa',
            'students.stambuk as no_stambuk',
            'students.prodi as prodi',
            'students.fakultas as fakultas',
            'staff_user.nama as nama_staff',
            'staff_user.jabatan as jabatan',
        );
    }

    public function scopeTicketList($query, $params)
    {
        $page = ($params['page'] - 1) * $params['limit'];
        if ($params['search']) {
            return $query
            ->where('nama_mahasiswa', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('no_stambuk', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('prodi', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('fakultas', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('nama_staff', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('jabatan', 'LIKE', '%'.$params['search'].'%')
            ->offset($page)
            ->limit($params['limit']);
        } else {
            return $query
            ->offset($page)
            ->limit($params['limit']);
        }
        
    }

}
