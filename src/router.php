<?php
use Illuminate\Support\Facades\Route;
Route::get('hello',function(){
    echo 'welcome from pengbin flash sale plugin';
});

Route::get('hello-world/hello/{name?}','PengBin\FlashSale\Http\Controllers\FlashSaleController@hello');