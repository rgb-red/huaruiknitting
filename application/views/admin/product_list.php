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
        .show-cover-area{
            display:none;
            position:fixed;
            top:0px;
            left:0px;
            width:200px;
            padding:15px;
            background-color:white;
            border:1px solid #e9ecef;
            border-radius:10px;
        }
        .show-cover-area img{
            width:100%
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
                                        <option value="">全部</option>
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
                                <label class="layui-form-label">状态：</label>
                                <div class="layui-input-inline">
                                    <select name="status" class="status">
                                        <option value="">全部</option>
                                        <option value="1" <?php if($info["status"] == 1):?>selected<?php endif;?>>已发布</option>
                                        <option value="2" <?php if($info["status"] == 2):?>selected<?php endif;?>>草稿箱</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">推送：</label>
                                <div class="layui-input-inline">
                                    <select name="push" class="push">
                                        <option value="">全部</option>
                                        <option value="2" <?php if($info["push"] == 2):?>selected<?php endif;?>>已推送</option>
                                        <option value="1" <?php if($info["push"] == 1):?>selected<?php endif;?>>未推送</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">排序：</label>
                                <div class="layui-input-inline">
                                    <select name="order" class="order">
                                        <option value="1" <?php if(!$info["order"] || $info["order"] == 1):?>selected<?php endif;?>>ID</option>
                                        <option value="2" <?php if($info["order"] == 2):?>selected<?php endif;?>>时间</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <select name="by" class="by">
                                        <option value="1" <?php if(!$info["by"] || $info["by"] == 1):?>selected<?php endif;?>>倒序</option>
                                        <option value="2" <?php if($info["by"] == 2):?>selected<?php endif;?>>正序</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <button type="submit" class="layui-btn layuiadmin-btn-list search">搜索</button>
                                <button type="button" class="layui-btn layuiadmin-btn-list new-product">添加</button>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="layui-card-body">
                    <table id="main">
                        <script type="text/html" id="title_tpl">
                            {{ d.title }}
                        </script>
                        <script type="text/html" id="status_tpl">
                            {{#  if(d.status == 1){ }}
                                <button class="layui-btn layui-btn-xs">已发布</button>
                            {{#  } else if(d.status == 2){ }}
                                <button class="layui-btn layui-btn-primary layui-btn-xs">草稿箱</button>
                            {{#  } }}
                        </script>
                        <script type="text/html" id="push_tpl">
                            {{#  if(d.push == 1){ }}
                                <button class="layui-btn layui-btn-primary layui-btn-xs" onclick="add_push({{ d.id }})">未推送</button>
                            {{#  } else if(d.push == 2){ }}
                                <button class="layui-btn layui-btn-xs" onclick="del_push({{ d.id }})">已推送</button>
                            {{#  } }}
                        </script>
                        <script type="text/html" id="cover_tpl">
                            {{# if(d.cover == ""){ }}
                                <span>无</span>
                            {{# }else{ }}
                                <span data-img="{{ d.cover }}" onmouseover="show_cover(this)" onmouseout="hide_cover(this)"><i class="layui-icon layui-icon-picture"></i> 预览</span>
                            {{# } }}
                        </script>
                        <script type="text/html" id="do_tpl">
                            <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit" onclick="edit_product({{ d.id }})"><i class="layui-icon layui-icon-edit"></i>编辑</a>
                            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del" onclick="del_product(this, {{ d.id }})"><i class="layui-icon layui-icon-delete"></i>删除</a>
                        </script>
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="show-cover-area"><img src="#"></div>
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
        var time = $("#time").val() ? $("#time").val() : "";
        var status = $(".status").val() ? $(".status").val() : "";
        var push = $(".push").val() ? $(".push").val() : "";
        var order = $(".order").val() ? $(".order").val() : "1";
        var by = $(".by").val() ? $(".by").val() : "1";

        table = layui.table;
        table.render({
            elem: '#main',
            url: '/ajax/product_list?id=' + id + "&number=" + number + "&title=" + title + "&classify=" + classify + "&time=" + time + "&status=" + status + "&push=" + push + "&order=" + order + "&by=" + by,
            page: true,
            cols: [[
                {field: 'id', title: '编号', width:90, fixed: 'left'},
                {field: 'number', title: '型号', width:160},
                {field: 'title', title: '产品名', templet: '#title_tpl'},
                {field: 'cover', title: '封面', width:100, align:'center', templet: '#cover_tpl'},
                {field: 'classify', title: '分类', width:120},
                {field: 'status', title: '状态', width:80, align:'center', templet: '#status_tpl'},
                {field: 'push', title: '推送', width:80, align:'center', templet: '#push_tpl'},
                {field: 'time', title: '保存时间', width:165},
                {field: `operate`, title: '操作', width:200, align:'center', templet: '#do_tpl'}
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

    //编辑产品
    function edit_product(id){
        i = layer.open({
            type: 2,
            shadeClose: true,
            shade: 0.8,
            area: ['90%', '90%'],
            content: '/admin/edit_product?id=' + id,
            cancel: function(){
                reload_table();
            }
        });
    }

    //添加产品
    $(".new-product").click(function(){
        layer.open({
            type: 2,
            shadeClose: true,
            shade: 0.8,
            area: ['90%', '90%'],
            content: '/admin/edit_product',
            cancel: function(){
                window.location.reload()
            }
        });
    });

    //删除产品
    function del_product(obj, id){
        layer.confirm("删除后无法撤销，确认要删除此产品？", {
			title: "提示",
			btn: ['确定','取消'] //按钮
		},function(){
			var load_layer = layer.load(2);

			$.ajax({
				method: "POST",
				url: "/ajax/del_product",
				data:{id: id},
				success: function(data){
					if(data == 1){
                        success_tip(load_layer)
                        $(obj).parent().parent().parent().hide();
					}else{
						error_tip("删除失败，请刷新后重试", load_layer)
					}
				},
				error: function(){
					error_tip("系统错误，请刷新后重试", load_layer)
				}
			});
			
		});
    }

    //产品图片预览
    function show_cover(obj){
        img = $(obj).attr("data-img");
        position = $(obj).offset();
        $(".show-cover-area img").attr("src", img);
        $(".show-cover-area").css("top", position.top + 20);
        $(".show-cover-area").css("left", position.left + 50);
        $(".show-cover-area").show();

    }
    function hide_cover(a){
        $(".show-cover-area").hide();
    }

    function success_tip(elem){
        layer.msg('删除成功');
        layer.close(elem)
	}

	function error_tip(msg, elem){
		layer.close(elem)
		layer.alert(msg, function(index){
			layer.close(index);
		});
    }
    
    function add_push(id){
        var load_layer = layer.load(2);
        $.ajax({
            method: "POST",
            url: "/ajax/add_push",
            data:{id: id},
            success: function(data){
                if(data == 2){
                    error_tip("推送个数上限为6个，请先取消其他推送！", load_layer)
                }
                else if(data == 1){
                    layer.alert('推送成功', function(index){
                        layer.close(load_layer)
                        layer.close(index)
                        reload_table();
                    });
                }
                else{
                    error_tip("推送失败，请刷新后重试", load_layer)
                }
            },
            error: function(){
                error_tip("系统错误，请刷新后重试", load_layer)
            }
        });
    }

    function del_push(id){
        var load_layer = layer.load(2);
        $.ajax({
            method: "POST",
            url: "/ajax/del_push",
            data:{id: id},
            success: function(data){
                if(data == 1){
                    layer.alert('取消推送成功', function(index){
                        layer.close(load_layer)
                        layer.close(index)
                        reload_table();
                    });
                }
                else{
                    error_tip("取消推送失败，请刷新后重试", load_layer)
                }
            },
            error: function(){
                error_tip("系统错误，请刷新后重试", load_layer)
            }
        });
    }

    function reload_table(){
        table.reload("main");
    }
</script>
</html>