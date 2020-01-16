<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$product["title"]?> - <?=$product["classify"]?> - <?=$this->SITE["sitename"]?></title>
    <meta name="keywords" content="<?=$product["title"]?>,<?=$product["classify"]?>,<?=$this->SITE["keywords"]?>" />
    <meta name="description" content="<?=$product["title"]?>,<?=$product["classify"]?>,<?=$this->SITE["description"]?>" />
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
    <?php $this->load->view("layout/header", ["page" => "2"])?>
    <div class="page_bg" style="background: url(/images/detail_bg.jpg) center top no-repeat;"></div>
    <div class="bread_bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="bread_nav">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <a href='/'><?=CONFIG($this->LAN)["home"]?></a> > 
                        <a href='javascript:;'><?=CONFIG($this->LAN)["title_3"]?></a> > 
                        <a href='javascript:;'><?=$product["classify"]?></a> > 
                        <a href='javascript:;'><?=$product["title"]?></a>
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
                <?php $this->load->view("layout/product_sidebar", ["classify" => $classify])?>
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
                                    <img class="example-image" src="/uploads/cover/<?=$product["id"]?>.jpg" layer-src="/uploads/cover/<?=$product["id"]?>.jpg" alt="<?=$product["title"]?>"/>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- product_info -->
                    <div class="col-sm-12 col-md-6 proinfo_box">
                        <h1 class="product_h1"><?=$product["title"]?></h1>
                        <div class="product_info">
                            <P><?=CONFIG($this->LAN)["product_classify"]?>：<?=$product["classify"]?></P>
                            <p><?=CONFIG($this->LAN)["product_number"]?>：<?=$product["number"]?></p>
                            <p><?=CONFIG($this->LAN)["product_brief"]?>：<?=$product["brief"]?></p>
                            <div class="product_btn">
                            
                                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$this->SITE["qq"]?>&site=qq&menu=yes " target="_blank" class="btn btn-info page-btn">
                                    <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"> </span><?=CONFIG($this->LAN)["product_chat"]?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product_con">
                        <?=html_entity_decode($product["text"])?>
                    </div>
                </div>
                <div class="list_related">
                    <div class="right_head">
                        <h2>
                            <span><?=CONFIG($this->LAN)["product_related"]?></span></h2>
                    </div>
                    <div class="product_list related_list">
                        <?php foreach($related as $v):?>
                        <div class="col-sm-4 col-md-4 col-mm-6 product_img">
                            <a href="/home/product_info?id=<?=$v["id"]?>" title="<?=$v["title"]?>">
                                <img src="/uploads/cover/<?=$v["id"]?>.jpg" alt="<?=$v["title"]?>" class="opacity_img" />
                            </a>
                            <p class="product_title">
                                <a href="/uploads/cover/<?=$v["id"]?>.jpg" title="<?=$v["title"]?>"><?=$v["title"]?></a>
                            </p>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    <?php $this->load->view("layout/footer")?>
</body>
<script src="/layui/js/modules/layer.js"></script>
<script>
    layer.photos({
        photos: '#layer-photos'
        ,anim: 5
    }); 
</script>
</html>