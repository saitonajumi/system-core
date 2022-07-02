<?php

namespace Database\Factories;

use App\Models\other_infos;
use Illuminate\Database\Eloquent\Factories\Factory;

class other_infosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = other_infos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id' => $this->faker->numberBetween(1, 100),
        'photo' => $this->faker->imageUrl,
        'infos' => $this->faker->jobTitle,
        'status' => $this->faker->randomElement(['O', 'P']),
        'created_by' => $this->faker->name,
        'updated_by' => $this->faker->name,
        'disable_by' => $this->faker->name,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
