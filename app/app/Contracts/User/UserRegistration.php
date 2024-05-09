<?php

declare(strict_types=1);

namespace App\Contracts\User;

use App\Http\DTO\UserObject;
use App\Models\User;

interface UserRegistration
{

    public function __invoke(UserObject $userObject): User;

}
