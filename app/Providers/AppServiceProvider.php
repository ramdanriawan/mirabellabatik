<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Kategori;
use App\OrderDetail;
use App\Produk;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $kategoris = Kategori::withCount('produk')->get();
        $produk_terlares = Produk::where('dibeli', '>', '0')->orderBy('dibeli', 'desc')->limit(10)->get();
        $order_details2 = new OrderDetail();

        View::share('kategoris', $kategoris);
        View::share('order_details2', $order_details2);
        View::share('produk_terlares', $produk_terlares);
        //
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
