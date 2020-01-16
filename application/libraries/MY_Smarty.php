<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPDIR.'libraries/smarty/Smarty.class.php');
class MY_Smarty extends Smarty {
	
	static private $instance = null;	
  	
    public  function __construct()
    {
        parent::__construct();
        self::init();
    }
    
    private function init()
    {
    	$this->left_delimiter       = '{{';
		$this->right_delimiter      = '}}';
		$this->template_dir     	= APPDIR.'views/';
		$this->compile_dir          = APPDIR.'views_c/';
		$this->cache_dir            = APPDIR.'cache/';
		$this->caching              = false;
		//$this->debugging          = false;
		//$this->error_reporting    = E_ALL & ~E_NOTICE;
    }
    
    /**
     * 获取唯一smarty实例
     * @return MySmarty
     */
    static public function &get_instance()
    {
        if (!(self::$instance instanceof  MY_Smarty)) {
            self::$instance = new MY_Smarty();
        }
        return self::$instance;
    }
	
}

/* End of file MY_Smarty.php */
/* Location: ./application/libraries/MY_Smarty.php */