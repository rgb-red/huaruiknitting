<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->config("config_language");
    }

    //logo上传
    public function upload_logo(){
        $logo = $_FILES["logo"];

        $logo_name_break = explode(".", $logo["name"]);
        $logo_tmp =  $logo_name_break[count($logo_name_break) - 1];

        if($logo_tmp != "png"){
            echo 0;
            exit;
        }

        $logo_save_path = $this->config->item("site_path") . "webroot/images/logo." . $logo_tmp;

        $logo_obj = $logo["tmp_name"];
        if(move_uploaded_file($logo_obj, $logo_save_path)){
            echo 1;
        }else{
            echo 0;
        }
    }

    //修改网站基本信息
    public function set_info(){
        $data = $this->input->post("data");
        $lan = $this->input->post("lan");
        $data = json_decode($data);

        $item = sql_update_merge_item($data);
        $sql = "UPDATE site_info SET {$item} WHERE id={$lan}";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //修改轮播图顺序
    public function set_slide_sort(){
        $id = (int)$this->input->post("id");
        $sort = (int)$this->input->post("sort");

        if(!check_all_num($sort)){
            echo 2;
            exit;
        }

        $sql = "UPDATE slide SET `sort`={$sort} WHERE id={$id}";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //修改轮播图连接
    public function set_slide_url(){
        $id = (int)$this->input->post("id");
        $url = $this->input->post("url");

        if($url == "0"){
            $url = "";
        }

        $sql = "UPDATE slide SET `url`='{$url}' WHERE id={$id}";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //删除轮播图
    public function del_slide(){
        $id = $this->input->post("id");
        $sql = "DELETE FROM slide WHERE id={$id}";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //添加轮播图
    public function add_slide(){
        $img = $_FILES["img"];

        $img_name_break = explode(".", $img["name"]);
        $img_tmp =  $img_name_break[count($img_name_break) - 1];

        if($img_tmp != "jpg"){
            echo 0;
            exit;
        }

        $sql = "INSERT INTO slide (`sort`, `url`) VALUES (0, '')";
        $query = $this->db->query($sql);
        if(!$query){
            echo 0;
            exit;
        }

        $sql = "SELECT id FROM slide ORDER BY id DESC Limit 1";
        $id = $this->db->query($sql)->row_array()["id"];

        $img_save_path = $this->config->item("site_path") . "webroot/uploads/banner/" . $id . "." . $img_tmp;
        $img_obj = $img["tmp_name"];
        if(move_uploaded_file($img_obj, $img_save_path)){
            echo 1;
        }else{
            echo 0;
        }
    }

    //修改分类信息
    public function set_product_classify(){
        $id = $this->input->post("id");
        $data["name"] = $this->input->post("name");
        $data["title"] = $this->input->post("title");
        $data["sort"] = $this->input->post("sort");
        
        $item = sql_update_merge_item($data);
        $sql = "UPDATE product_classify SET {$item} WHERE id={$id}";
        $query = $this->db->query($sql);

        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //删除分类信息
    public function del_product_classity(){
        $id = $this->input->post("id");
        
        $sql = "DELETE FROM product_classify WHERE id={$id}";
        $query = $this->db->query($sql);

        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //新增分类信息
    public function add_product_classify(){
        $name = $this->input->post("name");
        $title = $this->input->post("title");
        $sort = $this->input->post("sort");
        
        $sql = "INSERT INTO product_classify (`title`, `name`, `sort`) VALUES ('{$title}','{$name}','{$sort}')";
        $query = $this->db->query($sql);

        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //编辑器图片上传
    public function article_upload_image(){ 
        //获取前台url
        $sql = "SELECT front_url FROM site_info WHERE id=0";
        $front_url = $this->db->query($sql)->row_array()["front_url"];
        
        //图片临时保存位置
        $images = $_FILES["file"];
        $name_break = explode(".", $images["name"]);
        $tmp =  $name_break[count($name_break) - 1];
        $save_name = date("Y-m-d") . "-" . md5(time() . cteateSalt() . cteateSalt()) . "." . $tmp;
        $save_path = $this->config->item("site_path") . "webroot/uploads/product/" . $save_name;
        
        //保存图片，返回信息
        $img_obj = $images["tmp_name"];
        if(move_uploaded_file($img_obj, $save_path)){
            $data = [
                "code" => 0,
                "msg" => "success",
                "data" => [
                    "src" => $front_url . "/uploads/product/" . $save_name,
                    "title" => "",
                ],
            ];
        }else{
            $data = [
                "code" => 1,
                "msg" => "上传错误！",
            ];
        }

        echo json_encode($data);
    }

    //保存产品
    public function save_product(){
        $id = $this->input->post("id");
        if(!$id){
            //插入空白行，创建产品ID
            $sql = "INSERT INTO product (`number`,`title`,`classify`,`hot`,`brief`,`text`,`cover`,`status`) VALUES ('','','','','','',0,0)";
            $ins = $this->db->query($sql);
            if(!$ins){
                return 0;
            }

            //获取产品ID
            $sql = "SELECT id FROM product ORDER BY id DESC LIMIT 1";
            $id = $this->db->query($sql)->row_array()["id"];
        }

        //若有上传产品封面，保存封面
        if($_FILES){
            $cover = $_FILES["cover"];
            $name_break = explode(".", $cover["name"]);
            $tmp =  $name_break[count($name_break) - 1];
            $save_path = $this->config->item("site_path") . "webroot/uploads/cover/" . $id . "." . $tmp;
            $cover_obj = $cover["tmp_name"];
            if(!move_uploaded_file($cover_obj, $save_path)){
                echo 0;
                exit;
            }
            $data["cover"] = 1;
        }

        //接受其他参数
        $data["title"] = $this->input->post("title");
        $data["en_title"] = $this->input->post("en_title");
        $data["number"] = $this->input->post("number");
        $data["classify"] = $this->input->post("product_classify");
        $data["brief"] = $this->input->post("brief");
        $data["en_brief"] = $this->input->post("en_brief");
        $data["text"] = $this->input->post("textarea_html");
        $data["en_text"] = $this->input->post("en_textarea_html");
        $data["status"] = $this->input->post("status");
        $textarea_text = $this->input->post("textarea_text");
        $en_textarea_text = $this->input->post("en_textarea_text");
        $data["time"] = time();

        //处理简介
        if(!$data["brief"]){
            if(mb_strlen($textarea_text) >= 25){
                $data["brief"] = mb_substr($textarea_text, 0, 25) . "...";
            }else{
                $data["brief"] = $textarea_text;
            }
        }

        if(!$data["en_brief"]){
            if(mb_strlen($en_textarea_text) >= 50){
                $data["en_brief"] = mb_substr($en_textarea_text, 0, 50) . "...";
            }else{
                $data["en_brief"] = $en_textarea_text;
            }
        }

        //写入数据库
        $item = sql_update_merge_item($data);
        $sql = "UPDATE product SET {$item} WHERE id={$id}";
        $query = $this->db->query($sql);
        if($query){
            echo $id;
        }else{
            echo 0;
        }
    }

    public function product_list(){
        $id = $this->input->get("id");
		$number = $this->input->get("number");
		$title = $this->input->get("title");
		$classify = $this->input->get("classify");
        $time = $this->input->get("time");
        $status = $this->input->get("status");
        $order = $this->input->get("order");
        $by = $this->input->get("by");
        $page = $this->input->get("page");
        $limit = $this->input->get("limit");
        $item = "1=1";
        
        if($id){
			$item .= " AND `id`={$id}";
		}

		if($number){
			$item .= " AND `number` LIKE '%{$number}%'";
		}

		if($title){
			$item .= " AND (`title` LIKE '%{$title}%' OR `en_title` LIKE '%{$title}%')";
		}

		if($classify){
			$item .= " AND `classify`={$classify}";
		}

		if($time){
			$item .= " AND";
			$time = explode("~", $time);
			$s_time = strtotime($time[0]);
			$e_time = strtotime($time[1]);

			$item .= "`time`>={$s_time}";
			$item .= " AND `time`<={$e_time}";
        }

        if($status){
			$item .= " AND `status`={$status}";
        }
        
        $order_s = "ORDER BY id";

        if($order){
            if($order == 1){
                $order_s = "ORDER BY id";
            }
            else if($order == 2){
                $order_s = "ORDER BY time";
            }
        }

        $by_s = "DESC";

        if($by){
            if($by == 1){
                $by_s = "DESC";
            }
            else if($by == 2){
                $by_s = "ASC";
            }
        }
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS `id`,`number`,`title`,`cover`,`classify`,`status`,`time` FROM product WHERE {$item} {$order_s} {$by_s} LIMIT 10";
        $data = $this->db->query($sql)->result_array();
        $num = $this->db->select('found_rows() as nums')->get()->row_array()["nums"];
        $count = ceil($num / 10);

        //产品分类
		$sql = "SELECT id,`name`,`title` FROM product_classify ORDER BY id ASC";
        $classify = $this->db->query($sql)->result_array();
        foreach($classify as $v){
            $cf[$v["id"]] = $v["name"];
        }

        //前端URL
		$sql = "SELECT front_url FROM site_info WHERE id=0";
		$front_url = $this->db->query($sql)->row_array()["front_url"];
        
        $res["code"] = 0;
        $res["msg"] = "";
        $res["count"] = $count;

        foreach($data as $k => $v){
            $res["data"][$k] = [
                "id" => $v["id"],
                "number" => $v["number"],
                "title" => $v["title"],
                "en_title" => $v["title"],
                "status" => $v["status"],
                "time" => date("Y-m-d H:i:s", $v["time"]),
                "classify" => $cf[$v["classify"]]
            ];

            if($v["cover"]){
                $res["data"][$k]["cover"] = $front_url . "/uploads/cover/" . $v["id"] . ".jpg";
            }else{
                $res["data"][$k]["cover"] = "";
            }
        }

        echo json_encode($res);
    }







    public function shouye_product(){
        $text = '
        {
            "code": 0,
            "msg": "",
            "count": "1",
            "data": [{
              "numbers": "1",
              "keywords": "贤心是男是女",
              "show": 8520
            }]
          }
        ';
        echo $text;
    }

    public function shouye_news(){
        $text = '
        {
            "code": 0,
            "msg": "",
            "count": "1",
            "data": [{
              "numbers": "1",
              "keywords": "贤心是男是女",
              "show": 8520
            }]
          }
        ';
        echo $text;
    }
}