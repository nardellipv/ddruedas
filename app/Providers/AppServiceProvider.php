<?php

namespace App\Providers;

use App\Accessory;
use App\Blog;
use App\Category;
use App\Item;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
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
        view::composer(['web.blog._asideBlog'], function ($view) {
            $postsAside = Blog::orderBy('view', 'DESC')
                ->take(4)
                ->get();

            $view->with('postsAside', $postsAside);
        });

        view::composer(['web.parts._footer'], function ($view) {
            $categories = Category::all();

            $view->with('categories', $categories);
        });

//        counts admins widgets
        view::composer(['admin.parts._widget'], function ($view) {
            $itemsCount = Item::where('status', 'Activo')
                ->count();

            $accessoryCount = Accessory::count();

            $usersRegister = User::count();

            $blogCount = Blog::count();

            $view->with([
                'itemsCount' => $itemsCount,
                'usersRegister' => $usersRegister,
                'accessoryCount' => $accessoryCount,
                'blogCount' => $blogCount,
            ]);
        });
    }
}
