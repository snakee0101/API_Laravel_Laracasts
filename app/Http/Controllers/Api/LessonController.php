<?php

namespace app\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
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
            return response()->json([
                'error' => [
                    'message' => 'Lesson does not exist'
                ]
            ], status: 404);
        }

        return [
            'data' => $lesson
        ];
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
