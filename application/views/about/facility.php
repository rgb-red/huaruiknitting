<div id="layer-photos" class="product_list product_list2">
    <?php foreach($factory["data"] as $v):?>
    <div class="col-sm-4 col-md-4 col-mm-6 product_img">
        <a href="javascript:;" title="<?=$v["title"]?>"><img src="/uploads/factory/<?=$v["id"]?>.jpg" layer-src="/uploads/factory/<?=$v["id"]?>.jpg" alt="<?=$v["title"]?>" class="img-thumbnail" /></a>
        <p class="product_title"><a href="javascript:;" title="<?=$v["title"]?>"><?=$v["title"]?></a></p>
    </div>
    <?php endforeach;?>
    <div class="pages">
        <ul>
            <li class="first"><a href="/home/facility?page=1"><span><?=CONFIG($this->LAN)["pagenation_4"]?></span></a></li>
            <li class="pre"><a href="javascript:;"><span><?=CONFIG($this->LAN)["pagenation_5"]?></span></a></li>
            <?php if($this->LAN == "cn"):?>
            <li class="pointer"><span class="pageinfo"><?=CONFIG($this->LAN)["pagenation_8"]?> <strong><?=$factory["page"]?></strong> <?=CONFIG($this->LAN)["pagenation_2"]?> / <?=CONFIG($this->LAN)["pagenation_1"]?> <strong><?=$factory["count"]?></strong> <?=CONFIG($this->LAN)["pagenation_2"]?> <strong><?=$factory["num"]?></strong> <?=CONFIG($this->LAN)["pagenation_3"]?> </span></li>
            <?php else:?>
            <li class="pointer"><span class="pageinfo"><?=$factory["page"]?> / <?=$factory["count"]?> <?=CONFIG($this->LAN)["pagenation_1"]?> , <?=$factory["num"]?> <?=CONFIG($this->LAN)["pagenation_2"]?></span></li>
            <?php endif;?>
            <li class="next"><a href="javascript:;"><span><?=CONFIG($this->LAN)["pagenation_6"]?></span></a></li>
            <li class="last"><a href="/home/facility?page=<?=$factory["count"]?>"><span><?=CONFIG($this->LAN)["pagenation_7"]?></span></a></li>
        </ul>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/layer/layer.js"></script>
<script>
    layer.photos({
        photos: '#layer-photos',
        anim: 5
    }); 

    var page = "<?=$factory["page"]?>";
    var count = "<?=$factory["count"]?>";

    if(page > 1){
        $(".pre a").attr("href", "/home/facility?page=" + (Number(page) - 1));
    }

    if(page < count){
        $(".next a").attr("href", "/home/facility?page=" + (Number(page) + 1));
    }
</script>