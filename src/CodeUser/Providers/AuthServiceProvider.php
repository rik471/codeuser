<?php

namespace CodePress\CodeUser\Providers;



use CodePress\CodeUser\Repository\PermissionRepositoryInterface;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

/**
* Register any application authentication / authorization services.
*
* @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
* @return void
*/
    public function boot(Gate $gate)
    {
        $this->registerPolicies($gate);

        if (!app()->runningInConsole()) {
            /**@var PermissionRepositoryInterface @permissionRepository */
            $permissionRepository = app(PermissionRepositoryInterface::class);
            $permissions = $permissionRepository->all();
            foreach ($permissions as $p) {
                $gate->define($p->name, function ($user) use ($p) {
                    return $user->isAdmin() || $user->hasRole($p->roles);
                });
            }
        }
    }
}