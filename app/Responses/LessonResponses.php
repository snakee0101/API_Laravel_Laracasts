<?php

namespace App\Responses;

use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\JsonResponse;

class LessonResponses
{
    private $statusCode;

    private function respond($data)
    {
        return response()->json([
            'data' => $data
        ], $this->statusCode);
    }

    private function respondWithError($message)
    {
        return response()->json([
            'error' => [
                'message' => $message
            ]
        ], status: $this->statusCode);
    }

    private function setStatusCode($code) :static
    {
        $this->statusCode = $code;

        return $this;
    }

    public function notFound($message = null) :JsonResponse
    {
        return $this->setStatusCode(404)
                    ->respondWithError('Lesson does not exist');
    }

    public function retrieve(Lesson $lesson) :JsonResponse
    {
        return $this->setStatusCode(200)
                    ->respond( new LessonResource($lesson) );
    }
}
