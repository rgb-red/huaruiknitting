<?php
//分页类。liujianliang
class my_page{
	private $total_count;
	private $page_size;
	private $page_count;
	private $request_page;
	private $page_num_interval=5;
	private $page_show_from_index;
	private $page_show_to_index;
	private $current_url;
	private $query_str;
	private $type;
	//$type=1、标准；2、ajax
	function __construct($total_count,$page_size=null,$type=1){
		if($page_size){
			$this->page_size=$page_size;
		}else{
			$this->page_size=10;
		}
		$this->type=$type;
		$this->total_count=$total_count;
		$this->page_count=ceil($this->total_count/$this->page_size);
		//$this->current_url=$_SERVER['REQUEST_URI'];
		$this->current_url=preg_replace('/\?.+/i','',$_SERVER['REQUEST_URI']);
		
		if(isset($_SERVER['QUERY_STRING'])){
			$this->query_str=preg_replace('/page=\d+/i','',$_SERVER['QUERY_STRING']);
		}

		if($this->query_str){
			$this->query_str='&'.$this->query_str;
			$this->query_str=preg_replace('/&{2}/i','&',$this->query_str);
		}
		if(isset($_GET['page'])){
			$this->request_page=$_GET['page'];
		}else{
			$this->request_page=1;
		}
	}
	
	function get_from_index(){
		return ($this->request_page-1)*$this->page_size;
	}
	
	function get_page_size(){
		return $this->page_size;
	}
	
	//$style=1 标准，$style=2，无中间页码，只有上下页
	function get_page_str($style=1){
		if($this->total_count==0){
			return '';
		}
		$html='';
		switch($style){
			case 1:
				$html.="<ul class='pagination pull-right'>";
				break;
			case 2:
				$html.="<div class='page_box fr'><span class='stat_num'>共<strong>".$this->total_count."</strong>件商品</span><span class='page_num'><strong>".$this->request_page."/".$this->page_count."</strong></span>";
				break;
		}
		
		//header("content-type:text/html;charset=utf-8");
		/*if($this->request_page==1 && $this->page_count>1){
			$html.="首页&nbsp;&nbsp;&nbsp;&nbsp;";
		}elseif($this->request_page!=1 && $this->page_count>1){
			$html.="<a href='".$this->current_url."?page=1".$this->query_str."'>首页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
		}*/
		if($this->request_page-1>0){
			switch($this->type){
				case 1:
					switch($style){
						case 1:
							$html.="<li><a href='".$this->current_url."?page=".($this->request_page-1).$this->query_str."'><i class='triangle_prev'></i>上一页</a></li>";
							break;
						case 2:
							$html.="<a href='".$this->current_url."?page=".($this->request_page-1).$this->query_str."'><i class='triangle_prev'></i>上一页</a>";
							break;
					}
					
					break;
				case 2:
					$html.="<li><a href='javascript:load_page(".($this->request_page-1).");'><i class='triangle_prev'></i>上一页</a></li>";
			}
		}else{
			switch($style){
				case 1:
					$html.="<li><a href='javascript:void(0);'><i class='triangle_prev'></i>上一页</a></li>";
					break;
				case 2:
					$html.="<a href='javascript:void(0);'><i class='triangle_prev'></i>上一页</a>";
			}
		}
		
		if($style==1){
			if($this->request_page-$this->page_num_interval<=0 && $this->page_count-$this->page_num_interval>$this->request_page){
				$this->page_show_from_index=1;
				$this->page_show_to_index=$this->request_page+$this->page_num_interval;
			}elseif($this->request_page-$this->page_num_interval<=0 && $this->page_count-$this->page_num_interval<=$this->request_page){
				$this->page_show_from_index=1;
				$this->page_show_to_index=$this->page_count;
			}elseif($this->request_page-$this->page_num_interval>0 && $this->page_count-$this->page_num_interval>$this->request_page){
				$this->page_show_from_index=$this->request_page-$this->page_num_interval;
				$this->page_show_to_index=$this->request_page+$this->page_num_interval;
			}elseif($this->request_page-$this->page_num_interval>0 && $this->page_count-$this->page_num_interval<=$this->request_page){
				$this->page_show_from_index=$this->request_page-$this->page_num_interval;
				$this->page_show_to_index=$this->page_count;
			}
			
			for($i=$this->page_show_from_index;$i<=$this->page_show_to_index;$i++){
				if($this->request_page==$i){
					$html.="<li><a class='now_page'>".$i."</a></li>";
				}else{
					switch($this->type){
						case 1:
							$html.="<li><a href='".$this->current_url."?page=".$i.$this->query_str."'>".$i.'</a></li>';
							break;
						case 2:
							$html.="<li><a href='javascript:load_page(".$i.");'>".$i.'</a></li>';
					}
				}
			}
		}
		
		/*
		if($this->request_page==$this->page_count && $this->page_count>1){
			$html.="&nbsp;&nbsp;尾页</a>";
		}elseif($this->request_page!=$this->page_count && $this->page_count>1){
			$html.="&nbsp;&nbsp;<a href='".$this->current_url."?page=".$this->page_count.$this->query_str."'>尾页</a>";
		}*/
		if($this->request_page==$this->page_count){
			switch($style){
				case 1:
					$html.="<li><a href='javascript:void(0);' class='next'>下一页<i class='triangle_next'></i></a></li></ul></div>";
					break;
				case 2:
					$html.="<a href='javascript:void(0);'>下一页<i class='triangle_next'></i></a></div>";
			}
		}else{
			switch($this->type){
				case 1:
					switch($style){
						case 1:
							$html.="<li><a href='".$this->current_url."?page=".($this->request_page+1).$this->query_str."' class='next'>下一页<i class='triangle_next'></i></a></li></ul>";
							break;
						case 2:
							$html.="<a href='".$this->current_url."?page=".($this->request_page+1).$this->query_str."'>下一页<i class='triangle_next'></i></a></div>";
							break;
					}
					break;
				case 2:
					$html.="<li><a href='javascript:load_page(".($this->request_page+1).");' class='next'>下一页<i class='triangle_next'></i></a></li></ul></div>";
			}
		}
		return $html;
	}
}
?>