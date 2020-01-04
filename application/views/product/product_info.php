<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>保暖衣 - 保暖衣系列 - 博罗县华瑞针织实业有限公司</title>
    <meta name="keywords" content="保暖衣,保暖衣系列,产品中心" />
    <meta name="description" content="保暖衣,保暖衣系列,产品中心,博罗县华瑞针织实业有限公司," />
    <meta name="applicable-device" content="pc,mobile" />
    <link href="/css/bootstrap.css" rel="stylesheet" />
    <link href="/css/bxslider.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bxslider.min.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/bootstrap.js"></script>
    <link href="/css/lightbox.css" rel="stylesheet" />
    <script src="/js/lightbox.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.showpic_flash').bxSlider({
                pagerCustom: '#pic-page',
                adaptiveHeight: true,
            });

        });
    </script>
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
                        <a href='javascript:;'>产品列表</a>>
                        <a href='javascript:;'>保暖衣系列</a>>
                        <a href='javascript:;'>保暖衣</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- left -->
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h3 class="left_h3"><span>产品分类</span></h3>
                <?php $this->load->view("layout/product_sidebar", ["sort" => $info["sort"]])?>
                <?php $this->load->view("layout/news_sidebar")?>
            </div>
            <!-- right -->
            <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
                <div class="list_box">
                    <!-- showpic -->
                    <div id="layer-photos" class="col-sm-12 col-md-6 showpic_box">
                        <ul class="showpic_flash">
                            <li>
                                <a class="example-image-link" href="javascript:;">
                                    <img class="example-image" src="/uploads/product/7.jpg" layer-src="/uploads/product/7.jpg" alt="保暖衣"/>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- product_info -->
                    <div class="col-sm-12 col-md-6 proinfo_box">
                        <h1 class="product_h1">保暖衣</h1>
                        <div class="product_info">
                            <P>商品类型：保暖衣系列</P>
                            <p>产品编号：A-001</p>
                            <p>关注热度：100℃</p>
                            <p>产品摘要：目前，越来越多的资本投入到超市零售行业，如何合理的利用资金成为投资人的关注焦点。超市卖场更大的投资是硬件设备的投入，在开店的硬件投资中货架的金额往往占50%以上，其他...</p>
                            <div class="product_btn">
                                <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=88888888;site=qq&amp;menu=yes" class="btn btn-info page-btn">
                                    <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>在线咨询</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_con">
                        <p>XXXXX</p>
                    </div>
                    <div class="point">
                        <span class="to_prev col-xs-12 col-sm-6 col-md-6">
                            上一篇：
                            <a href='javascript:;'>菜品展示八</a>
                        </span>
                        <span class="to_next col-xs-12 col-sm-6 col-md-6">
                            下一篇：
                            没有了
                        </span>
                        <div style="clear: both;"></div>
                    </div>
                </div>
                <div class="list_related">
                    <div class="right_head">
                        <h2>
                            <span>相关产品</span></h2>
                    </div>
                    <div class="product_list related_list">
                        <div class="col-sm-4 col-md-4 col-mm-6 product_img">
                            <a href="javascript:;" title="保暖衣">
                                <img src="/uploads/product/8.jpg" alt="保暖衣" class="opacity_img" />
                            </a>
                            <p class="product_title">
                                <a href="javascript:;" title="菜品展示九">保暖衣</a>
                            </p>
                        </div>
                        <div class="col-sm-4 col-md-4 col-mm-6 product_img">
                            <a href="javascript:;" title="保暖衣">
                                <img src="/uploads/product/9.jpg" alt="保暖衣" class="opacity_img" />
                            </a>
                            <p class="product_title">
                                <a href="javascript:;" title="菜品展示九">保暖衣</a>
                            </p>
                        </div>
                        <div class="col-sm-4 col-md-4 col-mm-6 product_img">
                            <a href="javascript:;" title="保暖衣">
                                <img src="/uploads/product/8.jpg" alt="保暖衣" class="opacity_img" />
                            </a>
                            <p class="product_title">
                                <a href="javascript:;" title="菜品展示九">保暖衣</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    <?php $this->load->view("layout/footer")?>
</body>
<script src="/layer/layer.js"></script>
<script>
    layer.photos({
        photos: '#layer-photos'
        ,anim: 5
    }); 
</script>
</html>