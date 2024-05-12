<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Loan\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table: loans
 *
 * === Columns ===
 * @property int $id
 * @property float $sum
 * @property Status status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Loan extends Model
{

    use HasFactory;

    protected $fillable = [
        'sum',
        'status',
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    protected $attributes = [
        'status' => Status::Active,
    ];
}
