<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $user = null;
            $permissionOfUser = [];
            if(auth()->user()){
                $user = auth()->user();
                $user = User::with(['roles.permissions'])->where('id', $user->id)->first();
                if(!empty($user->roles)){
                    if (!empty($user->roles[0]->permissions)) {
                        $permissionOfUser = collect($user->roles[0]->permissions)->pluck('code')->toArray();
                    }
                }
            }
 
            $view->with([
                'user' => $user,
                'permissionOfUser' => $permissionOfUser,
            ]);
        });
    }
}
