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
     */
    public function add(Request $request){
        $param = $request->all();
        return $this->flashSaleService->add($param);
    }

    /**
     * 获取列表
     */
    public function getList(Request $request){
        return $this->flashSaleService->getList($request);
    }

    /**
     * 获取一条详情
     */
    public function getOne($id){
        return $this->flashSaleService->getOne($id);
    }

    /**
     * 修改
     */
    public function edit(Request $request){
        $data = $request->post();
        $id = $request->get('id');
        return $this->flashSaleService->edit($id,$data);
    }

    /**
     * 删除一条数据
     */
    public function delete($id){
        return $this->flashSaleService->delete($id);
    }

}
