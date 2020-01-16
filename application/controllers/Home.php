<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct(){
		parent::__construct();

		//跳转后台
		if(explode(".", $_SERVER['SERVER_NAME'])[0] == "admin"){
			$this->load->helper("url");
			$url = is_https() ? "https://" : "http://";
			$url .= $_SERVER['SERVER_NAME'] . '/admin';
			redirect($url, 'refresh');
		}
	}

	public function index(){
		//轮播图
		$sql = "SELECT * FROM slide ORDER BY sort ASC";
		$data["banner"] = $this->db->query($sql)->result_array();

		//产品推送
		if($this->LAN == "cn"){
			$title = "title";
			$text = "text";
			$brief = "brief";
		}else{
			$title = "en_title";
			$text = "en_text";
			$brief = "en_brief";
		}

		$sql = "SELECT id,{$title} as title FROM product WHERE push=2 ORDER BY id DESC";
		$data["product"] = $this->db->query($sql)->result_array();

		//关于我们
		$sql = "SELECT {$text} as `text` FROM `page` WHERE `page`='about'";
		$data["about"] = $this->db->query($sql)->row_array()["text"];

		//新闻
		$sql = "SELECT id,{$title} as `title`,{$brief} as `brief` FROM news WHERE cover=1 ORDER BY id DESC LIMIT 3";
		$data["news"] = $this->db->query($sql)->result_array();

		$this->load->view("index", $data);
	}

	public function profile(){
		$data["info"] = [
			"title" => CONFIG($this->LAN)["title_2_1"],
			"keywords" => "公司简介," . $this->SITE["keywords"],
			"description" => "公司简介," . $this->SITE["description"],
			"sort" => 1,
		];

		if($this->LAN == "cn"){
			$text = "text";
		}else{
			$text = "en_text";
		}

		$sql = "SELECT `{$text}` as `text` FROM `page` WHERE `page`='intro'";
		$data["info"]["text"] = $this->db->query($sql)->row_array()["text"];

		$this->load->view("about/index", $data);
	}

	public function ceo_speech(){
		$data["info"] = [
			"title" => CONFIG($this->LAN)["title_2_2"],
			"keywords" => "总经理致辞," . $this->SITE["keywords"],
			"description" => "总经理致辞," . $this->SITE["description"],
			"sort" => 2,
		];

		if($this->LAN == "cn"){
			$text = "text";
		}else{
			$text = "en_text";
		}

		$sql = "SELECT `{$text}` as `text` FROM `page` WHERE `page`='speech'";
		$data["info"]["text"] = $this->db->query($sql)->row_array()["text"];

		$this->load->view("about/index", $data);
	}

	public function culture(){
		$data["info"] = [
			"title" => CONFIG($this->LAN)["title_2_3"],
			"keywords" => "企业文化," . $this->SITE["keywords"],
			"description" => "企业文化," . $this->SITE["description"],
			"sort" => 3,
		];

		if($this->LAN == "cn"){
			$text = "text";
		}else{
			$text = "en_text";
		}

		$sql = "SELECT `{$text}` as `text` FROM `page` WHERE `page`='culture'";
		$data["info"]["text"] = $this->db->query($sql)->row_array()["text"];

		$this->load->view("about/index", $data);
	}

	public function facility(){
		$data["factory"]["limit"] = 12;
		$data["factory"]["page"] = $this->input->get("page") || $this->input->get("page") > 0 ? $this->input->get("page") : 1;
		$start = ($data["factory"]["page"] - 1) * $data["factory"]["limit"];

		$data["info"] = [
			"title" => CONFIG($this->LAN)["title_2_4"],
			"keywords" => "厂房设备," . $this->SITE["keywords"],
			"description" => "厂房设备," . $this->SITE["description"],
			"sort" => 4,
		];

		if($this->LAN == "cn"){
			$text = "title";
		}else{
			$text = "en_title";
		}

		$sql ="SELECT SQL_CALC_FOUND_ROWS id,`{$text}` as title FROM factory ORDER BY sort ASC LIMIT {$start},{$data["factory"]["limit"]}";
		$data["factory"]["data"] =  $this->db->query($sql)->result_array();
		$data["factory"]["num"] = $this->db->select('found_rows() as nums')->get()->row_array()["nums"];
		$data["factory"]["count"] = ceil($data["factory"]["num"] / $data["factory"]["limit"]);

		$this->load->view("about/index", $data);
	}

	public function products(){
		$data["product"]["limit"] = 12;
		$data["product"]["classify"] = $this->input->get("cat") ? $this->input->get("cat") : 0;
		$data["product"]["page"] = $this->input->get("page") || $this->input->get("page") > 0 ? $this->input->get("page") : 1;
		$start = ($data["product"]["page"] - 1) * $data["product"]["limit"];

		$data["info"] = [
			"keywords" => "产品中心," . $this->SITE["keywords"],
			"description" => "产品中心," . $this->SITE["description"],
		];

		if($this->LAN == "cn"){
			$title = "title";
			$title2 = "name";
		}else{
			$title = "en_title";
			$title2 = "title";
		}

		$where = "1=1";
		if((int)$data["product"]["classify"]){
			$where .= " AND classify={$data["product"]["classify"]}";
		}

		$sql = "SELECT SQL_CALC_FOUND_ROWS id,`{$title}` as title FROM product WHERE {$where} ORDER BY id DESC LIMIT {$start},{$data["product"]["limit"]}";
		$data["product"]["data"] =  $this->db->query($sql)->result_array();
		$data["product"]["num"] = $this->db->select('found_rows() as nums')->get()->row_array()["nums"];
		$data["product"]["count"] = ceil($data["product"]["num"] / $data["product"]["limit"]);

		$sql = "SELECT id,{$title2} as title FROM product_classify ORDER BY sort ASC";
		$data["classify"]["data"] = $this->db->query($sql)->result_array();
		$data["classify"]["num"] = $data["product"]["classify"];
		if($data["classify"]["num"] == 0){
			$data["classify"]["title"] = $this->LAN == "cn" ? "全部" : "All";
		}else{
			foreach($data["classify"]["data"] as $v){
				if($v["id"] == $data["classify"]["num"]){
					$data["classify"]["title"] = $v["title"];
					break;
				}
			}
		}
		
		$this->load->view("product/index", $data);
	}

	public function product_info(){
		$id = $this->input->get("id");
		$sql = "SELECT * FROM product WHERE id={$id}";
		$product = $this->db->query($sql)->row_array();
		$sql = "SELECT * FROM product_classify ORDER BY sort ASC";
		$data["classify"]["data"] = $this->db->query($sql)->result_array();
		$data["classify"]["num"] = $product["classify"];

		$data["product"]["id"] = $product["id"];
		$data["product"]["number"] = $product["number"];
		if($this->LAN == "cn"){
			$data["product"]["title"] = $product["title"];
			$data["product"]["brief"] = $product["brief"];
			$data["product"]["text"] = $product["text"];

			foreach($data["classify"]["data"] as $v){
				if($v["id"] == $product["classify"]){
					$data["product"]["classify"] = $v["name"];
				}
			}
			$title = "title";
		}else{
			$data["product"]["title"] = $product["en_title"];
			$data["product"]["brief"] = $product["en_brief"];
			$data["product"]["text"] = $product["en_text"];

			foreach($data["classify"]["data"] as $v){
				if($v["id"] == $product["classify"]){
					$data["product"]["classify"] = $v["title"];
				}
			}

			$title = "en_title";
		}

		$data["product"]["time"] = date("Y-m-d H:i:s", $product["time"]);

		$sql = "SELECT id,{$title} as `title` FROM product WHERE classify={$product["classify"]} AND id<>{$id} ORDER BY id DESC LIMIT 3";
		$data["related"] = $this->db->query($sql)->result_array();

		$this->load->view("product/product_info", $data);
	}

	public function news(){
		$data["news"]["limit"] = 6;
		$data["news"]["classify"] = $this->input->get("cat") ? $this->input->get("cat") : 0;
		$data["news"]["page"] = $this->input->get("page") || $this->input->get("page") > 0 ? $this->input->get("page") : 1;
		$start = ($data["news"]["page"] - 1) * $data["news"]["limit"];

		$data["info"] = [
			"keywords" => "新闻资讯," . $this->SITE["keywords"],
			"description" => "新闻资讯," . $this->SITE["description"],
		];

		if($this->LAN == "cn"){
			$title = "title";
			$title2 = "name";
			$brief = "brief";
		}else{
			$title = "en_title";
			$title2 = "title";
			$brief = "en_brief";
		}

		$where = "1=1";
		if((int)$data["news"]["classify"]){
			$where .= " AND classify={$data["news"]["classify"]}";
		}

		$sql = "SELECT SQL_CALC_FOUND_ROWS id,`{$title}` as `title`,{$brief} as `brief` FROM news WHERE {$where} ORDER BY id DESC LIMIT {$start},{$data["news"]["limit"]}";
		$data["news"]["data"] =  $this->db->query($sql)->result_array();
		$data["news"]["num"] = $this->db->select('found_rows() as nums')->get()->row_array()["nums"];
		$data["news"]["count"] = ceil($data["news"]["num"] / $data["news"]["limit"]);

		$sql = "SELECT id,{$title2} as title FROM news_classify ORDER BY sort ASC";
		$data["classify"]["data"] = $this->db->query($sql)->result_array();
		$data["classify"]["num"] = $data["news"]["classify"];
		if($data["classify"]["num"] == 0){
			$data["classify"]["title"] = $this->LAN == "cn" ? "全部" : "All";
		}else{
			foreach($data["classify"]["data"] as $v){
				if($v["id"] == $data["classify"]["num"]){
					$data["classify"]["title"] = $v["title"];
					break;
				}
			}
		}
		
		$this->load->view("news/index", $data);
	}

	public function news_detail(){
		$id = $this->input->get("id");
		$sql = "SELECT * FROM news WHERE id={$id}";
		$news = $this->db->query($sql)->row_array();
		$sql = "SELECT * FROM news_classify ORDER BY sort ASC";
		$data["classify"]["data"] = $this->db->query($sql)->result_array();
		$data["classify"]["num"] = $news["classify"];

		$data["news"]["id"] = $news["id"];

		if($this->LAN == "cn"){
			$data["news"]["title"] = $news["news"];
			$data["news"]["text"] = $news["text"];

			foreach($data["classify"]["data"] as $v){
				if($v["id"] == $product["classify"]){
					$data["news"]["classify"] = $v["name"];
				}
			}

			$title = "title";
		}else{
			$data["news"]["title"] = $news["en_title"];
			$data["news"]["text"] = $news["en_text"];

			foreach($data["classify"]["data"] as $v){
				if($v["id"] == $news["classify"]){
					$data["news"]["classify"] = $v["title"];
				}
			}

			$title = "en_title";
		}

		$data["news"]["time"] = date("Y-m-d H:i:s", $news["time"]);

		$sql = "SELECT id,{$title} as `title`,`time` FROM news WHERE classify={$news["classify"]} AND id<>{$id} ORDER BY id DESC LIMIT 5";
		$data["related"] = $this->db->query($sql)->result_array();



		$this->load->view("news/news_detail", $data);
	}

	public function honor(){
		$data["info"] = [
			"title" => CONFIG($this->LAN)["title_5"],
			"keywords" => "荣誉资质," . $this->SITE["keywords"],
			"description" => "荣誉资质," . $this->SITE["description"],
		];

		if($this->LAN == "cn"){
			$text = "text";
		}else{
			$text = "en_text";
		}

		$sql = "SELECT `{$text}` as `text` FROM `page` WHERE `page`='honor'";
		$data["info"]["text"] = $this->db->query($sql)->row_array()["text"];

		$this->load->view("other/honor", $data);
	}

	public function message(){
		$data["info"] = [
			"title" => CONFIG($this->LAN)["title_6"],
			"keywords" => "在线留言," . $this->SITE["keywords"],
			"description" => "在线留言," . $this->SITE["description"],
		];

		$this->load->view("other/message", $data);
	}

	public function contact(){
		$data["info"] = [
			"title" => CONFIG($this->LAN)["title_7"],
			"keywords" => "联系我们," . $this->SITE["keywords"],
			"description" => "联系我们," . $this->SITE["description"],
		];

		$this->load->view("other/contact", $data);
	}

	public function search(){
		$this->load->view("other/search");
	}

	public function language($item){
		if(!in_array($item, ["cn", "en"])){
			$item = "cn";
		}

		setcookie('LAN', $item, time() + 86400, '/');
		
		echo "success";
	}

	public function rev_msg(){
		SESSION_START();
		$name = htmlspecialchars(trim($this->input->post("name")), ENT_QUOTES);
		$tel = htmlspecialchars(trim($this->input->post("tel")), ENT_QUOTES);
		$email = htmlspecialchars(trim($this->input->post("email")), ENT_QUOTES);
		$content = htmlspecialchars(trim($this->input->post("content")), ENT_QUOTES);
		$vcode = htmlspecialchars(strtoupper(trim($this->input->post("vcode"))), ENT_QUOTES);
		$data["status"] = 1;
		$data["msg"] = "";

		if(!isset($_SESSION["code"])){
			$data["status"] = 0;
			$data["msg"] = "非法提交！";
		}else{
			if(time() - $_SESSION["code"]["time"] > 5 * 60){
				$data["status"] = 0;
				$data["msg"] = "验证码已过期，请刷新验证码后重试！";
			}else{
				if($_SESSION["code"]["word"] != $vcode){
					$data["status"] = 0;
					$data["msg"] = "验证码错误，请重新输入！";
				}
			}
		}

		$preg_tel = "/^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(16[0-9]{1})|(17[0-9]{1})|(18[0-9]{1})|(19[0-9]{1}))+\d{8})$/";
		if(!$tel || !preg_match($preg_tel, $tel)){
			$data["status"] = 0;
			$data["msg"] = "手机号格式不正确，请重新输入！";
		}

		$preg_email='/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/';
		if(!$email || !preg_match($preg_email,$email)){
			$data["status"] = 0;
			$data["msg"] = "邮箱格式不正确，请重新输入！";
		}

		if($data["status"] == 0){
			echo json_encode($data);
			exit;
		}

		$ip = get_client_ip();
		$time = time();

		$sql = "INSERT INTO contact (`status`,`username`,`tel`,`email`,`text`,`ip`,`time`) VALUES (1,'{$name}','{$tel}','{$email}','{$content}','{$ip}','{$time}')";
		$query = $this->db->query($sql);
		if($query){
			$data["status"] = 1;
			$data["msg"] = "";
		}else{
			$data["status"] = 0;
			$data["msg"] = "系统错误，请刷新后重试";
		}

		echo json_encode($data);
	}
}