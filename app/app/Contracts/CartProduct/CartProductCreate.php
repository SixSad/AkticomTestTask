<?php

declare(strict_types=1);

namespace App\Contracts\CartProduct;

use App\Http\DTO\CartProductDTO;
use App\Models\CartProduct;

interface CartProductCreate
{

    public function __invoke(CartProductDTO $cartProductDTO): CartProduct;

}
