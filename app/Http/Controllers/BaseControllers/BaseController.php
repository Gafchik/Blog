<?php

namespace App\Http\Controllers\BaseControllers;

use App\Http\Classes\Structure\HttpStatus;
use App\Http\Controllers\Controller;

use Couchbase\BaseException;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    public function makeGoodResponse(array $data = []): JsonResponse
    {
        return response()
            ->json(
                [
                    'status' => HttpStatus::OK,
                    'data' => $data
                ],
                HttpStatus::OK
            );
    }

    public function makeBadResponse(\Exception $e): JsonResponse
    {
        return response()
            ->json(
                [
                    'status' => $e->getCode(),
                    'textError' => $e->getMessage()
                ],
                $e->getCode()
            );
    }
}
