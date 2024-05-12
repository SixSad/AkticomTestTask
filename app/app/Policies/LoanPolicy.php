<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class LoanPolicy
{

    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    use HandlesAuthorization;

    public function viewAny(
        ?User $user
    ): Response {
        return $this->allow();
    }

    public function view(
        ?User $user,
        Loan $loan
    ): Response {
        return $this->allow();
    }

    public function create(
        ?User $user
    ): Response {
        return $this->allow();
    }

    public function update(
        ?User $user,
        Loan $loan
    ): Response {
        return $this->allow();
    }

    public function delete(
        ?User $user,
        Loan $loan
    ): Response {
        return $this->allow();
    }

    public function restore(
        ?User $user,
        Loan $loan
    ): Response {
        return $this->deny();
    }

    public function forceDelete(
        ?User $user,
        Loan $loan
    ): Response|bool {
        return $this->deny();
    }

}
