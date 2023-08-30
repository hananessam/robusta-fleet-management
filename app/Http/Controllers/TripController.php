<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ResponseService;
use App\Services\Trip\TripService;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function __construct(public TripService $tripService, public ResponseService $responseService)
    {
    }

    public function trips(Request $request)
    {
        $response = $this->tripService->trips($request);

        return $this->responseService->response($response['status'], $response['data'], $response['errors']);
    }
}
