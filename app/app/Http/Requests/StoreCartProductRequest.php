<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StoreCartProductRequest extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
        ];
    }

}
