<?php

namespace App\Responses;

use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class LessonResponses
{
    private $statusCode;

    public function message($message)
    {
        return response()->json( [
            'message' => $message
        ], $this->statusCode );
    }

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

    public function setStatusCode($code) :static
    {
        $this->statusCode = $code;

        return $this;
    }

    public function notFound($message = null) :JsonResponse
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)
                    ->respondWithError('Lesson does not exist');
    }

    public function retrieve(Lesson $lesson) :JsonResponse
    {
        return $this->setStatusCode(200)
                    ->respond( new LessonResource($lesson) );
    }
}
