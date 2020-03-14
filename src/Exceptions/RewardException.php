<?php

namespace PengBin\FlashSale\Exceptions;

class RewardException extends \Exception
{
    protected $data;
    const UNKONW = 72000;
    const NAMR_EMPTY = 72001;
    const TYPE_EMPTY = 72002;
    const TYPE_ERROR = 72003;
    const START_TIME_EMPTY = 72004;
    const END_TIME_EMPTY = 72005;
    const PROMOT_TYPE_ERROR = 72006;
    const START_TIME_ERROR = 72007;
    const END_TIME_ERROR = 72008;
    const CREATE_ERROR = 72009;
    const ID_ERROR = 72010;
    const UPDATE_ERROR = 72011;
    const DATA_EMPTY = 72012;
    const ORDER_NOT_EXIST = 72013;
    const REWARD_ERROR = 72014;
    const ROOT_ERROR = 72015;
    const USERNAME_ERROR = 72016;
    const AVATAR_ERROR = 72017;
    const USER_EXITS = 72018;
    const ADD_ERROR = 72019;

    static public $__names = array(
        self::UNKONW => 'UNKNOWN',
        self::NAMR_EMPTY => 'NAMR_EMPTY',
        self::TYPE_EMPTY => 'TYPE_EMPTY',
        self::TYPE_ERROR => 'TYPE_ERROR',
        self::START_TIME_EMPTY => 'START_TIME_EMPTY',
        self::END_TIME_EMPTY => 'END_TIME_EMPTY',
        self::PROMOT_TYPE_ERROR => 'PROMOT_TYPE_ERROR',
        self::START_TIME_ERROR => 'START_TIME_ERROR',
        self::END_TIME_ERROR => 'END_TIME_ERROR',
        self::CREATE_ERROR => 'CREATE_ERROR',
        self::ID_ERROR => 'ID_ERROR',
        self::UPDATE_ERROR => 'UPDATE_ERROR',
        self::DATA_EMPTY => 'DATA_EMPTY',
        self::ORDER_NOT_EXIST => 'ORDER_NOT_EXIST',
        self::REWARD_ERROR => ':',
        self::ROOT_ERROR => 'ROOT_ERROR',
        self::USERNAME_ERROR => 'USERNAME_ERROR',
        self::AVATAR_ERROR => 'AVATAR_ERROR',
        self::USER_EXITS => 'USER_EXITS',
        self::ADD_ERROR => 'ADD_ERROR',
    );

    /**
     * CommonException constructor.
     * @param string $code
     * @param string $replace
     */
    public function __construct($code, $replace = '')
    {
        $message = '';
        if (!empty($replace)) {
            if (is_string($replace)) {
                $message = $replace;
            }
            if (is_array($replace)) {
                foreach ($replace as $k => $v) {
                    foreach ($v as $v1){
                        $message .= $v1."||";
                        $this->data[$k] = $v1;
                    }
                }
            }
        }else{
            $message = self::$__names[$code];
        }
        parent::__construct($message, $code);
    }

    /**
     * @return mixed
     */
    public function render()
    {
        /*return [
            'code' => $this->code,
            'message' => explode('||',trim($this->message,'||')),
        ];*/
        return response()->json([
            'code' => $this->code,
            'message' => explode('||',trim($this->message,'||')),
            'data' => $this->data
        ]);
    }
}
