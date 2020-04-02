<?php

namespace App\Providers;

use App\Http\ViewComposers\ActiveModuleComposer;
use App\Http\ViewComposers\FacebookComposer;
use App\Models\Enums\ModuleType;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'welcome', FacebookComposer::class
        );

        // Using class based composers...
        View::composer(
            '*', ActiveModuleComposer::class
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
