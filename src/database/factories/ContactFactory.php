<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;

        return [
            'fullname' => $lastName . $firstName,
            'gender' => $this->faker->randomElement(['男性', '女性']),
            'email' => $this->faker->safeEmail,
            'postcode' => substr_replace($this->faker->postcode, '-', 3, 0),
            'address' => $this->faker->streetAddress,
            'building_name' => $this->faker->secondaryAddress,
            'opinion' => $this->faker->text(120),
            'created_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'updated_at' => $this->faker->dateTimeBetween('-1 week', '+1 week')
        ];
    }
}
