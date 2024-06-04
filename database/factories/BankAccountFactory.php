<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Country;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankAccount>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'bank_name' => $this->faker->city,
            'country_id' => Country::inRandomOrder()->first()->id,
            'currency_id' => Currency::inRandomOrder()->first()->id,
            'iban_number' => $this->faker->unique()->iban('US'),
            'number' => $this->faker->unique()->bankAccountNumber,
            'soft_code' => $this->faker->swiftBicNumber,
            'bank_address' => $this->faker->address,
            'account_id' => null,
        ];
    }
}
