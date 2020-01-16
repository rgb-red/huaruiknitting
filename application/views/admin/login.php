<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>登入 - <?=$this->SITE["sitename"]?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layui/css/admin.css" media="all">
    <link rel="stylesheet" href="/layui/css/login.css" media="all">
    <link id="layuicss-layer" rel="stylesheet" href="/layui/css/layer.css" media="all">
    <script src="/js/jquery.min.js"></script>
</head>
<body layadmin-themealias="dark-blue">
<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login">
    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2><?=$this->SITE["sitename"]?> 后台管理系统</h2>
        </div>
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                <input type="text" name="username" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
            </div>
            <div class="layui-form-item">
                <div class="layui-row">
                    <div class="layui-col-xs7">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                        <input type="text" name="vercode" id="LAY-user-login-vercode" lay-verify="required" placeholder="验证码" class="layui-input">
                    </div>
                    <div class="layui-col-xs5">
                        <div class="verifyCode" style="text-align:center;margin-top:5px" onClick="loadVerifyCode()"></div>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="LAY-user-login-submit" onClick="login()">登 入</button>
            </div>
        </div>
    </div>
    <div class="layui-trans layadmin-user-login-footer">
        <p>
            © 1995 - <?=date("Y", time());?>
            <a href="<?=$this->SITE["front_url"]?>" target="_blank"><?=$this->SITE["sitename"]?> 后台管理系统</a>
            <a href="https://hscnote.com" target="_blank">Hsc(qq:390798960)版权所有</a>
        </p>
    </div>
</div>
<script src="/layui/js/layui.js"></script>
<script src="/layui/js/modules/layer.js"></script>
<script>
$(function(){
    loadVerifyCode();
});

function loadVerifyCode(){
    $.get("/login/get_verify_code", function(code_img){
        $(".verifyCode").html(code_img)
    });
}

function trim(s){
    return s.replace(/^\s*/,"").replace(/\s*$/,"");
}

function login(){
    var username = trim($("#LAY-user-login-username").val());
    var password = trim($("#LAY-user-login-password").val());
    var code = trim($("#LAY-user-login-vercode").val());
    var status = 1;
    var msg = "";

    if(username == ""){
        status = 0;
        msg = "用户名不能为空";
    }
    else if(password == ""){
        status = 0;
        msg = "密码不能为空";
    }
    else if(code == ""){
        status = 0;
        msg = "验证码不能为空";
    }

    if(status == 0){
        layer.msg(msg, {icon:5});
    }
    else{
        $.ajax({
            method: 'POST',
            url: "/login/login_post",
            dataType: 'json',
            data: {username:username,password:password,code:code},
            success: function (r) {
                if(r.status == 0){
                    layer.msg(r.msg, {icon:5});
                }else{
                    window.location.href="/admin";
                }
            }
        });
    }
}
</script>
</body>
</html>