<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// ===============================
// MUST import model
// ===============================
use App\Models\Contact;                    //contact model
use App\Models\Company;                    //company model

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            // ===============================
            // map with faker variable
            // ===============================
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'company_id' => Company::pluck('id')->random()   //random any id from the company table
        ];
    }
}
