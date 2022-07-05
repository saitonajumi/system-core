<?php

namespace Database\Factories;

use App\Models\new_features;
use Illuminate\Database\Eloquent\Factories\Factory;

class new_featuresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = new_features::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id' => $this->faker->numberBetween(1, 5),
        'title' => $this->faker->title,
        'feature_description' => $this->faker->word,
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
