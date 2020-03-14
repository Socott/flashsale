<?php

namespace PengBin\FlashSale;

use Illuminate\Support\ServiceProvider;

class FlashSaleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //注册控制器
        //$this->app->make('PengBin\FlashSale\Http\Controllers\FlashSaleController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //加载路由
        $this->loadRoutesFrom(__DIR__.'/router.php');
    }
}
