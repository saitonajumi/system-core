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
            'users_id' => $this->faker->word,
        'category_id' => $this->faker->word,
        'guidance_id' => $this->faker->word,
        'reason' => $this->faker->word,
        'notes' => $this->faker->word,
        'status' => $this->faker->word,
        'approve_schedule' => $this->faker->word,
        'created_by' => $this->faker->word,
        'updated_by' => $this->faker->word,
        'disable_by' => $this->faker->word,
        'disable_at' => $this->faker->word,
        'decline_by' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
