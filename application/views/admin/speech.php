<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>页面设置：关于华瑞 > 总经理致辞</title>
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
                        页面设置：关于华瑞 > 总经理致辞
					</div>
					<div class="layui-card-body">
						<div class="layui-form">
                            <form class="layui-form" action="" method="POST">
                                <div class="layui-form-item">
									<label class="layui-form-label">中文</label>
									<div class="layui-col-md9">
										<textarea id="text" style="display: none;"><?=$info["text"]?></textarea>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">英文</label>
									<div class="layui-col-md9">
										<textarea id="en_text" style="display: none;"><?=$info["en_text"]?></textarea>
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
<script src="/layui/js/layui.js"></script>
<script src="/layui/js/modules/layer2.js"></script>
<script src="/layui/js/modules/layedit.js"></script>
<script>
//初始化编辑器
layui.use('layedit', function(){
    layedit = layui.layedit;

    layedit.set({uploadImage: {url: '/ajax/page_upload_image'}});

    textarea = layedit.build('text', {
        height: 480,
        tool: ['strong', 'italic', 'underline', 'del', '|', 'left', 'center', 'right', 'link', 'unlink', 'image']
    });

    en_textarea = layedit.build('en_text', {
        height: 480,
        tool: ['strong', 'italic', 'underline', 'del', '|', 'left', 'center', 'right', 'link', 'unlink', 'image']
    });
});

$(".submit-btn").click(function(){
    layer.confirm("请确认修改信息是否正确！", {
        title: "提示",
        btn: ['确定','取消'] //按钮
    },function(){
        var load_layer = layer.load(2);

        var text = layedit.getContent(textarea)
		var en_text = layedit.getContent(en_textarea)

        $.ajax({
            method: "POST",
            url: "/ajax/set_page",
            data:{page:"speech",text:text,en_text:en_text},
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