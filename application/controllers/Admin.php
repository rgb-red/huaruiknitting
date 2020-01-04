<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends ADMIN_Controller {
	public function __construct(){
		parent::__construct();
		if(explode(".", $_SERVER['SERVER_NAME'])[0] != "admin"){
			$this->load->helper("url");
			$url = is_https() ? "https://" : "http://";
			$url .= $_SERVER['SERVER_NAME'];
			redirect($url, 'refresh');
		}
		SESSION_START();
		if(!isset($_SESSION["username"])){
			echo "<script>window.location.href='/login'</script>";
			exit;
		}
	}

	public function index(){
		$this->load->view('admin/layout');
	}

	public function shouye(){
		$this->load->view('admin/shouye');
	}
}