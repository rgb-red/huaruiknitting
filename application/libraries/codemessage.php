<?php
/**
 * 数据表定义
 */
class codemessage {
    private $output = array(
        'status' => codemessage::actionError,
        'longMessage' => '',
        'shortMessage' => '',
        'encryptType' => codemessage::plainEncode,
        'requestId' => '',
        'responseTime' => '',
        'requestTime' => '',
        'repsoneContent' => '',
        'resultCode' => '',
    );

    public function __construct () {
        $this -> output['repsoneContent'] = json_encode(array());
        $this->output['requestTime']=date('Y-m-d H:i:s',CURRENT_TIMESTAMP);
    }

    const requestSuccess=200;
    const unloginError=-201;
    const loginNameEmpty=-101;
    const passwordEmpty=-102;
    const validateCodeError=-103;
    const loginError=-104;
    const registerFailed=-200;
    const actionError=-1;
    const jsonErrorDepth=901;
    const jsonErrorStateMismath=902;
    const jsonErrorCtrlChar=903;
    const jsonErrorCtrlUtf8=904;

    //自定义异常信息所使用的code
    const jsonErrorCode = -313;

    //编码方式
    const aesEncode=1;//1:AES
    const md5Encode=2;//2.MD5
    const plainEncode=3;//3.明文


    public function getcodemessageByCode($code,$repsoneContent = array(),$successMessage=''){
        switch ($code) {
            case codemessage::requestSuccess:
                $this -> output ['status'] =codemessage::requestSuccess;
                if($successMessage){
                    $this -> output['longMessage']=$successMessage;
                    $this -> output['shortMessage'] =$successMessage;
                }else{
                    $this -> output['longMessage'] = $successMessage?$successMessage:'操作成功';
                    $this -> output['shortMessage'] = $successMessage?$successMessage:'操作成功';
                }
                $this -> output ['repsoneContent'] = $repsoneContent;
                break;
            case codemessage::unloginError:
                $this -> output['resultCode'] = codemessage::unloginError;
                $this -> output['longMessage'] = '用户未登录';
                $this -> output['shortMessage'] = '用户未登录';
                break;
            case codemessage::loginNameEmpty:
                $this -> output['resultCode'] = codemessage::loginNameEmpty;
                $this -> output['longMessage'] = '请填写用户名';
                $this -> output['shortMessage'] = '请填写用户名';
                break;
            case codemessage::passwordEmpty:
                $this -> output['resultCode'] = codemessage::passwordEmpty;
                $this -> output['longMessage'] = '请填密码';
                $this -> output['shortMessage'] = '请填密码';
                break;
            case codemessage::loginError:
                $this -> output['resultCode'] = codemessage::loginError;
                $this -> output['longMessage'] = '用户名或密码错误';
                $this -> output['shortMessage'] = '用户名或密码错误';
                break;
            case codemessage::registerFailed:
                $this -> output['resultCode'] = codemessage::registerFailed;
                $this -> output['longMessage'] = '注册失败';
                $this -> output['shortMessage'] = '注册失败';
                break;
            case codemessage::jsonErrorDepth:
                $this -> output['resultCode'] = codemessage::jsonErrorDepth;
                $this -> output['longMessage'] = '到达了最大堆栈深度';
                $this -> output['shortMessage'] = '到达了最大堆栈深度';
                break;
            case codemessage::jsonErrorStateMismath:
                $this -> output['resultCode'] = codemessage::jsonErrorStateMismath;
                $this -> output['longMessage'] = '无效或异常的 JSON';
                $this -> output['shortMessage'] = '无效或异常的 JSON';
                break;
            case codemessage::jsonErrorCtrlChar:
                $this -> output['resultCode'] = codemessage::jsonErrorCtrlChar;
                $this -> output['longMessage'] = '控制字符错误，可能是编码不对';
                $this -> output['shortMessage'] = '控制字符错误，可能是编码不对';
                break;

            case codemessage::jsonErrorCtrlUtf8:
                $this -> output['resultCode'] = codemessage::jsonErrorCtrlUtf8;
                $this -> output['longMessage'] = '不正确的编码';
                $this -> output['shortMessage'] = '不正确的编码';
                break;
            case codemessage::validateCodeError:
                $this -> output['resultCode'] = codemessage::validateCodeError;
                $this -> output['longMessage'] = '验证码错误';
                $this -> output['shortMessage'] = '验证码错误';
                break;
            default:
                $this -> output['resultCode'] = codemessage::actionError;
                $this -> output['longMessage'] = '操作失败';
                $this -> output['shortMessage'] = '操作失败';
                break;

        }
        if($code!=codemessage::requestSuccess){
            if($repsoneContent){
                foreach($repsoneContent as $key=>$value){
                    if(array_key_exists($key,$this->output)){
                        $this->output[$key]=$value;
                    }
                }
            }
        }

        return $this -> output;
    }
}