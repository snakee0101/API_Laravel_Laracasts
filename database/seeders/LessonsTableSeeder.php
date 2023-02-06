<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 31; $i++)
        {
            Lesson::factory()->hasAttached( Tag::factory()->count(3) )
                             ->withUser( User::inRandomOrder()->first() )
                             ->create();
        }
    }
}
