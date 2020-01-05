<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
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