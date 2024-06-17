<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
    view()->composer('shared', function($view)
    {
        $categories=DB::table('categories')->where('categories.display',1)->select('id');
       
        $prod=DB::table('products')->where('products.display',1)->whereIn('id_category',$categories)->first();
        $view->with('prod', $prod);
    });
    view()->composer('contactUs', function($view)
    {
        $categories=DB::table('categories')->where('categories.display',1)->select('id');
       
        $prod=DB::table('products')->where('products.display',1)->whereIn('id_category',$categories)->first();
        $view->with('prod', $prod);
    });
    view()->composer('aboutUs', function($view)
    {
        $categories=DB::table('categories')->where('categories.display',1)->select('id');
       
        $prod=DB::table('products')->where('products.display',1)->whereIn('id_category',$categories)->first();
        $view->with('prod', $prod);
    });
    view()->composer('detailProduit', function($view)
    {
        $categories=DB::table('categories')->where('categories.display',1)->select('id');
       
        $prod=DB::table('products')->where('products.display',1)->whereIn('id_category',$categories)->first();
        $view->with('prod', $prod);
    });
}
}
