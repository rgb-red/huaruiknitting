<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>产品分类管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
	<script>
		var ID = "<?=$id?>";
	</script>
</head>
<body>
<div class="layui-form" lay-filter="layuiadmin-app-form-list" id="layuiadmin-app-form-list" style="padding: 20px 60px 0 0;">
    <div class="layui-form-item">
		<label class="layui-form-label">留言</label>
		<div class="layui-input-inline">
            <textarea class="layui-input" style="width:500px;height:150px;max-width:500px;max-height:150px" readonly><?=$text?></textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">编号</label>
		<div class="layui-input-inline">
			<input type="text" class="layui-input" readonly value="<?=$id?>">
		</div>
        <label class="layui-form-label">用户名</label>
		<div class="layui-input-inline">
			<input type="text" class="layui-input" readonly value="<?=$username?>">
		</div>
	</div>
    <div class="layui-form-item">
		<label class="layui-form-label">电话</label>
		<div class="layui-input-inline">
			<input type="text" class="layui-input" readonly value="<?=$tel?>">
		</div>
        <label class="layui-form-label">邮箱</label>
		<div class="layui-input-inline">
			<input type="text" class="layui-input" readonly value="<?=$email?>">
		</div>
	</div>
    <div class="layui-form-item">
		<label class="layui-form-label">时间</label>
		<div class="layui-input-inline">
			<input type="text" class="layui-input" readonly value="<?=date("Y-m-d H:i:s", $time);?>">
		</div>
        <label class="layui-form-label">IP</label>
		<div class="layui-input-inline">
			<input type="text" class="layui-input" readonly value="<?=$ip?>">
		</div>
	</div>
</div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/layui/js/modules/layer.js"></script>

</html>