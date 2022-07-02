<?php

namespace Database\Factories;

use App\Models\applications;
use Illuminate\Database\Eloquent\Factories\Factory;

class applicationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = applications::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'personal_information' => $this->faker->word,
        'livelihood' => $this->faker->word,
        'certificate' => $this->faker->word,
        'boat_registration' => $this->faker->word,
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
