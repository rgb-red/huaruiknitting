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
						编辑产品 （编号：<?=$id?>）
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
										<input type="text" name="title" value="<?php if($id){echo $info["title"];}?>" class="layui-input title">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">型号</label>
									<div class="layui-col-md3">
										<input type="text" name="number" value="<?php if($id){echo $info["number"];}?>" class="layui-input number">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">分类</label>
									<div class="layui-input-inline">
										<select name="product_classify" lay-verify="required" class="product_classify">
											<option value=""></option>
											<?php foreach($classify as $v):?>
											<?php if($id):?>
											<option value="<?=$v["id"]?>" selected><?=$v["name"]?></option>
											<?else:?>
											<option value="<?=$v["id"]?>"><?=$v["name"]?></option>
											<?php endif;?>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">封面</label>
									<div class="layui-col-md3 product-img">
										<?php if($id && $info["cover"]):?>
										<a href="javascript:;"><img src="<?=$front_url . "/uploads/cover/" . $id . ".jpg"?>" width="220px"></a>
										<?php else:?>
										<a href="javascript:;"><img src="/images/addimg.jpg" width="220px"></a>
										<?php endif;?>
									</div>
									<input class="img-choose" type="file" accept=".jpg" style="display:none">
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">简介</label>
									<div class="layui-col-md4">
										<textarea name="brief" class="layui-textarea brief"><?php if($id){echo $info["brief"];}?></textarea>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">详情</label>
									<div class="layui-col-md9">
										<textarea id="text" style="display: none;"><?php if($id){echo $info["text"];}?></textarea>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">&nbsp;</label>
									<button type="button" id="save-btn" class="layui-btn">发布</button>
									<button type="button" id="draft-btn" class="layui-btn layui-btn-warm">保存为草稿</button>
									<button type="button" id="cancel-btn"  class="layui-btn layui-btn-primary">取消</button>
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
<script src="/layui/js/modules/layedit.js"></script>
<script src="/js/jquery.imagecompress.js"></script>
<script>
	//初始化表单
	layui.use('form', function(){
		var form = layui.form;
	});
	//初始化编辑器
	layui.use('layedit', function(){
		layedit = layui.layedit;

		layedit.set({uploadImage: {url: '/ajax/article_upload_image'}});

		textarea = layedit.build('text', {
			height: 480,
			tool: ['strong', 'italic', 'underline', 'del', '|', 'left', 'center', 'right', 'link', 'unlink', 'image']
		});
		
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

	//产品保存
	$("#save-btn,#draft-btn").click(function(){
		if($(this).attr("id") == "save-btn"){
			msg = "确认发布产品？"
			status = 1
		}
		else if($(this).attr("id") == "draft-btn"){
			msg = "确认将产品放入草稿箱？"
			status = 2
		}
		
		load_layer = layer.load(2)

		var title = $(".title").val()
		var number = $(".number").val()
		var product_classify = $(".product_classify").val()
		var cover = $(".img-choose")[0].files[0]
		var brief = $(".brief").val()
		var textarea_html = layedit.getContent(textarea)
		var textarea_text = layedit.getText(textarea)

		if(!title || !number || !product_classify){
			layer.msg("产品名，型号，类型为必填项，请勿留空！")
			layer.close(load_layer)
			return
		}

		var data = new FormData();
		data.append("id", ID);
		data.append("title", title);
		data.append("number", number);
		data.append("product_classify", product_classify);
		data.append("cover", cover);
		data.append("brief", brief);
		data.append("textarea_html", textarea_html);
		data.append("textarea_text", textarea_text);
		data.append("status", status);
		
		alert1(cover, brief, data);
	});

	function alert1(cover, brief, data){
		if(!cover && $(".product-img img").attr("src") == "/images/addimg.jpg"){
			layer.alert("未上传产品封面，将使用默认图片作为封面！", function(index){
				layer.close(index);
				alert2(brief, data);
			});
		}else{
			alert2(brief, data);
		}
	}

	function alert2(brief, data){
		if(brief == ""){
			layer.alert("未填写简介，将根据产品详情生成简介内容！", function(index){
				layer.close(index);
				do_ajax(data);
			});
		}else{
			do_ajax(data);
		}
	}

	function do_ajax(data){
		choose_logo_layer = layer.confirm('请确认产品信息是否正确！', {
			btn: ['确定','取消'] //按钮
		},function(){
			$.ajax({
				method: "POST",
				url: "/ajax/save_product",
				processData: false,
				contentType: false,
				data:data,
				success: function(data){
					if(data == 0){
						layer.confirm("产品信息写入失败", function(){
							window.location.reload()
						});
					}else{
						layer.confirm("产品信息写入成功！", function(){
							window.location.href = "/admin/edit_product?id=" + data;
						})
					}
				},
				error: function(){
					layer.confirm("系统错误，请重新提交", function(index){
						layer.close(index);
						layer.close(load_layer);
					});
				}
			});
		}, function(){
			layer.close(load_layer);
		});
		
	}
</script>
</html>