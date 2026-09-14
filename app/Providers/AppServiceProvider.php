<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $user = null;

            if (session()->has('user_id')) {
                $user = User::find(session('user_id'));
            }

            $view->with('user', $user);
        });
    }
}
