<?php

namespace App\Services;

class ResponseService 
{
    public function __construct() 
    {
    }

    public function response($status=200, $data=[], $errors=[]) {
        return [
            'status' => $status,
            'data' => $data,
            'errors' => $errors
        ];
    }
    
}
