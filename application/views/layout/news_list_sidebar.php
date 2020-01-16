<h3 class="left_h3">
    <span><?=CONFIG($this->LAN)["title_4"]?></span>
</h3>
<div class="left_column">
    <ul class="left_nav_ul" id="firstpane">
        <li><a href="/home/news?cat=0" class="biglink <?php if($classify["num"] == 0):?>left_active<?php endif;?>"><?=$this->LAN == "cn" ? "全部" : "All"?></a></li>
        <?php foreach($classify["data"] as $v):?>
        <li><a href="/home/news?cat=<?=$v["id"]?>" class="biglink <?php if($v["id"] == $classify["num"]):?>left_active<?php endif;?>"><?=$v["title"]?></a></li>
        <?php endforeach;?>
        <ul class="left_snav_ul menu_body"></ul>
    </ul>
</div>