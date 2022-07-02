<?php

namespace Database\Factories;

use App\Models\academic_infos;
use Illuminate\Database\Eloquent\Factories\Factory;

class academic_infosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = academic_infos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
         'users_id' => $this->faker->numberBetween(1, 100),
        'college' => $this->faker->word,
        'academic_year_level' => $this->faker->numberBetween(1, 4),
        'section' => $this->faker->word,
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
