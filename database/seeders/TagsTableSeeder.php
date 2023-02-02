<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        Tag::factory()->count(10)->create();

        Lesson::all()->each(function($lesson) {
            $tags = Tag::inRandomOrder()->limit(3)->get();

            $lesson->tags()->attach($tags);
        });
    }
}
