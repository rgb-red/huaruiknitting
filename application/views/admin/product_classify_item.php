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
		<label class="layui-form-label">编号</label>
		<div class="layui-input-inline">
			<input type="text" name="id" class="layui-input layui-disabled id" readonly value="<?php if($id){echo $id;}?>">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">中文</label>
		<div class="layui-input-inline">
			<input type="text" name="name" lay-verify="required" autocomplete="off" class="layui-input name" value="<?php if($id){echo $name;}?>">
		</div>
	</div>
    <div class="layui-form-item">
		<label class="layui-form-label">英文</label>
		<div class="layui-input-inline">
			<input type="text" name="title" lay-verify="required" autocomplete="off" class="layui-input title" value="<?php if($id){echo $title;}?>">
		</div>
	</div>
    <div class="layui-form-item">
		<label class="layui-form-label">排序</label>
		<div class="layui-input-inline">
			<input type="text" name="sort" lay-verify="required" autocomplete="off" class="layui-input sort" value="<?php if($id){echo $sort;}?>">
		</div>
	</div>
</div>
<div class="layui-form-item" style="text-align:center">
	<?php if($id):?>
	<button class="layui-btn confirm-btn">确认修改</button>
	<?php else:?>
	<button class="layui-btn add-btn">确认添加</button>
	<?php endif;?>
	<button class="layui-btn layui-btn-primary cancel-btn">取消添加</button>
</div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/layui/js/modules/layer.js"></script>
<script>
$(".confirm-btn").click(function(){
	var name = $(".name").val();
	var title = $(".title").val();
	var sort = $(".sort").val();

	if(!is_num(sort)){
		msg_tip("顺序应为纯数字！")
	}else{
		$.ajax({
			method: "POST",
			url: "/ajax/set_product_classify",
			data:{id:ID, name:name, title:title, sort:sort},
			success: function(data){
				if(data == 1){
					success_tip()
				}else{
					error_tip("修改失败，请刷新后重试")
				}
			},
			error: function(){
				error_tip("系统错误，请刷新后重试")
			}
		});
	}
});

$(".add-btn").click(function(){
	var name = $(".name").val();
	var title = $(".title").val();
	var sort = $(".sort").val();

	if(!is_num(sort)){
		msg_tip("顺序应为纯数字！")
	}else{
		$.ajax({
			method: "POST",
			url: "/ajax/add_product_classify",
			data:{name:name, title:title, sort:sort},
			success: function(data){
				if(data == 1){
					success_tip()
				}else{
					error_tip("添加失败，请刷新后重试")
				}
			},
			error: function(){
				error_tip("系统错误，请刷新后重试")
			}
		});
	}
});

var index = parent.layer.getFrameIndex(window.name);

$(".cancel-btn").click(function(){
	parent.layer.close(index);  
});

function success_tip(){
	if(ID){
		msg = "修改成功";
	}else{
		msg = "添加成功";
	}
	layer.alert(msg, function(){
		parent.location.reload();
	});
}

function error_tip(msg){
	layer.alert(msg, function(index){
		parent.location.reload();
	});
}

function msg_tip(msg){
	layer.msg(msg)
}

//验证是否纯数字
function is_num(value){
	if(!/^[0-9]*$/.test(value)){
		return false
	}else{
		return true
	}
}
</script>
</html>