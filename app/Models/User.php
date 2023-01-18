<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use HasApiTokens, Authenticatable, Authorizable, HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'nama', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password'
    ];

    public function scopeUserList($query, $params)
    {
        $page = ($params['page'] - 1) * $params['limit'];
        if ($params['search']) {
            return $query
            ->where('nama', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('email', 'LIKE', '%'.$params['search'].'%')
            ->offset($page)
            ->limit($params['limit']);
        } else {
            return $query
            ->offset($page)
            ->limit($params['limit']);
        }
        
    }
}
