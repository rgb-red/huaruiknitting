<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>产品分类管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
</head>
<body>
<div class="layui-form" lay-filter="layuiadmin-app-form-list" id="layuiadmin-app-form-list" style="padding: 20px 30px 0 0;">
	<div class="layui-form-item">
		<label class="layui-form-label">编号</label>
		<div class="layui-input-inline">
			<input type="text" name="id" class="layui-input layui-disabled" readonly value="1">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">英文</label>
		<div class="layui-input-inline">
			<input type="text" name="title" lay-verify="required" autocomplete="off" class="layui-input">
		</div>
	</div>
    <div class="layui-form-item">
		<label class="layui-form-label">中文</label>
		<div class="layui-input-inline">
			<input type="text" name="name" lay-verify="required" autocomplete="off" class="layui-input">
		</div>
	</div>
    <div class="layui-form-item">
		<label class="layui-form-label">排序</label>
		<div class="layui-input-inline">
			<input type="text" name="sort" lay-verify="required" autocomplete="off" class="layui-input">
		</div>
	</div>
	<div class="layui-form-item layui-hide">
		<input type="button" lay-submit lay-filter="layuiadmin-app-form-submit" id="layuiadmin-app-form-submit" value="确认添加">
		<input type="button" lay-submit lay-filter="layuiadmin-app-form-edit" id="layuiadmin-app-form-edit" value="确认编辑">
	</div>
</div>
</body>
<script src="/layui/js/modules/layer.js"></script>
</html>