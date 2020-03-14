<?php

namespace PengBin\FlashSale\Models;

use Illuminate\Database\Eloquent\Model;

class FlashSaleModel extends Model
{
    protected $table = 'flash_sale';
    protected $primaryKey = 'id';

    /**
     * 添加限时求购
     */
    public function add($data){
        return $this->save($data);
    }
}
