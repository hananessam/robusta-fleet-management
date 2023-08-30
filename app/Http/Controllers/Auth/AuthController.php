<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\ResponseService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(public UserService $userService, public ResponseService $responseService)
    {
    }

    public function register(RegisterRequest $request)
    {
        $response = $this->userService->create($request);

        return $this->responseService->response($response['status'], $response['data'], $response['errors']);
    }

    public function login(LoginRequest $request)
    {
        $response = $this->userService->login($request);
        return $this->responseService->response($response['status'], $response['data'], $response['errors']);
    }
}
