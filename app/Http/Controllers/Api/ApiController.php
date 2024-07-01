<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class ApiController extends Controller
{
    public function sendSuccess($data, $message = '', $status = 200)
    {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    }
}
