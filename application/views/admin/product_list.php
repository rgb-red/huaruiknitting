<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>产品列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layui/css/admin.css" media="all">
    <style>
        .layui-form-label{
            width:60px!important;
            padding:9px 0;
        }
        .layui-inline{
            margin-right:0!important
        }
    </style>
</head>
<body layadmin-themealias="default">
<div class="layui-fluid">
	<div class="layui-row layui-col-space15">
		<div class="layui-col-md12">
			<div class="layui-card">
                <div class="layui-form layui-card-header layuiadmin-card-header-auto">
                    <div class="layui-form-item">
                        <form class="layui-form" action="/admin/product_list" method="GET">
                            <div class="layui-inline">
                                <label class="layui-form-label">ID：</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="id" autocomplete="off" class="layui-input id" value="<?=$info["id"]?>">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">型号：</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="number" autocomplete="off" class="layui-input number" value="<?=$info["number"]?>">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">产品名：</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="title" placeholder="中文或英文" autocomplete="off" class="layui-input title" value="<?=$info["title"]?>">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">分类：</label>
                                <div class="layui-input-inline">
                                    <select name="classify" class="classify">
                                        <option value="">请选择</option>
                                        <?php foreach($classify as $v):?>
                                        <?php if($v["id"] == $info["classify"]):?>
                                        <option value="<?=$v["id"]?>" selected><?=$v["name"]?></option>
                                        <?php else:?>
                                        <option value="<?=$v["id"]?>"><?=$v["name"]?></option>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">时间：</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" id="time" name="time" placeholder="开始 ~ 结束"  value="<?=$info["time"]?>">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <button type="submit" class="layui-btn layuiadmin-btn-list search">搜索</button>
                                <button class="layui-btn layuiadmin-btn-list add">添加</button>
                                <button class="layui-btn layuiadmin-btn-list delete">删除</button>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="layui-card-body">
                    <table id="main">
                        <script type="text/html" id="title_tpl">
                            {{ d.title }}({{ d.en_title }})
                        </script>
                        <script type="text/html" id="status_tpl">
                            {{#  if(d.status == 1){ }}
                                <button class="layui-btn layui-btn-xs">已发布</button>
                            {{#  } else if(d.status == 2){ }}
                                <button class="layui-btn layui-btn-primary layui-btn-xs">草稿箱</button>
                            {{#  } }}
                        </script>
                        <script type="text/html" id="cover_tpl">
                            {{# if(d.cover == ""){ }}
                                <span data-img="{{ d.cover }}">无</span>
                            {{# }else{ }}
                                <span data-img="{{ d.cover }}"><i class="layui-icon layui-icon-picture"></i> 预览</span>
                            {{# } }}
                        </script>
                        <script type="text/html" id="do_tpl">
                            <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a>
                            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>
                        </script>
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/layui/js/layui.js"></script>
<script src="/layui/js/modules/layer2.js"></script>
<script src="/layui/js/modules/table.js"></script>
<script src="/layui/js/modules/laydate.js"></script>
<script>
    //初始化表格
    layui.use('table', function(){
        var id = $(".id").val() ? $(".id").val() : "";
        var number = $(".number").val() ? $(".number").val() : "";
        var title = $(".title").val() ? $(".title").val() : "";
        var classify = $(".classify").val() ? $(".classify").val() : "";
        var time = $(".time").val() ? $(".time").val() : "";

        var table = layui.table;
        table.render({
            elem: '#main',
            url: '/ajax/product_list?id=' + id + "&number=" + number + "&title=" + title + "&classify=" + classify + "&time=" + time,
            page: true,
            cols: [[
                {field: 'id', title: '编号', width:90, fixed: 'left'},
                {field: 'number', title: '型号', width:120},
                {field: 'title', title: '产品名(中文)', templet: '#title_tpl'},
                {field: 'cover', title: '封面', width:80, align:'center', templet: '#cover_tpl'},
                {field: 'classify', title: '分类', width:120},
                {field: 'status', title: '状态', width:80, align:'center', templet: '#status_tpl'},
                {field: 'time', title: '发布时间', width:165,},
                {field: `operate`, title: '操作', width:180, align:'center', templet: '#do_tpl'}
            ]]
        });
        
    });

    //初始化时间控件
    layui.use('laydate', function(){
        var laydate = layui.laydate;
        laydate.render({
            elem: '#time',
            type: 'datetime',
            range: '~',
            format: 'yyyy-M-d'
        }); 
    });

    //
</script>
</html>