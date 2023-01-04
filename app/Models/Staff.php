<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff';
    protected $fillable = [
        'nama', 'jabatan'
    ];

    public function scopeStaffList($query, $params)
    {
        $page = ($params['page'] - 1) * $params['limit'];
        if ($params['search']) {
            return $query
            ->where('nama', 'LIKE', '%'.$params['search'].'%')
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
