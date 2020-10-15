<?php

namespace App\Providers;

use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Auth;





/**
 * Class AuthServiceProvider.
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function ($user) {
            return $user->hasRole(config('access.users.admin_role')) ? true : null;
        });
        
        Gate::define(\WebDevEtc\BlogEtc\Gates\GateTypes::MANAGE_BLOG_ADMIN, static function (?Model $user) {
        // Implement your logic here, for example:
        if(Auth::user()){
            return $user && $user->email === $user->email;
        }
            
        // Or something like `$user->is_admin === true`
        });
    }
    
    
        
}
