<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->sentence(),
            'state_id' => $this->faker->randomDigit(),
            'user_access_key'=>$this->faker->randomAscii(),
            'token_id'=>$this->faker->randomAscii(),

        ];
    }
}
