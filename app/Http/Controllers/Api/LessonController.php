<?php

namespace app\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use App\Responses\LessonResponses;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct(private LessonResponses $lesson_responses)
    {
        $this->lesson_responses = new LessonResponses();
    }

    public function index()
    {
        return Lesson::all();
    }

    public function store(Request $request)
    {
        //
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
