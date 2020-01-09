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

	//后台布局
	public function index(){
		$this->load->view('admin/layout');
	}

	//首页
	public function shouye(){
		$this->load->view('admin/shouye');
	}

	//站点信息管理
	public function info(){
		$lan = $this->input->get("lan");

		$data["lan"] = 0;
		$data["info"] = $this->SITE;
		if($lan && $lan == 1){
			$data["lan"] = 1;
			$data["info"] = $this->EN_SITE;
		}

		$this->load->view("admin/info", $data);
	}

	//首页轮播图
	public function slide(){
		$sql = "SELECT * FROM slide ORDER BY sort ASC";
		$data["slide"] = $this->db->query($sql)->result_array();
		$this->load->view("admin/slide", $data);
	}

	//首页产品展示
	public function proshow(){
		echo "proshow";
	}

	//首页关于华瑞
	public function about(){
		echo "about";
	}

	//公司简介
	public function intro(){
		echo "intro";
	}

	//总经理致辞
	public function speech(){
		echo "speech";
	}

	//企业文化
	public function culture(){
		echo "culture";
	}

	//厂房设备
	public function factory(){
		echo "factory";
	}

	//荣誉资质
	public function honor(){
		echo "honor";
	}

	//产品管理
	public function edit_product(){
		$id = $this->input->get("id");
		if($id != ""){
			$sql = "SELECT * FROM product WHERE id={$id}";
			$data["info"] = $this->db->query($sql)->row_array();
			$data["id"] = $data["info"]["id"];
		}else{
			$data["id"] = "";
		}

		//产品分类
		$sql = "SELECT id,`name`,`title` FROM product_classify ORDER BY id ASC";
		$data["classify"] = $this->db->query($sql)->result_array();

		//前段URL
		$sql = "SELECT front_url FROM site_info WHERE id=0";
		$data["front_url"] = $this->db->query($sql)->row_array()["front_url"];

		$this->load->view("admin/edit_product", $data);
	}

	public function product_list(){
		$data["info"]["id"] = $this->input->get("id") ? $this->input->get("id") : "";
		$data["info"]["number"] = $this->input->get("number") ? $this->input->get("number") : "";
		$data["info"]["title"] = $this->input->get("title") ? $this->input->get("title") : "";
		$data["info"]["classify"] = $this->input->get("classify") ? $this->input->get("classify") : "";
		$data["info"]["time"] = $this->input->get("time") ? $this->input->get("time") : "";

		//产品分类
		$sql = "SELECT id,`name`,`title` FROM product_classify ORDER BY id ASC";
		$data["classify"] = $this->db->query($sql)->result_array();

		$this->load->view("admin/product_list", $data);
	}

	//产品分类管理
	public function product_classify(){
		$sql = "SELECT * FROM product_classify ORDER BY id ASC";
		$data["list"] = $this->db->query($sql)->result_array();

		$this->load->view("admin/product_classify", $data);
	}

	//产品分类编辑
	public function product_classify_item(){
		$id = $this->input->get("id");

		$sql = "SELECT * FROM product_classify WHERE id={$id}";
		$data = $this->db->query($sql)->row_array();

		$this->load->view("admin/product_classify_item", $data);
	}

	//产品分类添加
	public function product_classify_add(){
		$data["id"] = "";
		$this->load->view("admin/product_classify_item", $data);
	}

	//新闻管理
	public function news(){
		echo "news";
	}

	//留言管理
	public function contact(){
		echo "contact";
	}

	//用户管理
	public function user(){
		echo "user";
	}
}