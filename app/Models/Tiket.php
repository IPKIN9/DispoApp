<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = 'tiket';
    protected $fillable = [
        'no_tiket',
        'id_mahasiswa',
        'id_staff',
        'keterangan',
        'verifikasi'
    ];

}
