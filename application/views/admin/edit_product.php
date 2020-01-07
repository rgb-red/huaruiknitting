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
									<div class="layui-col-md3">
										<input type="text" name="title" value="" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">型号</label>
									<div class="layui-col-md3">
										<input type="text" name="number" value="" class="layui-input">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">分类</label>
									<div class="layui-input-inline">
										<select name="product_classify" lay-verify="required">
											<option value=""></option>
											<?php foreach($classify as $v):?>
											<option value="<?=$v["id"]?>"><?=$v["name"]?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">封面</label>
									<div class="layui-col-md3 product-img">
										<a href="javascript:;"><img src="/images/addimg.jpg" width="220px"></a>
									</div>
									<input class="img-choose" type="file" accept=".jpg" style="display:none">
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">型号</label>
									<div class="layui-col-md3">
										<input type="text" name="number" value="" class="layui-input">
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
<script src="/layui/js/modules/layer.js"></script>
<script src="/layui/js/modules/form.js"></script>
<script src="/js/jquery.imagecompress.js"></script>
<script>
	layui.use('form', function(){
		var form = layui.form;
	});

	//选择图片按钮
	$(".product-img").click(function(){
		$(".img-choose").click();
	});

	//将图片保存为数据流，显示预览图
	$('.img-choose').imageCompress({
		'quality': 100,
		'oncompressEnd': function(result){
			var imgsrc = result.src;
			$(".product-img img").attr("src", imgsrc);
		}
	});
</script>
</html>