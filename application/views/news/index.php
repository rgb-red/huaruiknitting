<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=CONFIG($this->LAN)["title_4"]?> - <?=$classify["title"]?> - 第<?=$news["page"]?>页 - <?=$this->SITE["sitename"]?></title>
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
                        <a href='javascript:;'><?=$classify["title"]?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- left -->
            <div class="col-xs-12 col-sm-4 col-md-3">
                <?php $this->load->view("layout/news_list_sidebar", ["classify" => $classify])?>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
                <!-- right -->
                <div class="right_head">
                    <h2><span><?=$classify["title"]?></span></h2>
                </div>
                <ul class="right_new">
                    <?php foreach($news["data"] as $v):?>
                    <li class="content column-num1">
                        <div class="pic">
                            <a href="/home/news_detail?id=<?=$v["id"]?>" title="<?=$v["title"]?>" target="_self">
                                <img src="/uploads/p_cover/<?=$v["id"]?>.jpg" alt="<?=$v["title"]?>" title="<?=$v["title"]?>">
                            </a>
                        </div>
                        <div class="main">
                            <div class="newstitle">
                                <ul>
                                    <li>
                                        <h3>
                                            <a href="/home/news_detail?id=<?=$v["id"]?>" title="<?=$v["title"]?>" target="_self"><?=$v["title"]?></a>
                                        </h3>
                                    </li>
                                </ul>
                            </div>
                            <div class="newslist">
                                <ul>
                                    <li class="summary">
                                        <p style="padding-right:40px"><?=$v["brief"]?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <?php endforeach;?>
                </ul>
                <div class="pages">
                    <ul>
                        <li class="first"><a href="/home/news?cat=<?=$news["classify"]?>&page=1"><span><?=CONFIG($this->LAN)["pagenation_4"]?></span></a></li>
                        <li class="pre"><a href="javascript:;"><span><?=CONFIG($this->LAN)["pagenation_5"]?></span></a></li>
                        <?php if($this->LAN == "cn"):?>
                        <li class="pointer"><span class="pageinfo"><?=CONFIG($this->LAN)["pagenation_8"]?> <strong><?=$news["page"]?></strong> <?=CONFIG($this->LAN)["pagenation_2"]?> / <?=CONFIG($this->LAN)["pagenation_1"]?> <strong><?=$news["count"]?></strong> <?=CONFIG($this->LAN)["pagenation_2"]?> <strong><?=$news["num"]?></strong> <?=CONFIG($this->LAN)["pagenation_3"]?> </span></li>
                        <?php else:?>
                        <li class="pointer"><span class="pageinfo"><?=$news["page"]?> / <?=$news["count"]?> <?=CONFIG($this->LAN)["pagenation_1"]?> , <?=$news["num"]?> <?=CONFIG($this->LAN)["pagenation_2"]?></span></li>
                        <?php endif;?>
                        <li class="next"><a href="javascript:;"><span><?=CONFIG($this->LAN)["pagenation_6"]?></span></a></li>
                        <li class="last"><a href="/home/news?cat=<?=$news["classify"]?>&page=<?=$news["count"]?>"><span><?=CONFIG($this->LAN)["pagenation_7"]?></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("layout/footer")?>
</body>
<script src="/js/jquery.min.js"></script>
<script>
var page = "<?=$news["page"]?>";
var count = "<?=$news["count"]?>";
var cat = "<?=$news["classify"]?>";

if(page > 1){
    $(".pre a").attr("href", "/home/products?cat="+cat+"&page=" + (Number(page) - 1));
}

if(page < count){
    $(".next a").attr("href", "/home/products?cat="+cat+"&page=" + (Number(page) + 1));
}
</script>
</html>