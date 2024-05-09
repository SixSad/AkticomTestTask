<?php

declare(strict_types=1);

namespace App\Http\DTO;

readonly class UserObject extends BaseDTO
{

    public function __construct(
        public ?int $id = null,
        public ?string $email = null,
    ) {
    }

}
