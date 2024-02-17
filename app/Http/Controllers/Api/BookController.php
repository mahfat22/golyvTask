<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\BookedRequest;
use App\Http\Requests\CheckBookedRequest;
use App\Services\BookedService;

class BookController extends BaseController
{
    public function reservation( BookedRequest $request , BookedService $bookedService )
    {
        $bookedService->store($request->validated()) ;
    }

    public function checkAvailableSeats( CheckBookedRequest $request , BookedService $bookedService )
    {
        $data = $bookedService->getAvailableSeats($request->validated()) ;
        return $this->sendResponse($data, "");
    }
}
