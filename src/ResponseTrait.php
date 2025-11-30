<?php

namespace Vendor\LaravelResponse;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    protected function successResponse($data = null, string $message = 'Request succeeded', int $code = 200, ?array $pagination = null, ?array $additionals = null): JsonResponse
    {
        $response = [
            'status'  => 'success',
            'message' => $message,
            'data'    => $data,
        ];

        if ($pagination !== null) {
            $response['pagination'] = $pagination;
        }

        if ($additionals !== null) {
            $response['additionals'] = $additionals;
        }

        return response()->json($response, $code);
    }

    protected function errorResponse(string $message = 'Request failed', int $code = 400, $data = null): JsonResponse
    {
        $payload = [
            'status'  => 'error',
            'message' => $message,
        ];

        if ($data !== null) {
            $payload['data'] = $data;
        }

        return response()->json($payload, $code);
    }
}
