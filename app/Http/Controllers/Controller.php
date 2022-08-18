<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($data = null, $message = "Transacción exitosa", $status = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public function notFoundResponse()
    {
        return response()->json([
            'message' => "Recurso no encontrado"
        ], 404);
    }

    public function forbiddenResponse()
    {
        return response()->json([
            'message' => "Recurso no autorizado"
        ], 403);
    }

    public function successResponse($message = "Transsacción exitosa")
    {
        return response()->json([
            'message' => $message,
        ], 200);
    }

    public function errorResponse($message = "Transsacción fallida", $status = 400)
    {
        return response()->json([
            'message' => $message,
        ], $status);
    }
}
