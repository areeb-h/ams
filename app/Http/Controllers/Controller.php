<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class Controller
{
    /**
     * Send a success response.
     *
     * @param mixed $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function success(mixed $data, string $message = 'Operation successful', int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * Send a failure response.
     *
     * @param string $message
     * @param int $statusCode
     * @param mixed|null $data
     * @return JsonResponse
     */
    protected function fail(string $message = 'Operation failed', int $statusCode = 400, mixed $data = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * Send a response with arbitrary success status.
     *
     * @param bool $success
     * @param mixed $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function respond(bool $success, mixed $data, string $message, int $statusCode): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

//    /**
//     * Handle paginated response.
//     *
//     * @param ResourceCollection $resourceCollection
//     * @return array
//     */
//    protected function paginate(ResourceCollection $resourceCollection): array
//    {
//        return $resourceCollection->response()->getData(true);
//    }
    /**
     * Handle paginated response.
     *
     * @param ResourceCollection $resourceCollection
     * @return array
     */
    protected function paginated(ResourceCollection $resourceCollection, $message = 'Data fetched successfully'): array
    {
        $paginationData = $resourceCollection->response()->getData(true);
        $data = $paginationData['data'];

//        unset($paginationData['data']);

        $pagination = [
            'total' => $paginationData['meta']['total'],
            'count' => $paginationData['meta']['to'] - $paginationData['meta']['from'] + 1,
            'per_page' => $paginationData['meta']['per_page'],
            'current_page' => $paginationData['meta']['current_page'],
            'total_pages' => $paginationData['meta']['last_page'],
            'links' => [
                'first' => $paginationData['links']['first'],
                'last' => $paginationData['links']['last'],
                'prev' => $paginationData['links']['prev'],
                'next' => $paginationData['links']['next']
            ]
        ];

        return [
            'success' => true,
            'message' => $message,
            'data' => $data,
            'pagination' => $pagination
        ];
    }
}
