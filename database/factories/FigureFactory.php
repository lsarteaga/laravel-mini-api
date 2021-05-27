<?php

namespace Database\Factories;

use App\Models\Figure;
use Illuminate\Database\Eloquent\Factories\Factory;

class FigureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Figure::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'area' => $this->faker->randomNumber(2),
            'perimeter' => $this->faker->randomNumber(2)
        ];
    }
}
