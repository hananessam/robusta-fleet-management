<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReserveSeatRequest;
use App\Services\ResponseService;
use App\Services\Seat\SeatService;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function __construct(public SeatService $seatService, public ResponseService $responseService)
    {
    }

    public function reserve(Request $request)
    {
        $response = $this->seatService->reserve($request);

        return $this->responseService->response($response['status'], $response['data'], $response['errors']);
    }
}
