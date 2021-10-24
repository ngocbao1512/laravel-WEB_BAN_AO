<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ResponseSuccess($msg, $data, $status_code = 200)
    {
        return response()->json([
            'message' => $msg.'successful',
            'data' => $data,
            'status_code' => $status_code,
        ],$status_code);
    }

    public function ResponseError($msg, $err = null, $status_code = 400)
    {
        return responses()->json([
            'message' => $msg.' fail',
            'errors' => $err,
            'status_code' => $status_code,
        ],$status_code);
    }
}
