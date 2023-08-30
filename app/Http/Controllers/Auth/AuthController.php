<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

        if(!$response['status']){
            return $this->responseService->response(400, [], $response['errors']);
        };

        return $this->responseService->response(200, $response['data']);
    }
}
