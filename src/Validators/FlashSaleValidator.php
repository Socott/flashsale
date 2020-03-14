<?php


namespace PengBin\FlashSale\Validators;

use Illuminate\Support\Facades\Validator;
use PengBin\FlashSale\Exceptions\RewardException;

/**
 * 验证器
 * Class FlashSaleValidator
 * @package PengBin\FlashSale\Validators
 */
class FlashSaleValidator
{
    /**
     * 验证方法
     */
    public function check($data)
    {
        $rules = [
            'name' => 'required',
            'beginTime'=>'required',
            'endsTime'=>'required',
            'tag'=>'required',
        ];

        $messages = [
            'required'=>':attribute不能为空',
        ];

        $customAttributes = [
            'name'=>'活动名称',
            'beginTime'=>'生效时间',
            'endsTime'=>'失效时间',
            'tag'=>'活动标签',
        ];
        //验证数据
        $validator = Validator::make($data,$rules,$messages,$customAttributes);
        if($validator->fails()){
            $errors = $validator->errors()->getMessages();
            throw new RewardException(RewardException::ADD_ERROR,$errors);
        }
    }


}