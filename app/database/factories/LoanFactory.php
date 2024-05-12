<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Loan\Status;
use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition()
    {
        return [
            'sum' => $this->faker->numberBetween(1, 100000),
            'status' => $this->faker->randomElement(Status::toArray()),
        ];
    }

}
