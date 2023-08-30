<?php

namespace App\Repositories\User;

use App\Repositories\Base\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserInterface
{
    public $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
}
