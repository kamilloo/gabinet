<?php

namespace App\Providers;

use App\Http\ViewComposers\ActiveModuleComposer;
use App\Http\ViewComposers\FacebookComposer;
use App\Models\Enums\ModuleType;
use App\Models\Shop;
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

        View::share('shop', $this->getShop());
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

    /**
     * @return mixed
     */
    private function getShop()
    {
        return Shop::whereRaw('1=1')->first() ?? new Shop;
    }
}
