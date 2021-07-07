<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use App\Policies\DepartmentPolicy;
use App\Policies\PositionPolicy;
use App\Policies\UserPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Department::class => DepartmentPolicy::class,
        Position::class => PositionPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        // просмотр списка пользователей доступен только админу.
//        Gate::define('show-users-index', function (User $user) {
//            if ($user->role->title === 'Admin') {
//                return Response::allow();
//            }
//
//            return Response::deny('Ты не админ! Катись от сюда!');
//        });
    }
}
