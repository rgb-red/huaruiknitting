<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');header("Content-type: text/html; charset=utf-8");

class MY_Controller extends CI_Controller {
    public $LAN = "cn";
    public $SITE;
    public $PRO;
    public $NEW;

    public function __construct(){
        parent::__construct();
        
        //加载语言包
        $this->load->config("config_language");
		
		if(isset($_COOKIE["LAN"]) && $_COOKIE["LAN"] == "en"){
			$this->LAN = "en";
        }

        if($this->LAN == "cn"){
            $id = 0;
            $title = "name";
        }else{
            $id = 1;
            $title = "title";
        }

        //网站信息
        $sql = "SELECT * FROM site_info WHERE id={$id}";
        $this->SITE = $this->db->query($sql)->row_array();

        //产品分类
        $sql = "SELECT id,{$title} as `title` FROM product_classify ORDER BY id ASC";
        $this->PRO = $this->db->query($sql)->result_array();

        //新闻分类
        $sql = "SELECT id,{$title} as `title` FROM news_classify ORDER BY id ASC";
        $this->NEW = $this->db->query($sql)->result_array();
    }
}

class ADMIN_Controller extends CI_Controller {
    public $SITE;
    public $EN_SITE;
    
	public function __construct (){
        parent::__construct();

        //网站基本信息
        $sql = "SELECT * FROM site_info";
        $this->SITE = $this->db->query($sql)->result_array()[0];
        $this->EN_SITE = $this->db->query($sql)->result_array()[1];
	}
}