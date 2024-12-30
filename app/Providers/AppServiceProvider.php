<?php

namespace App\Providers;

use App\Models\Notes;
use App\Policies\NotesPolicy;

use Illuminate\Support\Facades\Gate;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    protected $policies = [
        Notes::class => NotesPolicy::class,
    ];

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

    }
}
