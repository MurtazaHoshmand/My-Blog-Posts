<?php


// to authrize we just have to:
//1: make an policy then add it to $policies 
//2:  at the register func register it 
//3: with us of resource make a resurce of it 
//4: use in our controller(for every method ($this->authrize($data)))

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        '\App\Model' => '\App\Policies\ModelPlolicy'
    ];
    
    /**
     * Register any authentication / authorization services.
     */
    public function boot()
{
    $this->registerPolicies();

    // using policy
    // Gate::define('posts.update', 'App\Policies\BlogPostPolicy@update');
    // Gate::define('posts.delete', 'App\Policies\BlogPostPolicy@delete');

    Gate::resource('posts','App\Policies\BlogPostPolicy@update');



    // Gate::define('update-post', function ($user, $post) {
    //     return $user->id === $post->user_id;
    // });

    Gate::before(function ($user, $ability) {
        if ($user->is_admin && in_array($ability, ['update'])) {
            return true;
        }
    });
}
}
