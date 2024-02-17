<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\BookedRequest;
use App\Services\BookedService;

class BookController extends BaseController
{
    public function reservation( BookedRequest $request , BookedService $bookedService )
    {
        $bookedService->store($request->validated()) ;
    }
}
