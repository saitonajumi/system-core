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
            'sender_id' => $this->faker->word,
        'sender_message' => $this->faker->word,
        'receiver_id' => $this->faker->word,
        'receiver_message' => $this->faker->word,
        'referral_code' => $this->faker->word,
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
