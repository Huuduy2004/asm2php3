<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class LeftServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.a
     */
    public function boot(): void
    {
        View::composer('admin.layouts.left', function ($view) {
            $category = DB::table('cate')->get();
            $view->with('category', $category); });
    }
}
