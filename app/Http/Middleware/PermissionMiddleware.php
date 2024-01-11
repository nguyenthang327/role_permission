<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()->getName();

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

        // if(!in_array($routeName, $permissionOfUser)){
        //     return back()
        // }

        // dd($routeName);
        
        return $next($request);
    }
}
