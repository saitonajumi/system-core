<?php

namespace Database\Factories;

use App\Models\instructors;
use Illuminate\Database\Eloquent\Factories\Factory;

class instructorsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = instructors::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id' => $this->faker->word,
        'status' => $this->faker->word,
        'created_by' => $this->faker->word,
        'updated_by' => $this->faker->word,
        'disable_by' => $this->faker->word,
        'disable_at' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
