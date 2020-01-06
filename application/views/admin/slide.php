<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>轮播图</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layui/css/admin.css" media="all">
    <link rel="stylesheet" href="/layui/css/template.css" media="all">
    <style>
        .add-img{
            text-align:center;
            background-color:white;
        }
    </style>
</head>
<body>
<div class="layui-fluid layadmin-cmdlist-fluid">
	<div class="layui-row layui-col-space30">
		<div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
				<a href="javascript:;" class="layui-col-lg12" style="text-align:center">
                    <img src="<?=$this->SITE["front_url"]?>/uploads/banner/1.jpg" width="100%">
                </a>
				<a href="javascript:;">
                    <p style="text-align:center">1</p>
				</a>
			</div>
		</div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
				<a href="javascript:;" class="layui-col-lg12" style="text-align:center">
                    <img src="<?=$this->SITE["front_url"]?>/uploads/banner/2.jpg" width="100%">
                </a>
				<a href="javascript:;">
                    <p style="text-align:center">2</p>
				</a>
			</div>
		</div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
				<a href="javascript:;" class="layui-col-lg12" style="text-align:center">
                    <img src="<?=$this->SITE["front_url"]?>/uploads/banner/3.jpg" width="100%">
                </a>
				<a href="javascript:;">
                    <p style="text-align:center">3</p>
				</a>
			</div>
		</div>
        <div class="layui-col-md2 layui-col-sm4">
            <div class="cmdlist-container">
				<a href="javascript:;" class="layui-col-lg12 add-img">
                    <img src="/images/add.jpg" width="100%">
                </a>
				<a href="javascript:;">
                    <p style="text-align:center">点击添加图片</p>
				</a>
			</div>
        </div>
		<div class="layui-col-md12 layui-col-sm12">
			<div id="demo0"></div>
		</div>
	</div>
</div>
</body>
</html>