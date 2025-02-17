<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    const string CREATED_MESSAGE = 'created';
    const string UPDATED_MESSAGE = 'updated';
    const string DELETED_MESSAGE = 'deleted';

    protected function returnCreatedResponse(array $data = ['message' => self::CREATED_MESSAGE]): JsonResponse
    {
        return response()->json($data, 201);
    }
    protected function returnUpdatedResponse(array $data = ['message' => self::UPDATED_MESSAGE]): JsonResponse
    {
        return response()->json($data);
    }
    protected function returnDeletedResponse($data = ['message' => self::DELETED_MESSAGE]): JsonResponse
    {
        return response()->json($data);
    }
}
