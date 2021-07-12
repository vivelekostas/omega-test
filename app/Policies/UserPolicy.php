<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
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
        if ($user->role->title == Role::ADMIN) {
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
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param User $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        if ($user->role->title == Role::MANAGER ||$user->id == $model->id) {
            return Response::allow();
        }

        return Response::deny();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response
     */
    public function create(User $user)
    {
        return $user->role->title == Role::MANAGER
            ? Response::allow()
            : Response::deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param User $model
     * @return Response
     */
    public function update(User $user, User $model)
    {
        return $user->role->title == Role::MANAGER || $user->id == $model->id
            ? Response::allow()
            : Response::deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param User $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->role->title == Role::ADMIN
            ? Response::allow()
            : Response::deny();
    }
}
