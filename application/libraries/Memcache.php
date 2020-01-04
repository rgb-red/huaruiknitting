<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Memcache 扩展库  0.1
|--------------------------------------------------------------------------
|
| 此文件放于system/libraries/下
|
| 使用方法:
| $this->load->library('memcache');
| $this->memcache->set('oo__pp__gg', 'I love you!');
|--------------------------------------------------------------------------
*/
if(!class_exists('Memcache'))
{
    show_error("Unable to load the requested base class: Memcache");
}

class CI_Memcache extends Memcache
{

    private $prefix_key;
    private $compress = false;
    private $expire;
    private $configs;
    private $memcache_log;
    private $filecache = false;

    public function CI_Memcache()
    {
        # 取得配置信息
		$this->CI = & get_instance();

		$config = $this->CI->config->item('memcache');
        $this->configs = $config;
        unset($config);

        # 设置key前缀
        $this->set_prefix_key($this->configs['prefix']);

        # 设置过期时间
        $this->expire = $this->configs['expire'];
        
        # 日志路径
        $this->memcache_log = APPPATH."logs/memcache.log";

        # 是否压缩存储
        $this->set_compress($this->configs['compress']);
        
        if (count($this->configs['server']) > 1) 
        {
            $this->addServer();
        }else {
            $this->connect();
        }

    }
    

    /**
     * 链接多台cache
     */
    public function addServer()
    {
        # 添加服务器端
         foreach($this->configs['server'] as $m)
        {
            $flag = parent::addServer($m['host'],$m['port']);
            if($flag===false)
            {
                log_message('error', "host为{$m['host']}",$this->memcache_log,__METHOD__);
            }
        }
    }
    

    /**
     * 链接单台cache
     */
    public function connect()
    {
        $flag = parent::connect($this->configs['server'][0]['host'],$this->configs['server'][0]['port']);
        if($flag===false)
        {
            log_message('error', "host为{$this->configs['server']['host']}",$this->memcache_log,__METHOD__);
        }
    }
    

    /**
     * 设置数据到cache
     *
     */
    public function set($key, $value, $expire='')
    {
        if($expire=='')
        {
            $expire = $this->expire;
        }
        $result = parent::set($key, $value, $this->compress, $expire);
        unset($value);
        if($result===false)
        {
            log_message('error', "key为{$key}",$this->memcache_log,__METHOD__);
            return false;
        }
        return true;
    }
    

    /**
     * 新增数据到cache
     */
    public function add($key, $value, $expire)
    {
        if($expire=='')
        {
            $expire = $this->expire;
        }
        $result = parent::add($key, $value, $this->compress, $expire);
        unset($value);
        if($result===false)
        {
            log_message('error', "key为{$key}",$this->memcache_log,__METHOD__);
            return false;
        }
        return true;
    }
    

    /**
     * 替换到cache信息
     */
    public function replace($key, $value, $expire)
    {
        if($expire=='')
        {
            $expire = $this->expire;
        }
        $result = parent::replace($key, $value,false, $expire);
        unset($value);
        if($result===false)
        {
            log_message('error', "key为{$key}",$this->memcache_log,__METHOD__);
            return false;
        }
        return true;
    }
    

    /**
     * 增加cache信息的值，$value为整型，默认为1
     */
    public function increment($key, $value=1)
    {
        $result = parent::increment($key, $value);
        if($result===false)
        {
            log_message('error', "key为{$key}",$this->memcache_log,__METHOD__);
            return false;
        }
        return true;
    }
    

    /**
     * 参数为单个key值
     */
    public function get($key)
    {
        $result = parent::get($key);
 		return $result;
    }
    

    /**
     * 参数为数组，返回也为数组
     */
    public function get_multi($arr)
    {
        $arrnew = array();
        foreach($arr as $v)
        {
            $arrnew[] = $v;
        }
        $result = parent::get($arrnew);
        return $result;
     }
     

    /**
     * 设置Key前缀
     */
    public function set_prefix_key($prefix)
    {
        $this->prefix_key = $prefix;
    }
    
    
    /**
     * 设置key、缓存并返回
     * 使用例子：$this->cache->set_key('FRONT::order_info', __METHOD__.$id);
     */
    public function set_key($mark_key, $cache_key){
    	$mark_key = $this->prefix_key.$mark_key;
    	$cache_key = $mark_key.'::'.$cache_key;
    	
   		$mark = (array) $this->get($mark_key);
    	if(! in_array($cache_key, $mark)) {
    		$mark[] = $cache_key;
    		$this->set($mark_key, $mark, $this->configs['mark_expire']);
    	}
    	
    	return $cache_key;
    }
    
    /**
     * 清除特定标识下key的所有缓存
     * 使用例子：$this->cache->flush_by_mark(array('END::user_info', 'FRONT::order_info'));
     */
    public function flush_by_mark($mark_key){
    	if(! is_array($mark_key)) 
    		$mark_key = (array) $mark_key;
    	
    	foreach ($mark_key as $key) {
    		$key = $this->prefix_key.$key;
    		$mark = $this->get($key);
    		
    		if(! empty($mark)) {
    			foreach($mark as $k) {
    				$this->delete($k);
    			}
    		}
    	}
    }
    
    
    /**
     * 删除特定key的缓存
     */
    public function delete($key)
    {
    	$result = parent::delete($key);
    	if($result===false)
    	{
    		log_message('error', "key为{$key}",$this->memcache_log,__METHOD__);
    		return false;
    	}
    	return true;
    }
    

    /**
     * 设置是否压缩
     */
    public function set_compress($compress)
    {
        $this->compress = $compress ? MEMCACHE_COMPRESSED : $compress;
    }

}

// END Memcache Class

/* End of file Memcache.php */
/* Location: ./system/libraries/Memcache.php */
