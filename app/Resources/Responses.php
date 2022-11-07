<?php

namespace App\Resources;

use Illuminate\Http\JsonResponse;

trait Responses
{
    /**
     * @param mixed $data
     * @param string $message
     * @return JsonResponse
     */
    public function successResponse(mixed $data = [], string $message = '', int $status_code = 200): JsonResponse
    {
        return response()->json(['status_code'=>$status_code ,'status'=>'success','data' => $data]);
    }

    /**
     * @param mixed $data
     * @param string $message
     * @return JsonResponse
     */
    public function successResponseWithMessage(mixed $data = [], string $message = '', int $status_code = 200): JsonResponse
    {
        return response()->json(['status_code'=>$status_code ,'status'=>'success','data' => $data, 'message' => isset($data['message']) ? $data['message'] : $message]);
    }

    public function successNotFound(mixed $data = [], string $message = '', int $status_code = 404): JsonResponse
    {
        return response()->json(['status_code'=>$status_code ,'status'=>'not found','data' => $data]);
    }

    /**
     * @param string $message
     * @param int $error_code
     * @return JsonResponse
     */
    public function errorResponse(string $message = '', int $error_code = 401): JsonResponse
    {
        return response()->json(['message' => $message], $error_code);
    }
}