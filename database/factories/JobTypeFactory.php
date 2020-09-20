<?php

namespace Database\Factories;

use App\JobType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name
        ];
    }
}
