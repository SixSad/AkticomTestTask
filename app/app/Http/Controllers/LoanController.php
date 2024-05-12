<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Models\Loan;

class LoanController extends Controller
{
    protected $model = Loan::class;

    protected $request = LoanRequest::class;

    public function filterableBy(): array
    {
        return [
            'sum',
            'created_at',
            'updated_at',
        ];
    }

    public function sortableBy(): array
    {
        return [
            'sum',
            'created_at',
            'updated_at',
        ];
    }

}
