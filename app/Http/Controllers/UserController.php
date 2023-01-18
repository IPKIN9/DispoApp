<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserInterface $userRepo;
    public function __construct(UserInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getRoleUser():JsonResponse {
        $username = request('username');
        $data = $this->userRepo->getRole($username);

        return response()->json($data, $data['code']);
    }

    public function getAllData():JsonResponse {
        $params = array(
            'search' => request('search'),
            'limit' => request('limit'),
            'page' => request('page'),
        );

        $data = $this->userRepo->getAll($params);
        return response()->json($data, $data['code']);
    }
}
