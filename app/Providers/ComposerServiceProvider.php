<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('web.accessories._asideAccessories', function ($view) {
            $categories = Category::withCount(['accessory'])
                ->get();

            $view->with([
                'categories' => $categories,
            ]);
        });
    }
}
