<?php


namespace PengBin\FlashSale\Code;

/**
 * 自定义返回数据
 * Class CodeMsg
 * @package PengBin\FlashSale\Code
 */
class CodeMsg
{
    //数据返回
    public  function render_data($data = [],$code = 200,$msg = 'success'){
        return  response()->json([
            'code'=>$code,
            'msg'=>$msg,
            'data'=>$data
        ]);
    }
    //只返回结果
    public  function render($code = 200,$msg = 'success'){
        return  response()->json([
            'code'=>$code,
            'msg'=>$msg,
        ]);
    }
}