<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>页面设置：首页 > 关于华瑞</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layui/css/admin.css" media="all">
	<style>
		.logo-upload-btn{
			margin:0 0 -18px 25px
		}
		.layui-input-inline{
			width:45%!important
		}
	</style>
</head>
<body>
	<div class="layui-fluid">
		<div class="layui-row layui-col-space15">
			<div class="layui-col-md12">
				<div class="layui-card">
					<div class="layui-card-header">
						页面设置：首页 > 关于华瑞
					</div>
					<div class="layui-card-body">
						<div class="layui-form">
							<form class="layui-form" action="" method="POST">
								<div class="layui-form-item layui-form-text">
									<label class="layui-form-label">中文</label>
									<div class="layui-input-inline">
										<textarea name="text" class="layui-textarea text" style="min-height:200px"><?=$info["text"]?></textarea>
									</div>
								</div>
                                <div class="layui-form-item layui-form-text">
									<label class="layui-form-label">英文</label>
									<div class="layui-input-inline">
										<textarea name="en_text" class="layui-textarea en_text" style="min-height:200px"><?=$info["en_text"]?></textarea>
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
    layer.confirm("请确认修改信息是否正确！", {
        title: "提示",
        btn: ['确定','取消'] //按钮
    },function(){
        var load_layer = layer.load(2);

        var text = $(".text").val();
        var en_text = $(".en_text").val();

        $.ajax({
            method: "POST",
            url: "/ajax/set_page",
            data:{page:"about",text:text,en_text:en_text},
            success: function(data){
                if(data == 1){
                    success_tip()
                }else{
                    error_tip("修改失败，请刷新后重试", load_layer)
                }
            },
            error: function(){
                error_tip("系统错误，请刷新后重试", load_layer)
            }
        });
    });
});

function success_tip(){
    layer.alert('修改成功', function(){
        window.location.reload()
    });
}

function error_tip(msg, elem){
    layer.close(elem)
    layer.alert(msg, function(index){
        layer.close(index);
    });
}
    
</script>
</html>