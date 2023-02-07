<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class LessonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'thumbnail_url' => $this->thumbnail_url ? url(Storage::url($this->thumbnail_url))
                                                    : null,
        ];
    }
}
