<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Lesson;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Lesson $lesson)
    {
        return TagResource::collection( $lesson->tags );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        //
    }

    public function update(Request $request, Tag $tag)
    {
        //
    }

    public function destroy(Tag $tag)
    {
        //
    }
}
