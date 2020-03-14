<?php


namespace PengBin\FlashSale\Code;

/**
 * 自定义返回数据
 * Class CodeMsg
 * @package PengBin\FlashSale\Code
 */
class CodeMsg
{
    private $code;
    private $msg;
    //数据返回
    public  function render($code = 200,$msg = 'success'){
        return  response()->json([
            'code'=>$this->code,
            'msg'=>$this->msg,
        ]);
    }
}