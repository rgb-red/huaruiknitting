<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends ADMIN_Controller {
	public function index(){
		SESSION_START();
		if(isset($_SESSION["username"])){
			jump("/admin");
		}else{
			$this->load->view("admin/login");
		}
    }
    
    //登录
	public function login_post(){
		$username = htmlentities(strtolower(trim($this->input->post("username"))), ENT_QUOTES, 'UTF-8');
		$password = htmlentities(trim($this->input->post("password")), ENT_QUOTES, 'UTF-8');
		$code = strtoupper((trim($this->input->post("code"))));
		$data["status"] = 1;
		$data["msg"] = "";

		//检测登录信息合法性
		if(!$username){
			$data["status"] = 0;
			$data["msg"] = "用户名不能为空！";
		}
		else if(!$password){
			$data["status"] = 0;
			$data["msg"] = "密码不能为空！";
		}
		else if(!$code){
			$data["status"] = 0;
			$data["msg"] = "验证码不能为空！";
		}

		if($data["status"] == 0){
			r($data);
		}

		//检测验证码
		SESSION_START();
		if(!isset($_SESSION["code"])){
			$data["status"] = 0;
			$data["msg"] = "非法登录！";
		}else{
			if(time() - $_SESSION["code"]["time"] > 5 * 60){
				$data["status"] = 0;
				$data["msg"] = "验证码已过期，请刷新验证码后重试！";
			}else{
				if($_SESSION["code"]["word"] != $code){
					$data["status"] = 0;
					$data["msg"] = "验证码错误！";
				}
			}
		}

		if($data["status"] == 0){
			r($data);
		}

		$sql = "SELECT username,nickname,`password`,salt FROM `admin`";
		$user = $this->db->query($sql)->row_array();

        //校验密码
		if($username != $user["username"] || pwdEncrypt($password, $user["salt"]) != $user["password"]){
			$data["status"] = 0;
			$data["msg"] = "用户名或密码不正确，请确认后重试!";
			r($data);
		}

		$time = time();
		$sql = "UPDATE `admin` SET last_login={$time},logins=logins+1";
        $_SESSION["username"] = $user["username"];
        $_SESSION["nickname"] = $user["nickname"];

		r($data);
    }
    
    //生成后台管理员账户
    public function create_admin(){
        $username = "admin";
        $salt = cteateSalt();
        $password = pwdEncrypt("123456", $salt);
        $nickname = "管理员";
        $logins = 0;
        $last_login = 0;

        $sql = "INSERT INTO admin (`id`,`username`,`salt`,`password`,`nickname`,`logins`,`last_login`) VALUES (0,'{$username}','{$salt}','{$password}','{$nickname}',{$logins},{$last_login})";
        $this->db->query($sql);
    }

	//获取验证码及图片
	public function get_verify_code(){
		$this->load->helper('captcha');
		$vals = array(
		    'img_path'  => './captcha/',
		    'img_url'   => '/captcha/',
		    'img_width' => '100',
		    'expiration'    => 10,
		    'word_length'   => 4,
		    'pool'      => '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ',
		    'font_path' => realpath('./fonts/ColossalisBQ-Bold.otf'),
		    // White background and border, black text and red grid
		    'colors'    => array(
		        'background' => array(255, 255, 255),
		        'border' => array(255, 255, 255),
		        'text' => array(151,29,27),
		        'grid' => array(219,197,199)
		    )
		);
		
		$cap = create_captcha($vals);
		SESSION_START();
		$_SESSION["code"] = array();
		$_SESSION["code"]["word"] = $cap["word"];
		$_SESSION["code"]["time"] = time();

		echo $cap['image'];
	}

	//退出
	public function logout(){
		SESSION_START();
		SESSION_DESTROY();
		jump("/login");
	}
}