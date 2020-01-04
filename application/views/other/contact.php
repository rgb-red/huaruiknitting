<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>联系我们 - 博罗县华瑞针织实业有限公司</title>
    <meta name="keywords" content="联系方式,内衣超薄面料,内衣提花面料,内衣网布,睡衣,功能性面料" />
    <meta name="description" content="联系方式,博罗县华瑞针织实业有限公司,博罗县华瑞针织实业有限公司地址：广东省惠州市博罗县园洲镇九潭桦阳环保工业区旁联系人：郑炜豪手机：13500198222电话：+86-752+6988698传 真：+86+752+6122128邮箱：476692184@qq.com（郑炜豪）" />
    <meta name="applicable-device" content="pc,mobile" />
    <link href="/css/bootstrap.css" rel="stylesheet" />
    <link href="/css/bxslider.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bxslider.min.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/map.js"></script>
</head>
<body>
    <?php $this->load->view("layout/header")?>
    <div class="page_bg" style="background: url(/images/detail_bg.jpg) center top no-repeat;"></div>
    <div class="bread_bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="bread_nav">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <a href='/'>主页</a>>
                        <a href='javascript:;'>联系我们</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- left -->
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h3 class="left_h3"><span>联系我们</span></h3>
                <div class="left_column">
                    <ul class="left_nav_ul" id="firstpane">
                        <li><a href="javascript:;" class="biglink left_active">联系方式</a></li>
                    </ul>
                </div>
                <?php $this->load->view("layout/news_sidebar")?>
            </div>
            <!-- right -->
            <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
                <div class="right_head">
                    <h2><span>联系方式</span></h2>
                </div>
                <div class="right_contents">
                    <p>博罗县华瑞针织实业有限公司</p>
                    <p>地址：广东省惠州市博罗县园洲镇九潭桦阳环保工业区旁</p>
                    <p>联系人：郑炜豪</p>
                    <p>手机：13500198222</p>
                    <p>电话：+86-752+6988698</p>
                    <p>传 真：+86+752+6122128</p>
                    <p>邮箱：<a href="mailto:476692184@qq.com">476692184@qq.com</a></p>
                    <!--地图开始-->
                    <script type="text/javascript" src="/skin/js/map.js"></script>
                    <style type="text/css">#allmap {width: 100%;height: 400px;margin-top:20px;overflow: hidden;font-family:"微软雅黑";} #allmap b{color: #CC5522;font-size: 14px; } #allmap img{max-width: none;}</style>
                    <div id="allmap"></div>
                    <script type="text/javascript">
                        var map = new BMap.Map("allmap");
                        map.centerAndZoom(new BMap.Point(113.998544,23.177511), 17);
                        var marker1 = new BMap.Marker(new BMap.Point(113.998544,23.177511)); // 创建标注
                        map.addOverlay(marker1); // 将标注添加到地图中
                        //marker1.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画				
                        //创建信息窗口 
                        var infoWindow1 = new BMap.InfoWindow("<b>博罗县华瑞针织实业有限公司</b><br>地址：广东省惠州市博罗县园洲镇九潭桦阳环保工业区旁");
                        marker1.openInfoWindow(infoWindow1);
                        //marker1.addEventListener("click", function(){this.openInfoWindow(infoWindow1);});	
                        //向地图中添加缩放控件
                        var ctrl_nav = new BMap.NavigationControl({
                            anchor: BMAP_ANCHOR_TOP_LEFT,
                            type: BMAP_NAVIGATION_CONTROL_LARGE
                        });
                        map.addControl(ctrl_nav);
                        //向地图中添加缩略图控件
                        var ctrl_ove = new BMap.OverviewMapControl({
                            anchor: BMAP_ANCHOR_BOTTOM_RIGHT,
                            isOpen: 1
                        });
                        map.addControl(ctrl_ove);
                        //向地图中添加比例尺控件
                        var ctrl_sca = new BMap.ScaleControl({
                            anchor: BMAP_ANCHOR_BOTTOM_LEFT
                        });
                        map.addControl(ctrl_sca);

                        map.enableDragging(); //启用地图拖拽事件，默认启用(可不写)
                        map.enableScrollWheelZoom(); //启用地图滚轮放大缩小
                        map.enableDoubleClickZoom(); //启用鼠标双击放大，默认启用(可不写)
                        map.enableKeyboard(); //启用键盘上下左右键移动地				
                        </script>
                    <!--地图结束-->
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("layout/footer")?>
</body>
<script>
    $(function() {
        $('#tj').click(function() {
            if ($('#name').val() == '') {
                alert('请输入您的姓名！');
                $("#name").focus();
                return false;
            }
            if ($("#tel").val() == "") {
                alert("请输入你的手机！");
                $("#tel").focus();
                return false;
            }
            if (!$("#tel").val().match(/^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(16[0-9]{1})|(17[0-9]{1})|(18[0-9]{1})|(19[0-9]{1}))+\d{8})$/)) {
                alert("手机号码格式不正确！");
                $("#tel").focus();
                return false;
            }
            if ($("#email").val() == "") {
                alert("请输入电子邮箱!");
                return false;
            }
            if (!$("#email").val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)) {
                alert("电子邮箱格式不正确");
                $("#email").focus();
                return false;
            }
            if ($('#content').val() == '') {
                alert('请输入留言内容！');
                return false;
            }
        })
    })
</script>
</html>