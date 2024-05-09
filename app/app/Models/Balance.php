<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Table: users
 *
 * === Columns ===
 * @property int $id
 * @property int $user_id
 * @property float $balance
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * === Relationships ===
 * @property-read User[]|Collection $user
 */
class Balance extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'balance',
    ];

    protected $attributes = [
        'balance' => 0,
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

}
