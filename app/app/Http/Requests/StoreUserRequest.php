<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StoreUserRequest extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
        ];
    }

}
