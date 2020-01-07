<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>产品发布</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layui/css/admin.css" media="all">
	<script>
		var ID = "<?=$id?>";
	</script>
</head>
<body>
	<div class="layui-fluid">
		<div class="layui-row layui-col-space15">
			<div class="layui-col-md12">
				<div class="layui-card">
					<div class="layui-card-header">
						<?php if($id):?>
						编辑产品 编号：<?=$id?>
						<?php else:?>
						发布产品
						<?php endif;?>
					</div>
					<div class="layui-card-body">
						<div class="layui-form">
							<form class="layui-form" action="" method="POST">
								<div class="layui-form-item">
									<label class="layui-form-label">产品名</label>
									<div class="layui-input-inline">
										<input type="text" name="title" value="" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">型号</label>
									<div class="layui-input-inline">
										<input type="text" name="number" value="" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">分类</label>
									<div class="layui-input-inline">
									<div class="layui-input-block">
										<select name="city" lay-verify="required">
											<option value=""></option>
											<option value="0">北京</option>
											<option value="1">上海</option>
											<option value="2">广州</option>
											<option value="3">深圳</option>
											<option value="4">杭州</option>
										</select>
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
<script src="/layui/js/modules/form.js"></script>
</html>