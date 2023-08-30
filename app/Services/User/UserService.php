<?php

namespace App\Services\User;
use App\Http\Resources\UserResource;
use App\Repositories\User\UserInterface;

class UserService 
{
    public function __construct(public UserInterface $userInterface) 
    {
    }

    public function create($request) {
        $model = $this->userInterface->create($request->all());

        if(!$model) {
            return ['status' => 500, 'data' => [], 'errors' => [trans('error')]];
        }

        $token = $model->createToken('login')?->plainTextToken;

        return ['status' => 400, 'data' => ['token' => $token], 'errors' => []];
    }

    public function login($request) 
    {
        $model = $this->userInterface->findByEmail($request->email);

        if(!$model || !\Hash::check($request->password, $model->password)) {
            return ['status' => 400, 'data' => [], 'errors' => [trans('credientials dosen\'t match')]];
        };

        $token = $model->createToken('login')?->plainTextToken;

        return ['status' => 200, 'data' => ['token' => $token], 'errors' => []];
    }

    public function user($request) 
    {
        $model = $request->user();

        $user = new UserResource($model);
        return ['status' => 200, 'data' => ['user' => $user], 'errors' => []];
    }
}
