<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Table: users
 *
 * === Columns ===
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * === Relationships ===
 * @property-read Cart|Collection $carts
 */
class Product extends Model
{

    use HasFactory;

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(CartProduct::class, 'cart_products');
    }

}
