<?php
use Illuminate\Support\Facades\Route;
Route::get('hello',function(){
    echo 'welcome from pengbin flash sale plugin';
});

#Route::get('hello-world/hello/{name?}','PengBin\FlashSale\Http\Controllers\FlashSaleController@hello');

Route::post('flashsale/add','PengBin\FlashSale\Http\Controllers\FlashSaleController@add');
Route::get('flashsale/lists','PengBin\FlashSale\Http\Controllers\FlashSaleController@getList');
Route::get('flashsale/get/{id}','PengBin\FlashSale\Http\Controllers\FlashSaleController@getOne');
Route::post('flashsale/edit/{id}','PengBin\FlashSale\Http\Controllers\FlashSaleController@edit');
Route::delete('flashsale/delete/{id}','PengBin\FlashSale\Http\Controllers\FlashSaleController@delete');