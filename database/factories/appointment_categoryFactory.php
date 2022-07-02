<?php

namespace Database\Factories;

use App\Models\appointment_category;
use Illuminate\Database\Eloquent\Factories\Factory;

class appointment_categoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = appointment_category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'appointment_id' => $this->faker->numberBetween(1, 100),
        'category_id' => $this->faker->numberBetween(1, 100),
        'data' => $this->faker->word,
        'status' => $this->faker->randomElement(['O', 'P']),
        'created_by' => $this->faker->name,
        'updated_by' => $this->faker->name,
        'disable_by' => $this->faker->name,
        'disable_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
