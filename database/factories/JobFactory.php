<?php

namespace Database\Factories;

use App\Models\BusinessUser;
use App\Models\Job;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $u = User::factory()->create();
        $b = BusinessUser::factory()->create();

        $b->user()->save($u);

        return [
            'content' => $this->faker->paragraph,
            'title' => $this->faker->title,
            'business_user_id' => $b,
            'job_type_id' => JobType::first(),
            'deadline' => now()
        ];
    }
}
