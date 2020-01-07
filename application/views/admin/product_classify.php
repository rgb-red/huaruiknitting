<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>产品分类管理</title>
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
                    <button class="layui-btn layui-btn-xs layui-btn-normal add-item">新增分类</button>
                </div>
				<div class="layui-card-body">
					<table class="layui-table">
                        <colgroup>
                            <col width="100">
                            <col width="480">
                            <col width="480">
                            <col width="280">
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>编号</th>
                                <th>分类名（中文）</th>
                                <th>分类名（英文）</th>
                                <th>排序（数字越大，排序越靠后）</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list as $v):?>
                            <tr class="product_classify_item" data-id="<?=$v["id"]?>">
                                <td><?=$v["id"]?></td>
                                <td class="classify_title"><?=$v["name"]?></td>
                                <td><?=$v["title"]?></td>
                                <td><?=$v["sort"]?></td>
                                <td>
                                    <div class="layui-table-cell laytable-cell-2-0-3">
                                        <a class="layui-btn layui-btn-normal layui-btn-xs edit-item" lay-event="edit">
                                            <i class="layui-icon layui-icon-edit"></i>
                                            编辑
                                        </a>
                                        <a class="layui-btn layui-btn-danger layui-btn-xs del-item" lay-event="del">
                                            <i class="layui-icon layui-icon-delete"></i>
                                            删除
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/layui/js/modules/layer.js"></script>
<script>
$(".edit-item").click(function(){
    var id = $(this).parents(".product_classify_item").attr("data-id")
    var title = $(this).parents(".product_classify_item").children(".classify_title").text()

    layer.open({
        type: 2,
        title: "修改",
        shadeClose: true,
        shade: 0.8,
        area: ['450px', '350PX'],
        content: '/admin/product_classify_item?id=' + id
    });     
});

$(".del-item").click(function(){
    var id = $(this).parents(".product_classify_item").attr("data-id")
    layer.confirm("删除后无法撤回，是否确认删除？", {
        title: "提示",
        btn: ['确定','取消'] //按钮
    },function(){
        $.ajax({
            method: "POST",
            url: "/ajax/del_product_classity",
            data:{id:id},
            success: function(data){
                if(data == 1){
                    success_tip()
                }else{
                    error_tip("删除失败，请刷新后重试")
                }
            },
            error: function(){
                error_tip("系统错误，请刷新后重试")
            }
        });
    });
});

$(".add-item").click(function(){
    layer.open({
        type: 2,
        title: "修改",
        shadeClose: true,
        shade: 0.8,
        area: ['450px', '350PX'],
        content: '/admin/product_classify_add'
    });
});

function success_tip(){
	layer.alert('删除成功', function(){
		window.location.reload();
	});
}

function error_tip(msg){
	layer.alert(msg, function(index){
		layer.close(index)
	});
}
</script>
</html>