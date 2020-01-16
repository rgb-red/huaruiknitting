<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=CONFIG($this->LAN)["title_7"]?> - <?=$this->SITE["sitename"]?></title>
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
    <?php $this->load->view("layout/header", ["page" => 6])?>
    <div class="page_bg" style="background: url(/images/detail_bg.jpg) center top no-repeat;"></div>
    <div class="bread_bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="bread_nav">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <a href='/'><?=CONFIG($this->LAN)["home"]?></a> > 
                        <a href='javascript:;'><?=CONFIG($this->LAN)["title_7"]?></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- left -->
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h3 class="left_h3"><span><?=CONFIG($this->LAN)["title_7"]?></span></h3>
                <div class="left_column">
                    <ul class="left_nav_ul" id="firstpane">
                        <li><a href="javascript:;" class="biglink left_active"><?=$this->LAN == "cn" ? "联系方式" : "Contact Us"?></a></li>
                    </ul>
                </div>
                <?php $this->load->view("layout/news_sidebar")?>
            </div>
            <!-- right -->
            <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
                <div class="right_head">
                    <h2><span><?=$this->LAN == "cn" ? "联系方式" : "Contact Us"?></span></h2>
                </div>
                <div class="right_contents">
                    <p><?=$this->SITE["sitename"]?></p>
                    <p><?=CONFIG($this->LAN)["address"]?>：<?=$this->SITE["addr"]?></p>
                    <p><?=CONFIG($this->LAN)["linkman"]?>：<?=$this->SITE["linkman"]?></p>
                    <p><?=CONFIG($this->LAN)["phone"]?>：<?=$this->SITE["phone"]?></p>
                    <p><?=CONFIG($this->LAN)["tel"]?>：<?=$this->SITE["tel"]?></p>
                    <p><?=CONFIG($this->LAN)["fax"]?>：<?=$this->SITE["fax"]?></p>
                    <p><?=CONFIG($this->LAN)["email"]?>：<a href="mailto:<?=$this->SITE["email"]?>"><?=$this->SITE["email"]?></a></p>
                    <!--地图开始-->
                    <script type="text/javascript" src="/skin/js/map.js"></script>
                    <style type="text/css">#allmap {width: 100%;height: 400px;margin-top:20px;overflow: hidden;font-family:"微软雅黑";} #allmap b{color: #CC5522;font-size: 14px; } #allmap img{max-width: none;}</style>
                    <div id="allmap"></div>
                    <script type="text/javascript">
                        var map = new BMap.Map("allmap");
                        map.centerAndZoom(new BMap.Point(<?=$this->SITE["point"]?>), 17);
                        var marker1 = new BMap.Marker(new BMap.Point(<?=$this->SITE["point"]?>)); // 创建标注
                        map.addOverlay(marker1); // 将标注添加到地图中
                        //marker1.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画				
                        //创建信息窗口 
                        var infoWindow1 = new BMap.InfoWindow("<b><?=$this->SITE["sitename"]?></b><br>地址：<?=$this->SITE["addr"]?>");
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
</html>