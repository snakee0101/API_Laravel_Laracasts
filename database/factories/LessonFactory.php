<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    use WithFaker;

    protected $model = Lesson::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'user_id' => User::factory()
        ];
    }

    public function withUser(User $user)
    {
        return $this->state(function ($attributes) use ($user) {
            return [
                'user_id' => $user->id
            ];
        });
    }
}
