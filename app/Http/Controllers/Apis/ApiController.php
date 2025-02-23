<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function unauthorized($message = null): JsonResponse
    {
        return response()->json([
            'message' => $message ?? 'Unauthorized'
        ], 401);
    }

    public function validation(array $errors): JsonResponse
    {
        return response()->json([
            'message' => "Invalid inputs, please check your inputs",
            'errors' => $errors
        ], 422);
    }

    public function forbidden($message = null): JsonResponse
    {
        return response()->json([
            'message' => $message ?? 'Forbidden'
        ], 403);
    }

    public function success($data): JsonResponse
    {
        return response()->json([
            'data' => $data
        ]);
    }

    public function fail($message = null): JsonResponse
    {
        return response()->json([
            'message' => $message ?? "Something went wrong"
        ], 400);
    }
}
