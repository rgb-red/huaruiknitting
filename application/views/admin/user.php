<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人中心</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layui/css/admin.css" media="all">
	<style>
		.logo-upload-btn{
			margin:0 0 -18px 25px
		}
	</style>
</head>
<body>
	<div class="layui-fluid">
		<div class="layui-row layui-col-space15">
			<div class="layui-col-md12">
				<div class="layui-card">
					<div class="layui-card-header">
                        个人中心
					</div>
					<div class="layui-card-body">
						<div class="layui-form">
							<form class="info_form">
								<div class="layui-form-item">
									<label class="layui-form-label">用户名</label>
									<div class="layui-input-inline">
										<input type="text" name="username" value="" class="layui-input username">
									</div>
								</div>
                                <div class="layui-form-item">
									<label class="layui-form-label">密码</label>
									<div class="layui-input-inline">
										<input type="password" name="password" value="" class="layui-input password">
									</div>
								</div>
                                <div class="layui-form-item">
									<label class="layui-form-label">重复密码</label>
									<div class="layui-input-inline">
										<input type="password" name="repassword" value="" class="layui-input repassword">
									</div>
								</div>
                                <div class="layui-form-item">
									<div class="layui-input-block">
										<button type="button" class="layui-btn submit-btn">确认保存</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/layui/js/modules/layer.js"></script>
<script>
$(".submit-btn").click(function(){
	var username = $(".username").val();
	var password = $(".password").val();
	var repassword = $(".repassword").val();

	if(!username && !password){
		layer.alert("请填写新用户名或新密码！");
		return
	}

    layer.confirm("用户名或密码修改后需要重新登陆！", {
        title: "提示",
        btn: ['确定','取消'] //按钮
    },function(){
        var load_layer = layer.load(2);

        $.ajax({
            method: "POST",
            url: "/ajax/set_user",
            data:{username:username,password:password,repassword:repassword},
            success: function(data){
                if(data != 1){
					layer.alert(data,function(index){layer.close(load_layer);layer.close(index)});
				}else{
					layer.alert("修改成功，请重新登陆！",function(){parent.location.reload();});
				}
            },
            error: function(){
				layer.alert("系统错误，请刷新后重试", function(index){layer.close(load_layer);layer.close(index)});
            }
        });
        
    });
});
</script>
</html>