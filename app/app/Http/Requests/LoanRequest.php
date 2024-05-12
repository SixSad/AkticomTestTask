<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\Loan\Status;
use Illuminate\Validation\Rule;
use Orion\Http\Requests\Request;

class LoanRequest extends Request
{

    public function updateRules(): array
    {
        return [];
    }

    public function storeRules(): array
    {
        return [
            'sum' => ['required', 'numeric'],
            'status' => ['filled', Rule::enum(Status::class)],
        ];
    }

}
