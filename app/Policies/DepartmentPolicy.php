<?php

namespace App\Policies;

use App\Models\Department;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DepartmentPolicy
{
    use HandlesAuthorization;

    /**
     * Выполнить предварительную авторизацию.
     *
     * @param User $user
     * @param  string  $ability
     * @return bool
     */
    public function before(User $user, string $ability)
    {
        if ($user->role->title == "Admin") {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response
     */
    public function create(User $user): Response
    {
        return $user->role->title == 'Manager'
            ? Response::allow()
            : Response::deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Department $department
     * @return Response
     */
    public function update(User $user, Department $department): Response
    {
        return $user->role->title == 'Manager'
            ? Response::allow()
            : Response::deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Department $department
     * @return Response
     */
    public function delete(User $user, Department $department): Response
    {
        return $user->role->title != 'Admin'
            ? Response::deny()
            : Response::allow();
    }
}
