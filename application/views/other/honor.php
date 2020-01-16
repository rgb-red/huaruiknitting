<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=$info["title"]?> - <?=$this->SITE["sitename"]?></title>
    <meta name="keywords" content="<?=$info["keywords"]?>" />
    <meta name="description" content="<?=$info["description"]?>" />
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
    <?php $this->load->view("layout/header", ["page" => 4])?>
    <div class="page_bg" style="background: url(/images/detail_bg.jpg) center top no-repeat;"></div>
    <div class="bread_bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="bread_nav">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <a href='/'><?=CONFIG($this->LAN)["home"]?></a> > 
                        <a href='javascript:;'><?=CONFIG($this->LAN)["title_5"]?></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- left -->
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h3 class="left_h3">
                    <span><?=CONFIG($this->LAN)["title_5"]?></span>
                </h3>
                <div class="left_column">
                    <ul class="left_nav_ul" id="firstpane">
                        <li><a href="javascript:;" class="biglink left_active"><?=$this->LAN == "cn" ? "资质证书" : "Certificate"?></a></li>
                    </ul>
                </div>
                <?php $this->load->view("layout/news_sidebar")?>
            </div>
            <!-- right -->
            <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
                <div class="right_head">
                    <h2><span><?=$this->LAN == "cn" ? "资质证书" : "Certificate"?></span></h2>
                </div>
                <div id="layer-photos" class="product_list product_list2">
                    <div class="col-sm-12 col-md-12 col-mm-12" style="margin-left:26px;margin-right:26px;margin-bottom:58px">
                        <?=html_entity_decode($info["text"])?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("layout/footer")?>
</body>
</html>