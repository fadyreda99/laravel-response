<?php

namespace Fadyreda99\LaravelResponse;

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

    protected function getPaginationData($data)
    {
        return [
            'current_page' => $data->currentPage(),
            'last_page' => $data->lastPage(),
            'total_page' => $data->lastPage(),
            'per_page' => $data->perPage(),
            'total_items' => $data->total(),
            'from' => $data->firstItem(),
            'to' => $data->lastItem(),
            'next_page_url' => $data->nextPageUrl(),
            'prev_page_url' => $data->previousPageUrl(),
            'first_page_url' => $data->url(1),
            'last_page_url' => $data->url($data->lastPage()),
            'path' => $data->path(),
        ];
    }
}
