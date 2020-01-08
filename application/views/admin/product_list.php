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
</head>
<body layadmin-themealias="default">
<div class="layui-fluid">
	<div class="layui-row layui-col-space15">
		<div class="layui-col-md12">
			<div class="layui-card">
				<div class="layui-card-header">
                    产品分类管理
                </div>
				<div class="layui-card-body">
                    <table id="demo" lay-filter="test"></table>
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
<script>
    layui.use('table', function(){
        var table = layui.table;

        //第一个实例
        table.render({
            elem: '#demo',
            url: '/ajax/product_list',
            page: true,
            cols: [[ //表头
                {field: 'id', title: '编号', width:90, fixed: 'left'},
                {field: 'number', title: '型号', width:120},
                {field: 'title', title: '产品名(中文)', templet: '#title_tpl'},
                {field: 'cover', title: '封面', width:80, align:'center', templet: '#cover_tpl'},
                {field: 'classify', title: '分类', width:120},
                {field: 'status', title: '状态', width:80, align:'center', templet: '#status_tpl'},
                {field: 'time', title: '发布时间', width:165,},
                {title: '操作', width:180, align:'center', templet: '#do_tpl'}
            ]]
        });
        
    });
</script>
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
    <span data-img="{{ d.cover }}"><i class="layui-icon layui-icon-picture"></i> 预览</span>
</script>
<script type="text/html" id="do_tpl">
    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>
</script>
</html>