<?php

namespace Database\Factories;

use App\Models\appointments;
use Illuminate\Database\Eloquent\Factories\Factory;

class appointmentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = appointments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id' => $this->faker->numberBetween(1, 100),
        'category_id' => $this->faker->numberBetween(1, 100),
        'guidance_id' => $this->faker->numberBetween(1, 100),
        'reason' => $this->faker->word,
        'notes' => $this->faker->word,
        'status' => $this->faker->randomElement(['O', 'P']),
        'approve_schedule' => $this->faker->date('Y-m-d H:i:s'),
        'created_by' => $this->faker->name,
        'updated_by' => $this->faker->name,
        'disable_by' => $this->faker->name,
        'disable_at' => $this->faker->date('Y-m-d H:i:s'),
        'decline_by' => $this->faker->name,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
