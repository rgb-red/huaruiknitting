<?php
    if($this->LAN == "cn"){
        $title = "title";
        $len = 15;
    }else{
        $title = "en_title";
        $len = 30;
    }
    $sql = "SELECT id,{$title} as `title` FROM news ORDER BY id DESC LIMIT 5";
    $news = $this->db->query($sql)->result_array();
?>
<div class="left_news">
    <h3 class="left_h3">
        <span><?=CONFIG($this->LAN)["title_4"]?></span>
    </h3>
    <ul class="left_news">
        <?php foreach($news as $v):?>
            <li><a href="/home/news_detail?id=<?=$v["id"]?>" title="<?=$v["title"]?>"><?=mb_strlen($v["title"]) >= $len ? mb_substr($v["title"], 0, $len) . "..." : $v["title"]?></a></li>
        <?php endforeach;?>
    </ul>
</div>