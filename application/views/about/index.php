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
    <?php $this->load->view("layout/header", ["page" => 1])?>
    <div class="page_bg" style="background: url(/images/detail_bg.jpg) center top no-repeat;"></div>
    <div class="bread_bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="bread_nav">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <a href='/'><?=CONFIG($this->LAN)["home"]?></a> > 
                        <a href='javascript:;'><?=CONFIG($this->LAN)["title_2"]?></a> > 
                        <a href='javascript:;'><?=$info["title"]?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- left -->
            <div class="col-xs-12 col-sm-4 col-md-3">
                <?php $this->load->view("layout/about_sidebar", ["sort" => $info["sort"]])?>
                <?php $this->load->view("layout/news_sidebar")?>
            </div>
            <!-- right -->
            <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
                <div class="right_head">
                    <h2>
                        <span><?=$info["title"]?></span>
                    </h2>
                </div>
                <?php if($info["sort"] == 4):?>
                <?php $this->load->view("about/facility", ["sort" => 4, "factory" => $factory]);?>
                <?php else:?>
                <?=html_entity_decode($info["text"])?>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php $this->load->view("layout/footer")?>
</body>
</html>