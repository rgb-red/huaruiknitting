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
				<div class="layui-card-header">产品分类管理</div>
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
                                <th>分类英文名</th>
                                <th>分类中文名</th>
                                <th>排序（数字越大，排序越靠后）</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list as $v):?>
                            <tr>
                                <td><?=$v["id"]?></td>
                                <td><?=$v["title"]?></td>
                                <td><?=$v["name"]?></td>
                                <td><?=$v["sort"]?></td>
                                <td>
                                    <div class="layui-table-cell laytable-cell-2-0-3">
                                        <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">
                                            <i class="layui-icon layui-icon-edit"></i>
                                            编辑
                                        </a>
                                        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">
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
<script src="../../../layuiadmin/layui/layui.js"></script>
<script>
  layui.config({
    base: '../../../layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index']);
  </script>
<style id="LAY_layadmin_theme">
.layui-side-menu,.layadmin-pagetabs .layui-tab-title li:after,.layadmin-pagetabs .layui-tab-title li.layui-this:after,.layui-layer-admin .layui-layer-title,.layadmin-side-shrink .layui-side-menu .layui-nav>.layui-nav-item>.layui-nav-child{background-color:#20222A !important;}.layui-nav-tree .layui-this,.layui-nav-tree .layui-this>a,.layui-nav-tree .layui-nav-child dd.layui-this,.layui-nav-tree .layui-nav-child dd.layui-this a{background-color:#009688 !important;}.layui-layout-admin .layui-logo{background-color:#20222A !important;}
</style>
</body>
</html>