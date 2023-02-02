<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Tag;
use Database\Factories\TagFactory;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    public function run()
    {
        Lesson::factory()->hasAttached( Tag::factory()->count(3) )
                         ->count(30)
                         ->create();
    }
}
