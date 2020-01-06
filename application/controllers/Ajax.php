<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->config("config_language");
    }
    public function upload_logo(){
        $logo = $_FILES["logo"];

        $logo_name_break = explode(".", $logo["name"]);
        $logo_tmp =  $logo_name_break[count($logo_name_break) - 1];
        $logo_save_path = $this->config->item("site_path") . "webroot/images/logo." . $logo_tmp;

        $logo_obj = $logo["tmp_name"];
        if(move_uploaded_file($logo_obj, $logo_save_path)){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function set_info(){
        $data = $this->input->post("data");
        $lan = $this->input->post("lan");
        $data = json_decode($data);

        $item = "";
        $index = 0;
        foreach($data as $k => $v){
            if($index == 0){
                $index = 1;
                $item .= "`" . $k . "`" . "='".$v."'";
            }else{
                $item .= ",`" . $k . "`" . "='".$v."'";
            }
        }

        $sql = "UPDATE site_info SET {$item} WHERE id={$lan}";
        $query = $this->db->query($sql);
        if($query){
            echo 1;
        }else{
            echo 0;
        }
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