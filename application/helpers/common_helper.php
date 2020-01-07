<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*-----通用的常用函数-----*/

//加载配置文件
function CONFIG($item){
	$CI =& get_instance();
	return $CI->config->item($item);
}

//获取访客ip
function get_client_ip() {
	if( !empty($_SERVER["HTTP_CF_CONNECTING_IP"]) )
		$cip = $_SERVER["HTTP_CF_CONNECTING_IP"];
	elseif( !empty($_SERVER["HTTP_INCAP_CLIENT_IP"]) )
		$cip = $_SERVER["HTTP_INCAP_CLIENT_IP"];
	elseif( !empty($_SERVER["HTTP_CLIENT_IP"]) )
		$cip = $_SERVER["HTTP_CLIENT_IP"];
	elseif( !empty($_SERVER["HTTP_X_FORWARDED_FOR"]) )
		$cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	elseif( !empty($_SERVER["REMOTE_ADDR"]) )
		$cip = $_SERVER["REMOTE_ADDR"];
	else
		$cip = "";
	$cip = preg_replace('/[^\d|\.]/',"",$cip);
	return $cip;
}

//验证邮箱
function check_email($email) 
{
   $regexp = "/^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
   $valid = 0;
 
   if (preg_match($regexp, $email)){
	  list($username, $domaintld) = explode("@",$email);
      if ($username && $domaintld ){
		list($domain, $tld) = explode(".", $domaintld);
		if($domain && $tld){
			$valid = TRUE;
		}else{
			$valid = FALSE;
		}
	  }
   } else {
      $valid = FALSE;
   }
 
   return $valid;
}

//验证是否纯数字
function check_all_num($num){
	if(preg_match("/^[0-9]*$/", $num)){
		return TRUE;
	}else{
		return FALSE;
	}
}

//生成随机秘钥
function cteateSalt(){
	$pool = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$len = strlen($pool);

	for($i = 0; $i <= 3; $i ++){
		$salt[$i] = mt_rand(0, $len - 1);
	}

	foreach($salt as $k => $v){
		$pool = str_shuffle($pool);
		$salt[$k] = substr($pool, $v, 1);
	}
	
	return implode("", $salt);
}

//api返回数据
function r($data){
	echo json_encode($data);
	exit;
}

//jquery跳转
function jump($url){
	echo "<script>window.location.href='".$url."'</script>";
	exit;
}

//jquery提示信息，并返回上一页
function alert_go($msg){
	echo "<script>alert('".$msg."');history.go(-1);</script>";
	exit;
}

//密码加密
function pwdEncrypt($pwd, $salt){
	return md5(md5($pwd) . md5($salt) . "!$54^23!2435*9~");
}

//sql update选项拼接
function sql_update_merge_item($data){
	$item = "";
	$index = 0;
	foreach($data as $k => $v){
		if($index == 0){
			$index = 1;
			$item .= "`" . $k . "`" . "='".$v."'";
		}else{
			$item .= ",`" . $k . "`" . "='".$v."'";
		}
	}

	return $item;
}