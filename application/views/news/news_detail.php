<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$news["title"]?> - <?=$news["classify"]?> - <?=$this->SITE["sitename"]?></title>
    <meta name="keywords" content="<?=$news["title"]?>,<?=$news["classify"]?>,<?=$this->SITE["keywords"]?>" />
    <meta name="description" content="<?=$news["title"]?>,<?=$news["classify"]?>,<?=$this->SITE["description"]?>" />
    <meta name="applicable-device" content="pc,mobile" />
    <link href="/css/bootstrap.css" rel="stylesheet" />
    <link href="/css/bxslider.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bxslider.min.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/bootstrap.js"></script>
</head>
<body>
    <?php $this->load->view("layout/header", ["page" => 3])?>
    <div class="page_bg" style="background: url(/images/detail_bg.jpg) center top no-repeat;"></div>
    <div class="bread_bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="bread_nav">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <a href='/'><?=CONFIG($this->LAN)["home"]?></a> > 
                        <a href='javascript:;'><?=CONFIG($this->LAN)["title_3"]?></a> > 
                        <a href='javascript:;'><?=$news["classify"]?></a> > 
                        <a href='javascript:;'><?=$news["title"]?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <?php $this->load->view("layout/news_list_sidebar", ["classify" => $classify])?>
            </div>
            <!-- right -->
            <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
                <div class="right_head">
                    <h2><span><?=CONFIG($this->LAN)["news_detail"]?></span></h2>
                </div>
                <div class="right_contents">
                    <h1 class="right_contents_h1"><?=$news["title"]?></h1>
                    <div class="desc">
                        <span class="last"><?=CONFIG($this->LAN)["news_release"]?>：<?=$news["time"]?></span>
                    </div>
                    <div class="product_con">
                        <?=html_entity_decode($news["text"])?>
                    </div>
                </div>
                <div class="relevant_new">
                    <h3 class="left_h3">
                        <span><?=CONFIG($this->LAN)["product_related"]?></span></h3>
                    <ul class="right_new">
                        <?php foreach($related as $v):?>
                        <li>
                            <a href="/home/news_detail?id=<?=$v["id"]?>" title="<?=$v["title"]?>"><?=$v["title"]?></a>
                            <span class="news_time"><?=date("Y-m-d", $v["time"])?></span>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("layout/footer")?>
</body>
</html>