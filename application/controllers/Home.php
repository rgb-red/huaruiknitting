<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public $LAN = "cn";
	public function __construct(){
		parent::__construct();

		//跳转后台
		if(explode(".", $_SERVER['SERVER_NAME'])[0] == "admin"){
			$this->load->helper("url");
			$url = is_https() ? "https://" : "http://";
			$url .= $_SERVER['SERVER_NAME'] . '/admin';
			redirect($url, 'refresh');
		}

		//加载语言包
		$this->load->config("config_language");
		if(isset($_COOKIE["LAN"]) && $_COOKIE["LAN"] == "en"){
			$this->LAN = "en";
		}
	}

	public function index(){
		$this->load->view("index");
	}

	public function profile(){
		$data["info"] = [
			"title" => CONFIG($this->LAN)["title_2_1"],
			"keywords" => "公司简介,内衣超薄面料,内衣提花面料,内衣网布,睡衣,功能性面料",
			"description" => "公司简介,博罗县华瑞针织实业有限公司,　　博罗县华瑞针织实业有限公司创办于1995年，前身是汕头市金晨织造有限公司，公司一贯以竭诚服务，努力为用户创造价值为宗旨，凭借出色的品种和可靠的产品质量立足市场，至今已发展成一家，具有一定规模的大型企业！公司占地面积40000多平方米，整体规划计划可靠兼容多种功能！现如今更创立了惠州市佳炜印花厂有限公司，在原先丰富的染整基础上继续不断发展。　　公司拥有先进的德国卡尔耶经编、得乐纬编机、电脑提花、亚矶的染缸、立兴经轴缸、气流缸、巨新印花机、台湾青山水洗机，及",
			"page" => "profile",
			"sort" => 1,
		];
		$this->load->view("about/index", $data);
	}

	public function ceo_speech(){
		$data["info"] = [
			"title" => CONFIG($this->LAN)["title_2_2"],
			"keywords" => "总经理致辞,内衣超薄面料,内衣提花面料,内衣网布,睡衣,功能性面料",
			"description" => "总经理致辞,博罗县华瑞针织实业有限公司,　　作为公司的一员，我非常高兴和大家一起度过美好的工作时光。　　华瑞是一个富有激情和理想的团队，充满着追求创新的进取精神，在中国染整行业的发展道路上，华瑞扮演着极其重要的角色。　　&ldquo用心感悟 持续创新&rdquo，公司积极开创染整技术应用的创新，充分拓展企业生存空间。坚持企业的核心理念：追求卓越品质、努力打造完善的快速染整营销网络！公司未来广阔的发展空间是职员最好的施展舞台。　　公司致力于培养有共同价值观和企业文化的专业团队。吸引了一批懂经营、善",
			"page" => "ceo_speech",
			"sort" => 2,
		];
		$this->load->view("about/index", $data);
	}

	public function culture(){
		$data["info"] = [
			"title" => CONFIG($this->LAN)["title_2_3"],
			"keywords" => "企业文化,内衣超薄面料,内衣提花面料,内衣网布,睡衣,功能性面料",
			"description" => "企业文化,博罗县华瑞针织实业有限公司,资料整理中...",
			"page" => "culture",
			"sort" => 3,
		];
		$this->load->view("about/index", $data);
	}

	public function facility(){
		$data["info"] = [
			"title" => CONFIG($this->LAN)["title_2_4"],
			"keywords" => "厂房设备,内衣超薄面料,内衣提花面料,内衣网布,睡衣,功能性面料",
			"description" => "厂房设备,博罗县华瑞针织实业有限公司,　　博罗县华瑞针织实业有限公司创办于1995年，前身是汕头市金晨织造有限公司，公司一贯以竭诚服务，努力为用户创造价值为宗旨，凭借出色的品种和可靠的产品质量立足市场，至今已发展成一家，具有一定规模的大型企业！公司占地面积40000多平方米，整体规划计划可靠兼容多种功能！现如今更创立了惠州市佳炜印花厂有限公司，在原先丰富的染整基础上继续不断发展。　　公司拥有先进的德国卡尔耶经编、得乐纬编机、电脑提花、亚矶的染缸、立兴经轴缸、气流缸、巨新印花机、台湾青山水洗机，及",
			"page" => "facility",
			"sort" => 4,
		];
		$this->load->view("about/index", $data);
	}

	public function products(){
		$data["info"] = [
			"page_num" => 1,
			"keywords" => "产品列表,内衣超薄面料,内衣提花面料,内衣网布,睡衣,功能性面料",
			"description" => "产品列表,内衣超薄面料,内衣提花面料,内衣网布,睡衣,功能性面料",
			"sort" => 1,
		];
		$this->load->view("product/index", $data);
	}

	public function product_info(){
		$data["info"] = [
			"sort" => 1,
		];
		$this->load->view("product/product_info", $data);
	}

	public function news(){
		$this->load->view("news/index");
	}

	public function news_detail(){
		$this->load->view("news/news_detail");
	}

	public function honor(){
		$this->load->view("other/honor");
	}

	public function message(){
		$this->load->view("other/message");
	}

	public function contact(){
		$this->load->view("other/contact");
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
}