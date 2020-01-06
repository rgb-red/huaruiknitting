<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');header("Content-type: text/html; charset=utf-8");

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