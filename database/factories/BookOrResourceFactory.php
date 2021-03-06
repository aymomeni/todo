<?php

namespace Database\Factories;

use App\Models\BookOrResource;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookOrResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookOrResource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'body' => $this->faker->text(180),
            'completed' => $this->faker->boolean,
            'effort' => $this->faker->numberBetween(1, 12),
            'priority' => $this->faker->numberBetween(1, 5)
        ];
    }
}