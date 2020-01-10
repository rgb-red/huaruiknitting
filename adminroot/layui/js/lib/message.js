/** layuiAdmin.std-v1.2.1 LPPL License By http://www.layui.com/admin/ */
;
layui.define(["jquery", "admin", "table", "util"], function(e) {
	var t = layui.$,
		i = (layui.admin, layui.table),
		l = (layui.element, {
			all: {
				text: "全部消息",
				id: "LAY-app-message-all"
			},
			notice: {
				text: "通知",
				id: "LAY-app-message-notice"
			},
			direct: {
				text: "私信",
				id: "LAY-app-message-direct"
			}
		}),
		a = function(e) {
			return '<a href="javascript:;" onclick="open_item(this,'+e.id+')">' + e.title
        };
        open_item = function(obj,id){
            layer.open({
                type: 2,
                title: "留言",
                shadeClose: true,
                shade: 0.8,
                area: ['720px', '420PX'],
                content: '/admin/contact_item?id=' + id,
                cancel: function(){
                    if(layui.$(".read_btn_" + id).text() == "未读"){
                        layui.$(".read_btn_" + id).text("已读");
                        layui.$(".read_btn_" + id).addClass("layui-btn-primary");
                        layui.$.ajax({
                            method: "GET",
                            url: "/ajax/get_noread",
                            success: function(data){
                                layui.$(".no_read").text(data);
                            }
                        });
                    }
                }
            });
        }
	i.render({
		elem: "#LAY-app-message-all",
		url: "/ajax/get_contact?type=0",
		page: !0,
		cols: [
			[{
				type: "checkbox",
				fixed: "left"
			}, {
				field: "title",
				title: "内容",
				minWidth: 300,
				templet: a
			}, {
                field: "username",
                title: "用户",
                width:250,
                templet: "<div>{{ d.username }}({{d.ip}})</div>"
            }, {
                field: "status",
                title: "状态",
                width:100,
                templet: "<div>{{# if(d.status == 1){ }}<button class='layui-btn layui-btn-xs read_btn_{{d.id}}'>未读</button>{{# }else{ }}<button class='layui-btn layui-btn-primary layui-btn-xs read_btn_{{d.id}}'>已读</button>{{# } }}</div>"
            }, {
				field: "time",
				title: "时间",
				width: 170,
				templet: "<div>{{ layui.util.timeAgo(d.time) }}</div>"
			}]
		],
		skin: "line"
	}), i.render({
		elem: "#LAY-app-message-notice",
		url: "/ajax/get_contact?type=1",
		page: !0,
		cols: [
			[{
				type: "checkbox",
				fixed: "left"
			}, {
				field: "title",
				title: "内容",
				minWidth: 300,
				templet: a
			}, {
                field: "username",
                title: "用户",
                width:250,
                templet: "<div>{{ d.username }}({{d.ip}})</div>"
            }, {
                field: "status",
                title: "状态",
                width:100,
                templet: "<div>{{# if(d.status == 1){ }}<button class='layui-btn layui-btn-xs'>未读</button>{{# }else{ }}<button class='layui-btn layui-btn-primary layui-btn-xs'>已读</button>{{# } }}</div>"
            }, {
				field: "time",
				title: "时间",
				width: 170,
				templet: "<div>{{ layui.util.timeAgo(d.time) }}</div>"
			}]
		],
		skin: "line"
	}), i.render({
		elem: "#LAY-app-message-direct",
		url: "/ajax/get_contact?type=2",
		page: !0,
		cols: [
			[{
				type: "checkbox",
				fixed: "left"
			}, {
				field: "title",
				title: "内容",
				minWidth: 300,
				templet: a
			}, {
                field: "username",
                title: "用户",
                width:250,
                templet: "<div>{{ d.username }}({{d.ip}})</div>"
            }, {
                field: "status",
                title: "状态",
                width:100,
                templet: "<div>{{# if(d.status == 1){ }}<button class='layui-btn layui-btn-xs'>未读</button>{{# }else{ }}<button class='layui-btn layui-btn-primary layui-btn-xs'>已读</button>{{# } }}</div>"
            }, {
				field: "time",
				title: "时间",
				width: 170,
				templet: "<div>{{ layui.util.timeAgo(d.time) }}</div>"
			}]
		],
		skin: "line"
	});
	var d = {
		del: function(e, t) {
			var a = l[t],
				d = i.checkStatus(a.id),
                s = d.data;
                $ = layui.$;
			return 0 === s.length ? layer.msg("未选中行") : void layer.confirm("确定删除选中的数据吗？", function() {
                var id_arr = "";
                Object.keys(s).forEach(function(key){
                    if(key == 0){
                        id_arr += s[key].id;
                    }else{
                        id_arr += "," + s[key].id;
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "/ajax/del_contact",
                    data:{id:id_arr},
                    success: function(data){
                        if(data == 1){
                            $.ajax({
                                method: "GET",
                                url: "/ajax/get_noread",
                                success: function(data){
                                    $(".no_read").text(data);
                                }
                            });
                            layer.msg("删除成功", {
                                icon: 1
                            }), i.reload(a.id)
                        }else{
                            layer.msg("删除失败", {
                                icon: 2
                            })
                        }
                        
                    },
                    error: function(){
                        layer.msg("删除失败", {
                            icon: 2
                        })
                    }
                });
			})
		},
		ready: function(e, t) {
			var a = l[t],
				d = i.checkStatus(a.id),
                s = d.data;
                $ = layui.$;
			return 0 === s.length ? layer.msg("未选中行") : void layer.confirm("确定标记选中的数据吗？", function() {
                var id_arr = "";
                Object.keys(s).forEach(function(key){
                    if(key == 0){
                        id_arr += s[key].id;
                    }else{
                        id_arr += "," + s[key].id;
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "/ajax/set_read_contact",
                    data:{id:id_arr},
                    success: function(data){
                        if(data == 1){
                            $.ajax({
                                method: "GET",
                                url: "/ajax/get_noread",
                                success: function(data){
                                    $(".no_read").text(data);
                                }
                            });
                            layer.msg("标记成功", {
                                icon: 1
                            }), i.reload(a.id)
                        }else{
                            layer.msg("标记失败", {
                                icon: 2
                            })
                        }
                        
                    },
                    error: function(){
                        layer.msg("标记失败", {
                            icon: 2
                        })
                    }
                });
			})
        },
        no_ready: function(e, t) {
			var a = l[t],
				d = i.checkStatus(a.id),
                s = d.data;
                $ = layui.$;
			return 0 === s.length ? layer.msg("未选中行") : void layer.confirm("确定取消标记选中的数据吗？", function() {
                var id_arr = "";
                Object.keys(s).forEach(function(key){
                    if(key == 0){
                        id_arr += s[key].id;
                    }else{
                        id_arr += "," + s[key].id;
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "/ajax/set_noread_contact",
                    data:{id:id_arr},
                    success: function(data){
                        if(data == 1){
                            $.ajax({
                                method: "GET",
                                url: "/ajax/get_noread",
                                success: function(data){
                                    $(".no_read").text(data);
                                }
                            });
                            layer.msg("取消标记成功", {
                                icon: 1
                            }), i.reload(a.id)
                        }else{
                            layer.msg("取消标记失败", {
                                icon: 2
                            })
                        }
                        
                    },
                    error: function(){
                        layer.msg("取消标记失败", {
                            icon: 2
                        })
                    }
                });
			})
		},
		readyAll: function(e, t) {
			var a = l[t],
				d = i.checkStatus(a.id),
                s = d.data;
                $ = layui.$;
			void layer.confirm("确定取消标记所有的数据吗？", function() {
                var id_arr = "";
                Object.keys(s).forEach(function(key){
                    if(key == 0){
                        id_arr += s[key].id;
                    }else{
                        id_arr += "," + s[key].id;
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "/ajax/set_allread_contact",
                    data:{id:id_arr},
                    success: function(data){
                        if(data == 1){
                            $.ajax({
                                method: "GET",
                                url: "/ajax/get_noread",
                                success: function(data){
                                    $(".no_read").text(data);
                                }
                            });
                            layer.msg("全部取消标记成功", {
                                icon: 1
                            }), i.reload(a.id)
                        }else{
                            layer.msg("全部取消标记失败", {
                                icon: 2
                            })
                        }
                        
                    },
                    error: function(){
                        layer.msg("全部取消标记失败", {
                            icon: 2
                        })
                    }
                });
			})
		}
    };
	t(".LAY-app-message-btns .layui-btn").on("click", function() {
		var e = t(this),
			i = e.data("events"),
			l = e.data("type");
		d[i] && d[i].call(this, e, l)
	}), e("message", {})
});
function a(){
    alert(aaa);
}