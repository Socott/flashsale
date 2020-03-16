<?php

namespace PengBin\FlashSale\Models;



class FlashSaleModel extends BaseModel
{
    protected $table = 'flash_sale';
    protected $primaryKey = 'id';

    /**
     * 添加限时求购
     */
    public function add($data){
        $data['created_at'] = $data['updated_at'] = time();
        return self::insert($data);
    }

    /**
     * 查询列表
     */
    public function getList($where){
        return self::where($where)
            ->select('id','name','begin_time','ends_time','tag','limit','pinkage','customer_label','auto_lable','trade_amount','trade_times','trade_integral','updated_at','created_at','status')
            ->get();
    }

    /**
     * 获取一条详情
     */
    public function getOne($id){
        return self::find($id);
    }

    /**
     * 修改一条详情
     */
    public function edit($id,$editData){
        $post = self::where(['id'=>$id]);
        return $post->update($editData);
    }

    /**
     * 删除一条
     */
    public function deletes($id){
        $post = self::where(['id'=>$id]);
        return $post->update(['status'=>-1]);
    }
}
