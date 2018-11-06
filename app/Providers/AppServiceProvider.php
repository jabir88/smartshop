<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Support\Facades\Schema;
use App\Contact;
use App\Category;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.inc.header', function ($view) {
            $countMess = Contact::where('conus_status', 1)->count();
            $countMessages = Contact::where('conus_status', 1)->take(3)->orderBy('conus_id', 'DESC')->get();

            $view->with(compact('countMess', 'countMessages'));
        });
        View::composer('frontEnd.inc.header', function ($view) {
            $cate2 = Category::where('pub_status', '1')->orderBy('id', 'ASC')->get();
            $view->with(compact('cate2'));
        });
        View::composer('frontEnd.inc.nav', function ($view) {
            $cate = Category::where('pub_status', '1')->orderBy('id', 'ASC')->get();
            $view->with(compact('cate'));
        });
        View::composer('admin.inc.header', function ($view) {
            $notification = DB::table('notifications')->count();
            $view->with(compact('notification'));
        });
        Schema::defaultStringLength(191);
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
