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
    }

    public function index()
    {
        return LessonResource::collection( Lesson::paginate() );
    }

    public function store(Request $request)
    {
        //TODO: ADD API AUTHENTICATION

        Lesson::create(
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

    public function destroy(Lesson $lesson)
    {
        //
    }
}
