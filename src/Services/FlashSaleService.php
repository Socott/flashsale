<?php


namespace PengBin\FlashSale\Services;


use PengBin\FlashSale\Code\CodeMsg;
use PengBin\FlashSale\Exceptions\RewardException;
use PengBin\FlashSale\Models\FlashSaleModel;
use PengBin\FlashSale\Utils\TransFrom;
use PengBin\FlashSale\Validators\FlashSaleValidator;

class FlashSaleService
{
    private $flashSaleModel;
    private $flashSaleValidator;
    private $transFrom;
    private $codeMsg;

    /**
     * 初始化验证器
     */
    public function __construct(FlashSaleModel $flashSaleModel,FlashSaleValidator $flashSaleValidator,TransFrom $transFrom,CodeMsg $codeMsg)
    {
        $this->flashSaleModel = $flashSaleModel;
        $this->flashSaleValidator = $flashSaleValidator;
        $this->transFrom = $transFrom;
        $this->codeMsg = $codeMsg;
    }

    /**
     * 添加限时抢购任务
     * @param $param 需要添加的数据
     */
    public function add($data){
        try{
            //验证器验证数据
            $this->flashSaleValidator->check($data);
            //将驼峰转为下划线跟数据库匹配
            $data = $this->transFrom->convertHump($data,true);
            //往数据库添加数据
            $result = $this->flashSaleModel->add($data);
            return $result ? $this->codeMsg->render(200,'添加成功')
                    : $this->codeMsg->render(500,'数据库连接错误');
        }catch (RewardException $e){
            return $e->render();
        }
    }

    /**
     * 查询列表
     */
    public function getList($params){
        $where['status'] = 0;
        if($params['name'])  $where['name'] = array('');
        $lists = $this->flashSaleModel->getList($where)->toArray();
        //下划线转为驼峰
        $lists = $this->transFrom->convertHump($lists,true);
        return $this->codeMsg->render_data(compact('lists'));
    }

    /**
     * 获取一条详情
     */
    public function getOne($id){
        $where['status'] = 0;
        $where['id'] = intval($id);
        $itemd = $this->flashSaleModel->getOne($where)->toArray();
        //下划线转为驼峰
        $itemd = $this->transFrom->convertHump($itemd,true);
        return $itemd ? $this->codeMsg->render_data(compact('itemd'))
                      : $this->codeMsg->render('500','数据不存在');
    }

    /**
     * 修改一条详情
     */
    public function edit($id,$data){
        try{
            //验证器验证数据
            $this->flashSaleValidator->check($data);
            //将驼峰转为下划线跟数据库匹配
            $data = $this->transFrom->convertHump($data,true);
            //往数据库添加数据
            $result = $this->flashSaleModel->edit($id,$data);
            return $result ? $this->codeMsg->render(200,'修改成功')
                : $this->codeMsg->render(500,'修改失败');
        }catch (RewardException $e){
            return $e->render();
        }
    }

    /**
     * 删除一条
     */
    public function delete($id){
        $where['id'] = intval($id);
        $res= $this->flashSaleModel->deletes($id);
        return $res ? $this->codeMsg->render(200,'删除成功')
                    : $this->codeMsg->render(500,'删除失败');
    }
}