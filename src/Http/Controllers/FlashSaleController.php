<?php

namespace PengBin\FlashSale\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PengBin\FlashSale\Services\FlashSaleService;

class FlashSaleController extends Controller
{
    private $flashSaleService;

    public function __construct(FlashSaleService $flashSaleService)
    {
        $this->flashSaleService = $flashSaleService;
    }

    /**
     * 添加限时抢购
     * @param Request $request
     * @param FlashSaleService $flashSaleService
     */
    public function Add(Request $request){
        $param = $request->all();
        $this->flashSaleService->add($param);
    }


}
