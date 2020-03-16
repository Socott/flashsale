<?php


namespace PengBin\FlashSale\Utils;


class TransFrom
{

    /**
     * 下划线转驼峰
     */

    private function convertUnderline($str)
    {
        $str = preg_replace_callback('/([-_]+([a-z]{1}))/i',function($matches){
            return strtoupper($matches[2]);
        },$str);
        return $str;
    }

    /*
     * 驼峰转下划线
     */
    private function humpToLine($str){
        $str = preg_replace_callback('/([A-Z]{1})/',function($matches){
            return '_'.strtolower($matches[0]);
        },$str);
        return $str;
    }

    /**
     *
     * 下划线转数组(默认) $flag为true驼峰转下划线
     * @return array
     */
    public function convertHump(array $data,$flag = false){
        $result = [];
        foreach ($data as $key => $item) {
            if (is_array($item) || is_object($item)) {
                $flag ? $result[$this->humpToLine($key)] = $this->convertHump((array)$item)
                      : $result[$this->convertUnderline($key)] = $this->convertUnderline((array)$item);
            } else {
                $flag ? $result[$this->humpToLine($key)] = $item
                      : $result[$this->convertUnderline($key)] = $item;
            }
        }
        return $result;
    }


}