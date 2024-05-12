<?php

declare(strict_types=1);

namespace App\Enums\Loan;

enum Status: string
{

    case Active = 'active';

    case Closed = 'closed';

    case Paid = 'paid';

    public static function toArray(): array
    {
        return [
            self::Active->value,
            self::Closed->value,
            self::Paid->value,
        ];
    }

}
