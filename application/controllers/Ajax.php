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
            $sql = "INSERT INTO product (`number`,`title`,`classify`,`hot`,`brief`,`text`,`cover`,`status`,`push`) VALUES ('','','','','','',0,0,1)";
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
        $data["brief"] = htmlspecialchars($this->input->post("brief"), ENT_QUOTES);
        $data["en_brief"] = htmlspecialchars($this->input->post("en_brief"), ENT_QUOTES);
        $data["text"] = htmlspecialchars($this->input->post("textarea_html"), ENT_QUOTES);
        $data["en_text"] = htmlspecialchars($this->input->post("en_textarea_html"), ENT_QUOTES);
        $data["status"] = $this->input->post("status");
        $textarea_text = htmlspecialchars($this->input->post("textarea_text"), ENT_QUOTES);
        $en_textarea_text = htmlspecialchars($this->input->post("en_textarea_text"), ENT_QUOTES);
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

    //产品列表
    public function product_list(){
        $id = $this->input->get("id");
		$number = $this->input->get("number");
		$title = $this->input->get("title");
		$classify = $this->input->get("classify");
        $time = $this->input->get("time");
        $status = $this->input->get("status");
        $push = $this->input->get("push");
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

        if($push){
			$item .= " AND `push`={$push}";
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

        $item_start = ($page - 1) * $limit;
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS `id`,`number`,`title`,`cover`,`classify`,`status`,`push`,`time` FROM product WHERE {$item} {$order_s} {$by_s} LIMIT {$item_start},{$limit}";
        $data = $this->db->query($sql)->result_array();
        $num = $this->db->select('found_rows() as nums')->get()->row_array()["nums"];

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
        $res["count"] = $num;

        foreach($data as $k => $v){
            $res["data"][$k] = [
                "id" => $v["id"],
                "number" => $v["number"],
                "title" => $v["title"],
                
                "en_title" => $v["title"],
                "status" => $v["status"],
                "time" => date("Y-m-d H:i:s", $v["time"]),
                "classify" => $cf[$v["classify"]],
                "push" => $v["push"]
            ];

            if($v["cover"]){
                $res["data"][$k]["cover"] = $front_url . "/uploads/cover/" . $v["id"] . ".jpg";
            }else{
                $res["data"][$k]["cover"] = "";
            }
        }

        echo json_encode($res);
    }

    //删除产品
    public function del_product(){
        $id = $this->input->post("id");
        $sql = "DELETE FROM product WHERE id={$id}";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //添加推送
    public function add_push(){
        $id = $this->input->post("id");

        //检查已推送个数
        $sql = "SELECT id FROM product WHERE push=2";
        $push = $this->db->query($sql)->result_array();
        if(count($push) >= 6){
            echo 2;
            exit;
        }

        $sql = "UPDATE product SET `push`=2 WHERE id={$id}";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //取消推送
    public function del_push(){
        $id = $this->input->post("id");

        $sql = "UPDATE product SET `push`=1 WHERE id={$id}";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //新闻编辑器图片上传
    public function news_upload_image(){ 
        //获取前台url
        $sql = "SELECT front_url FROM site_info WHERE id=0";
        $front_url = $this->db->query($sql)->row_array()["front_url"];
        
        //图片临时保存位置
        $images = $_FILES["file"];
        $name_break = explode(".", $images["name"]);
        $tmp =  $name_break[count($name_break) - 1];
        $save_name = date("Y-m-d") . "-" . md5(time() . cteateSalt() . cteateSalt()) . "." . $tmp;
        $save_path = $this->config->item("site_path") . "webroot/uploads/news/" . $save_name;
        
        //保存图片，返回信息
        $img_obj = $images["tmp_name"];
        if(move_uploaded_file($img_obj, $save_path)){
            $data = [
                "code" => 0,
                "msg" => "success",
                "data" => [
                    "src" => $front_url . "/uploads/news/" . $save_name,
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
    public function save_news(){
        $id = $this->input->post("id");
        if(!$id){
            //插入空白行，创建产品ID
            $sql = "INSERT INTO news (`title`,`classify`,`hot`,`brief`,`text`,`cover`,`status`) VALUES ('','','','','',0,0)";
            $ins = $this->db->query($sql);
            if(!$ins){
                return 0;
            }

            //获取产品ID
            $sql = "SELECT id FROM news ORDER BY id DESC LIMIT 1";
            $id = $this->db->query($sql)->row_array()["id"];
        }

        //若有上传产品封面，保存封面
        if($_FILES){
            $cover = $_FILES["cover"];
            $name_break = explode(".", $cover["name"]);
            $tmp =  $name_break[count($name_break) - 1];
            $save_path = $this->config->item("site_path") . "webroot/uploads/p_cover/" . $id . "." . $tmp;
            $cover_obj = $cover["tmp_name"];
            if(!move_uploaded_file($cover_obj, $save_path)){
                echo 0;
                exit;
            }
            $data["cover"] = 1;
        }

        //接受其他参数
        $data["title"] = htmlspecialchars($this->input->post("title"), ENT_QUOTES);
        $data["en_title"] = htmlspecialchars($this->input->post("en_title"), ENT_QUOTES);
        $data["classify"] = $this->input->post("product_classify");
        $data["brief"] = htmlspecialchars($this->input->post("brief"), ENT_QUOTES);
        $data["en_brief"] = htmlspecialchars($this->input->post("en_brief"), ENT_QUOTES);
        $data["text"] = htmlspecialchars($this->input->post("textarea_html"), ENT_QUOTES);
        $data["en_text"] = htmlspecialchars($this->input->post("en_textarea_html"), ENT_QUOTES);
        $data["status"] = $this->input->post("status");
        $textarea_text = htmlspecialchars($this->input->post("textarea_text"), ENT_QUOTES);
        $en_textarea_text = htmlspecialchars($this->input->post("en_textarea_text"), ENT_QUOTES);
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
        $sql = "UPDATE news SET {$item} WHERE id={$id}";
        $query = $this->db->query($sql);
        if($query){
            echo $id;
        }else{
            echo 0;
        }
    }

    //新闻列表
    public function news_list(){
        $id = $this->input->get("id");
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

        $item_start = ($page - 1) * $limit;
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS `id`,`title`,`cover`,`classify`,`status`,`time` FROM news WHERE {$item} {$order_s} {$by_s} LIMIT {$item_start},{$limit}";
        $data = $this->db->query($sql)->result_array();
        $num = $this->db->select('found_rows() as nums')->get()->row_array()["nums"];

        //产品分类
		$sql = "SELECT id,`name`,`title` FROM news_classify ORDER BY id ASC";
        $classify = $this->db->query($sql)->result_array();
        foreach($classify as $v){
            $cf[$v["id"]] = $v["name"];
        }

        //前端URL
		$sql = "SELECT front_url FROM site_info WHERE id=0";
		$front_url = $this->db->query($sql)->row_array()["front_url"];
        
        $res["code"] = 0;
        $res["msg"] = "";
        $res["count"] = $num;

        foreach($data as $k => $v){
            $res["data"][$k] = [
                "id" => $v["id"],
                "title" => $v["title"],
                "en_title" => $v["title"],
                "status" => $v["status"],
                "time" => date("Y-m-d H:i:s", $v["time"]),
                "classify" => $cf[$v["classify"]]
            ];

            if($v["cover"]){
                $res["data"][$k]["cover"] = $front_url . "/uploads/p_cover/" . $v["id"] . ".jpg";
            }else{
                $res["data"][$k]["cover"] = "";
            }
        }

        echo json_encode($res);
    }

    public function set_page(){
        $page = $this->input->post("page");
        $data["text"] = htmlspecialchars($this->input->post("text"), ENT_QUOTES);
        $data["en_text"] = htmlspecialchars($this->input->post("en_text"), ENT_QUOTES);

        $item = sql_update_merge_item($data);

        $sql = "UPDATE `page` SET {$item} WHERE `page`='{$page}'";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //编辑器图片上传
    public function page_upload_image(){ 
        //获取前台url
        $sql = "SELECT front_url FROM site_info WHERE id=0";
        $front_url = $this->db->query($sql)->row_array()["front_url"];
        
        //图片临时保存位置
        $images = $_FILES["file"];
        $name_break = explode(".", $images["name"]);
        $tmp =  $name_break[count($name_break) - 1];
        $save_name = date("Y-m-d") . "-" . md5(time() . cteateSalt() . cteateSalt()) . "." . $tmp;
        $save_path = $this->config->item("site_path") . "webroot/uploads/page/" . $save_name;
        
        //保存图片，返回信息
        $img_obj = $images["tmp_name"];
        if(move_uploaded_file($img_obj, $save_path)){
            $data = [
                "code" => 0,
                "msg" => "success",
                "data" => [
                    "src" => $front_url . "/uploads/page/" . $save_name,
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

    //修改轮播图顺序
    public function set_factory_sort(){
        $id = (int)$this->input->post("id");
        $sort = (int)$this->input->post("sort");

        if(!check_all_num($sort)){
            echo 2;
            exit;
        }

        $sql = "UPDATE factory SET `sort`={$sort} WHERE id={$id}";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //删除轮播图
    public function del_factory(){
        $id = $this->input->post("id");
        $sql = "DELETE FROM factory WHERE id={$id}";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    //添加轮播图
    public function add_factory(){
        $img = $_FILES["img"];

        $img_name_break = explode(".", $img["name"]);
        $img_tmp =  $img_name_break[count($img_name_break) - 1];

        if($img_tmp != "jpg"){
            echo 0;
            exit;
        }

        $sql = "INSERT INTO factory (`sort`) VALUES (0)";
        $query = $this->db->query($sql);
        if(!$query){
            echo 0;
            exit;
        }

        $sql = "SELECT id FROM factory ORDER BY id DESC Limit 1";
        $id = $this->db->query($sql)->row_array()["id"];

        $img_save_path = $this->config->item("site_path") . "webroot/uploads/factory/" . $id . "." . $img_tmp;
        $img_obj = $img["tmp_name"];
        if(move_uploaded_file($img_obj, $img_save_path)){
            echo 1;
        }else{
            echo 0;
        }
    }

    //修改工厂名称
    public function set_factory_title(){
        $id = (int)$this->input->post("id");
        $type = $this->input->post("type");
        $title = htmlspecialchars($this->input->post("title"), ENT_QUOTES);

        if($type == 1){
            $item = "`title`='{$title}'";
        }else{
            $item = "`en_title`='{$title}'";
        }

        $sql = "UPDATE factory SET {$item} WHERE id={$id}";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function get_contact(){
        $msg = '{
            "code": 0
            ,"msg": ""
            ,"count": 60
            ,"data": [
                {
                    "id": 123,
                    "title": "你好新朋友，感谢使用 layuiAdmin",
                    "username": "1111",
                    "ip":"127.0.0.1",
                    "status":1,
                    "time": 1510363800000
                }, 
                {
                    "id": 111,
                    "title": "贤心发来了一段私信",
                    "username":"22222",
                    "ip":"127.0.0.1",
                    "status":2,
                    "time": 1510212370000
                }
            ]
        }';
        echo $msg;
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