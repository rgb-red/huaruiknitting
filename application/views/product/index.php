<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=CONFIG($this->LAN)["title_3"]?> - <?=$classify["title"]?> - 第<?=$product["page"]?>页 - <?=$this->SITE["sitename"]?></title>
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
    <?php $this->load->view("layout/header", ["page" => 2])?>
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
                <?php $this->load->view("layout/product_sidebar", ["classify" => $classify])?>
                <?php $this->load->view("layout/news_sidebar")?>
            </div>
            <!-- right -->
            <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
                <div class="right_head">
                    <h2><span><?=$classify["title"]?></span></h2>
                </div>
                <div class="product_list product_list2">
                    <?php foreach($product["data"] as $v):?>
                    <div class="col-sm-4 col-md-4 col-mm-6 product_img">
                        <a href="/home/product_info?id=<?=$v["id"]?>" title="<?=$v["title"]?>">
                            <img src="/uploads/cover/<?=$v["id"]?>.jpg" alt="<?=$v["title"]?>" class="img-thumbnail" />
                        </a>
                        <p class="product_title">
                            <a href="/home/product_info?id=<?=$v["id"]?>" title="<?=$v["title"]?>"><?=$v["title"]?></a>
                        </p>
                    </div>
                    <?php endforeach;?>
                    <div class="pages">
                        <ul>
                            <li class="first"><a href="/home/products?cat=<?=$product["classify"]?>&page=1"><span><?=CONFIG($this->LAN)["pagenation_4"]?></span></a></li>
                            <li class="pre"><a href="javascript:;"><span><?=CONFIG($this->LAN)["pagenation_5"]?></span></a></li>
                            <?php if($this->LAN == "cn"):?>
                            <li class="pointer"><span class="pageinfo"><?=CONFIG($this->LAN)["pagenation_8"]?> <strong><?=$product["page"]?></strong> <?=CONFIG($this->LAN)["pagenation_2"]?> / <?=CONFIG($this->LAN)["pagenation_1"]?> <strong><?=$product["count"]?></strong> <?=CONFIG($this->LAN)["pagenation_2"]?> <strong><?=$product["num"]?></strong> <?=CONFIG($this->LAN)["pagenation_3"]?> </span></li>
                            <?php else:?>
                            <li class="pointer"><span class="pageinfo"><?=$product["page"]?> / <?=$product["count"]?> <?=CONFIG($this->LAN)["pagenation_1"]?> , <?=$product["num"]?> <?=CONFIG($this->LAN)["pagenation_2"]?></span></li>
                            <?php endif;?>
                            <li class="next"><a href="javascript:;"><span><?=CONFIG($this->LAN)["pagenation_6"]?></span></a></li>
                            <li class="last"><a href="/home/products?cat=<?=$product["classify"]?>&page=<?=$product["count"]?>"><span><?=CONFIG($this->LAN)["pagenation_7"]?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("layout/footer")?>
</body>
<script src="/js/jquery.min.js"></script>
<script>
var page = "<?=$product["page"]?>";
var count = "<?=$product["count"]?>";
var cat = "<?=$product["classify"]?>";

if(page > 1){
    $(".pre a").attr("href", "/home/products?cat="+cat+"&page=" + (Number(page) - 1));
}

if(page < count){
    $(".next a").attr("href", "/home/products?cat="+cat+"&page=" + (Number(page) + 1));
}
</script>
</html>