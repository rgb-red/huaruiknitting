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
					<div class="layui-card-body" pad15>
						<div class="layui-form" wid100 lay-filter="">
							<div class="layui-form-item">
								<label class="layui-form-label">LOGO</label>
								<div class="layui-input-block">
									<img src="<?=$info["front_url"]?>/images/logo.png">
									<button class="layui-btn logo-upload-btn">更改</button>
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">网站名称</label>
								<div class="layui-input-inline">
									<input type="text" name="sitename" value="<?=$info["sitename"]?>" class="layui-input">
								</div>
							</div>
							<div class="layui-form-item">
								<label class="layui-form-label">网站域名</label>
								<div class="layui-input-inline">
									<input type="text" name="domain" lay-verify="url" value="<?=$info["front_url"]?>" class="layui-input">
								</div>
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
									<button class="layui-btn" lay-submit lay-filter="set_website">确认保存</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="/js/jquery.min.js"></script>
<script>
	
</script>
</html>