<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=CONFIG($this->LAN)["title_6"]?> - <?=$this->SITE["sitename"]?></title>
    <meta name="keywords" content="<?=$info["keywords"]?>" />
    <meta name="description" content="<?=$info["description"]?>" />
    <meta name="applicable-device" content="pc,mobile" />
    <link href="/css/bootstrap.css" rel="stylesheet" />
    <link href="/css/bxslider.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bxslider.min.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/bootstrap.js"></script>
</head>
<body>
    <?php $this->load->view("layout/header", ["page" => 5])?>
    <div class="page_bg" style="background: url(/images/detail_bg.jpg) center top no-repeat;"></div>
    <div class="bread_bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="bread_nav">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <a href='/'><?=CONFIG($this->LAN)["home"]?></a> > 
                        <a href='javascript:;'><?=CONFIG($this->LAN)["title_6"]?></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- left -->
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h3 class="left_h3">
                    <span><?=CONFIG($this->LAN)["title_6"]?></span>
                </h3>
                <div class="left_column">
                    <ul class="left_nav_ul" id="firstpane">
                        <li><a href="javascript:;" class="biglink left_active"><?=CONFIG($this->LAN)["title_6"]?></a></li>
                    </ul>
                </div>
                <?php $this->load->view("layout/news_sidebar")?>
            </div>
            <!-- right -->
            <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
                <div class="right_head">
                    <h2><span><?=CONFIG($this->LAN)["title_6"]?></span></h2>
                </div>
                <div class="right_contents">
                    <div class="met-feedback-body">
                        <form action="#" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <div><input name="name" id="name" class="form-control" type="text" placeholder="<?=CONFIG($this->LAN)["message_name"]?>"></div>
                            </div>
                            <div class="form-group">
                                <div><input name="tel" id="tel" class="form-control" type="text" placeholder="<?=CONFIG($this->LAN)["message_tel"]?>"></div>
                            </div>
                            <div class="form-group">
                                <div><input name="email" id="email" class="form-control" type="text" placeholder="<?=CONFIG($this->LAN)["message_email"]?>"></div>
                            </div>
                            <div class="form-group">
                                <div><textarea name="content" id="content" class="form-control" placeholder="<?=CONFIG($this->LAN)["message_text"]?>" rows="5"></textarea></div>
                            </div>
                            <div class="form-group col-xs-9 col-sm-9 col-md-9">
                                <div><input name="vcode" id="vcode" class="form-control" type="text" placeholder="<?=CONFIG($this->LAN)["message_verify"]?>"></div>
                            </div>
                            <div class="form-group col-xs-3 col-sm-3 col-md-3">
                                <div class="verify_code" style="text-align:center"></div>
                            </div>
                            <div class="form-group margin-bottom-0">
                                <input type="button" class="btn btn-primary btn-lg btn-block btn-squared" value="<?=CONFIG($this->LAN)["submit"]?>" id="tj">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("layout/footer")?>
</body>
<script src="/layer/layer.js"></script>
<script>

verify_code();

$(".verify_code").click(function(){
    verify_code();
});

$('#tj').click(function() {
    var name = $('#name').val();
    var tel = $('#tel').val();
    var email = $('#email').val();
    var content = $('#content').val();
    var vcode = $("#vcode").val();

    if (name == '') {
        layer.alert('请输入您的姓名！',function(index){
            layer.close(index);
            $("#name").focus();
        });
        return false;
    }
    if (tel == "") {
        layer.alert('请输入你的手机！',function(index){
            layer.close(index);
            $("#tel").focus();
        });
        return false;
    }
    if (!tel.match(/^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(16[0-9]{1})|(17[0-9]{1})|(18[0-9]{1})|(19[0-9]{1}))+\d{8})$/)) {
        layer.alert('手机号码格式不正确！',function(index){
            layer.close(index);
            $("#tel").focus();
        });
        return false;
    }
    if (email == "") {
        layer.alert('请输入电子邮箱！',function(index){
            layer.close(index);
            $("#email").focus();
        });
        return false;
    }
    if (!email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)) {
        layer.alert('电子邮箱格式不正确！',function(index){
            layer.close(index);
            $("#email").focus();
        });
        return false;
    }
    if (content == '') {
        layer.alert('请输入留言内容！',function(index){
            layer.close(index);
            $("#content").focus();
        });
        return false;
    }
    if (vcode == '') {
        layer.alert('请输入验证码！',function(index){
            layer.close(index);
            $("#code").focus();
        });
        return false;
    }

    $.ajax({
        method: "POST",
        url: "/home/rev_msg",
        dataType: 'json',
        data:{name:name,tel:tel,email:email,content:content,vcode:vcode},
        success: function(data){
            if(data.status == 1){
                layer.alert('提交成功，您的留言将在7个工作日内得到回复。',function(){
                    name = $('#name').val("");
                    tel = $('#tel').val("");
                    email = $('#email').val("");
                    content = $('#content').val("");
                    vcode = $("#vcode").val("");
                    window.location.reload("");
                });
            }else{
                layer.alert(data.msg)
            }
        },
        error: function(){
            layer.alert("系统错误，请刷新后重试！")
        }
    });
});

function verify_code(){
    $.ajax({
        method: "POST",
        url: "/login/get_verify_code",
        success: function(data){
            $(".verify_code").html(data)
        },
    });
}
</script>
</html>