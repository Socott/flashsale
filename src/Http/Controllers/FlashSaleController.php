<?php

namespace PengBin\FlashSale\Http\Controllers;

use App\Http\Controllers\Controller;

class FlashSaleController extends Controller
{
    //测试控制器方法
    public function hello($name = '彭彬'){
        return 'FlashSaleController hello' . $name;
    }
}
