<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');header("Content-type: text/html; charset=utf-8");

class ADMIN_Controller extends CI_Controller {
    public $SITE;
    
	public function __construct (){
        parent::__construct();

        //网站基本信息
        $sql = "SELECT * FROM site_info WHERE id=0";
        $this->SITE = $this->db->query($sql)->row_array();
	}
}