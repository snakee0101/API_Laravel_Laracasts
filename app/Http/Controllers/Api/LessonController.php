<?php

namespace app\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use App\Responses\LessonResponses;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LessonController extends Controller
{
    public function __construct(private LessonResponses $lesson_responses)
    {
        $this->lesson_responses = new LessonResponses();

        $this->middleware('auth:sanctum')->only('store', 'update', 'destroy');
    }

    public function index()
    {
        return LessonResource::collection( Lesson::paginate() );
    }

    /**
     * Create a lesson and attach it to current user
     * */
    public function store(Request $request)
    {
        $request->user()->lessons()->create(
            $request->only('title', 'body')
        );

        return $this->lesson_responses->setStatusCode(Response::HTTP_CREATED)
                                      ->message('Lesson successfully created');
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson)
        {
            return $this->lesson_responses->notFound();
        }

        return $this->lesson_responses->retrieve($lesson);
    }

    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * User could delete lessons only that belong to is
     * */
    public function destroy(Lesson $lesson, Request $request)
    {
        if($request->user()->lessons()
                        ->where('lessons.id', $lesson->id)->exists())
        {
            $lesson->delete();

            return [
                'message' => 'Lesson is successfully deleted'
            ];
        }

        return $this->lesson_responses->setStatusCode(403)->respondWithError('You have no right to delete this lesson');
    }
}
