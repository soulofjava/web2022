<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\Website;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::registerView(function () {
            return redirect(url('/'));
        });

<<<<<<< HEAD
=======
        Fortify::loginView(function () {
            $themes = Website::all()->first();
            return view('back.pages.auth.login');
        });

>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
