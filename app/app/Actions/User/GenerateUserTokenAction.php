<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\User;
use Laravel\Sanctum\NewAccessToken;

class GenerateUserTokenAction
{

    public function __invoke(User $user): NewAccessToken
    {
        $user->tokens()->delete();
        return $user->generateApiToken();
    }

}
