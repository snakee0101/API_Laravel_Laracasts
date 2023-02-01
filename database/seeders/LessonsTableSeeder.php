<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class LessonsTableSeeder extends Seeder
{
    use WithFaker;

    protected $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }

    public function run()
    {
        foreach (range(1,30) as $index)
        {
            Lesson::create([
                'title' => $this->faker->sentence,
                'body' => $this->faker->paragraph,
                'some_boolean' => $this->faker->boolean
            ]);
        }
    }
}
