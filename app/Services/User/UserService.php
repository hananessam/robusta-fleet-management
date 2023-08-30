<?php

namespace App\Services\User;
use App\Repositories\User\UserInterface;

class UserService 
{
    public function __construct(public UserInterface $userInterface) 
    {
    }

    public function create($request) {
        $model = $this->userInterface->create($request->all());

        if(!$model) {
            return ['status' => false, 'errors' => [trans('error')]];
        }

        $token = $model->createToken('login')?->plainTextToken;

        return ['status' => true, 'data' => ['token' => $token]];
    }

    public function login($request) 
    {
        $model = $this->userInterface->findByEmail($request->email);

        if(!$model || !\Hash::check($request->password, $model->password)) {
            return ['status' => false, 'errors' => [trans('credientials dosen\'t match')]];
        };

        $token = $model->createToken('login')?->plainTextToken;

        return ['status' => true, 'data' => ['token' => $token]];
    }
}
