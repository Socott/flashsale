<?php


namespace PengBin\FlashSale\Services;


use Illuminate\Validation\ValidationException;
use PengBin\FlashSale\Code\CodeMsg;
use PengBin\FlashSale\Exceptions\RewardException;
use PengBin\FlashSale\Models\FlashSaleModel;
use PengBin\FlashSale\Validators\FlashSaleValidator;

class FlashSaleService
{
    private $flashSaleModel;
    private $flashSaleValidator;

    /**
     * 初始化验证器
     */
    public function __construct(FlashSaleModel $flashSaleModel,FlashSaleValidator $flashSaleValidator)
    {
        $this->flashSaleModel = $flashSaleModel;
        $this->flashSaleValidator = $flashSaleValidator;
    }

    /**
     * 添加限时抢购任务
     * @param $param 需要添加的数据
     */
    public function add($data){
        try{
            //验证器验证数据
            $this->flashSaleValidator->check($data);
            //验证通过则添加数据
            $result = $this->flashSaleModel->add($data);
            $codeMsg = new CodeMsg();
            echo $result ? $codeMsg->render() :  $codeMsg->render(500,'数据库错误');
        }catch (RewardException $e){
            echo $e->render();
        }
    }
}