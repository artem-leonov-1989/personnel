<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function successResponse(array|null $data = null, int $status = 200, string|null $msg = null)
    {
        if (!is_null($msg)) {
            if (is_null($data)) {
                $data = ['message' => $msg];
            } else {
                $data['message'] = $msg;
            }
        }
        if (is_null($data)) {
            $status = 204;
        }
        return response()->json($data, $status);
    }

    public function errorResponse(string $message, $status = 400, array $data = [])
    {
        $response['error'] = $message;
        if (count($data) > 0) {
            $response['data'] = $data;
        }
        return response()->json($response, $status);
    }
}
