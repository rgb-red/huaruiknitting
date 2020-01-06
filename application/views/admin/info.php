<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>站点基本信息</title>
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
	<script>
		var LAN = "<?=$lan?>";
	</script>
</head>
<body>
	<div class="layui-fluid">
		<div class="layui-row layui-col-space15">
			<div class="layui-col-md12">
				<div class="layui-card">
					<div class="layui-card-header">
						站点基本信息
						<?php if($lan == 0):?>
						<button class="layui-btn layui-btn-xs layui-btn-normal" onclick="location.href='/admin/info?lan=1'">中文</button>
						<?php else:?>
							<button class="layui-btn layui-btn-xs layui-btn-danger" onclick="location.href='/admin/info'">ENGLISH</button>
						<?php endif;?>
					</div>
					<div class="layui-card-body">
						<div class="layui-form">
							<div class="layui-form-item">
								<label class="layui-form-label">LOGO</label>
								<div class="layui-input-block">
									<img src="<?=$info["front_url"]?>/images/logo.png">
									<button class="layui-btn logo-upload-btn">更改</button>
									<input class="logo-choose" type="file" accept=".png" style="display:none">
								</div>
							</div>
							<form class="info_form" action="/ajax/set_info" method="POST">
								<div class="layui-form-item">
									<label class="layui-form-label">网站名称</label>
									<div class="layui-input-inline">
										<input type="text" name="sitename" value="<?=$info["sitename"]?>" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">网站域名</label>
									<div class="layui-input-inline">
										<input type="text" name="front_url" lay-verify="url" value="<?=$info["front_url"]?>" class="layui-input">
									</div>
									<div class="layui-form-mid layui-word-aux">网站URL地址，以http://或https://开头，结尾不要带'/'</div>
								</div>
								<div class="layui-form-item layui-form-text">
									<label class="layui-form-label">META关键词</label>
									<div class="layui-input-inline">
										<textarea name="keywords" class="layui-textarea"><?=$info["keywords"]?></textarea>
									</div>
									<div class="layui-form-mid layui-word-aux">多个关键词用英文状态 , 号分割</div>
								</div>
								<div class="layui-form-item layui-form-text">
									<label class="layui-form-label">META描述</label>
									<div class="layui-input-inline">
										<textarea name="description" class="layui-textarea"><?=$info["description"]?></textarea>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">固话</label>
									<div class="layui-input-inline">
										<input type="text" name="tel" value="<?=$info["tel"]?>" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">传真</label>
									<div class="layui-input-inline">
										<input type="text" name="fax" value="<?=$info["fax"]?>" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">邮箱</label>
									<div class="layui-input-inline">
										<input type="text" name="email" value="<?=$info["email"]?>" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">手机</label>
									<div class="layui-input-inline">
										<input type="text" name="phone" value="<?=$info["phone"]?>" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">联系人</label>
									<div class="layui-input-inline">
										<input type="text" name="linkman" value="<?=$info["linkman"]?>" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">经纬度</label>
									<div class="layui-input-inline">
										<input type="text" name="point" value="<?=$info["point"]?>" class="layui-input">
									</div>
									<div class="layui-form-mid layui-word-aux">用于地图定位，请百度地图查询经纬度</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">地址</label>
									<div class="layui-input-inline">
										<textarea name="addr" class="layui-textarea"><?=$info["addr"]?></textarea>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">备案号</label>
									<div class="layui-input-inline">
										<input type="text" name="site_record" value="<?=$info["site_record"]?>" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">工商注册号</label>
									<div class="layui-input-inline">
										<input type="text" name="company_info" value="<?=$info["company_info"]?>" class="layui-input">
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
	var choose_logo_layer;
	//选择logo按钮
	$(".logo-upload-btn").click(function(){
		choose_logo_layer = layer.confirm('选择图片后立即生效，确定要更换？', {
			title: "提示",
			btn: ['确定','取消'] //按钮
		},function(){
			$(".logo-choose").click();
		});
	});

	//上传logo事件
	$(".logo-choose").change(function(){
		layer.close(choose_logo_layer);
		var load_layer = layer.load(2);

		var data = new FormData();
		logo = $(this)[0].files[0];
		data.append("logo", logo);

		$.ajax({
			method: "POST",
			url: "/ajax/upload_logo",
			processData: false,
			contentType: false,
			data:data,
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

	//修改基本信息
	$(".submit-btn").click(function(){
		layer.confirm("请确认修改信息是否正确！", {
			title: "提示",
			btn: ['确定','取消'] //按钮
		},function(){
			var load_layer = layer.load(2);

			var formData = {};
			var t = $('.info_form').serializeArray();
			$.each(t, function() {
				formData[this.name] = this.value;
			});
			data = JSON.stringify(formData);

			$.ajax({
				method: "POST",
				url: "/ajax/set_info",
				data:{data: data, lan: LAN},
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