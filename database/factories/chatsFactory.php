<?php

namespace Database\Factories;

use App\Models\chats;
use Illuminate\Database\Eloquent\Factories\Factory;

class chatsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = chats::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sender_id' => $this->faker->numberBetween(1, 5),
        'sender_message' => $this->faker->word,
        'receiver_id' => $this->faker->numberBetween(1, 5),
        'receiver_message' => $this->faker->word,
        'referral_code' => $this->faker->postcode,
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
