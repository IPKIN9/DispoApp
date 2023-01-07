<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nama',
        'stambuk',
        'prodi',
        'fakultas',
    ];

    public function scopeMahasiswaList($query, $params)
    {
        $page = ($params['page'] - 1) * $params['limit'];
        if ($params['search']) {
            return $query
            ->where('nama', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('stambuk', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('prodi', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('fakultas', 'LIKE', '%'.$params['search'].'%')
            ->offset($page)
            ->limit($params['limit']);
        } else {
            return $query
            ->offset($page)
            ->limit($params['limit']);
        }
        
    }
}
