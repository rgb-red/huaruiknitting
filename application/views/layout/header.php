<?php
    if($this->LAN == "cn"){
        $id = 0;
        $title = "name";
    }else{
        $id = 1;
        $title = "title";
    }
    //网站信息
    $sql = "SELECT sitename,tel,email,fax,addr FROM site_info WHERE id={$id}";
    $info = $this->db->query($sql)->row_array();

    //产品分类
    $sql = "SELECT id,{$title} as `title` FROM product_classify ORDER BY id ASC";
    $product_classify = $this->db->query($sql)->result_array();

    //新闻分类
    $sql = "SELECT id,{$title} as `title` FROM news_classify ORDER BY id ASC";
    $news_classify = $this->db->query($sql)->result_array();
?>

<!--网站由Hsc个人设计及开发，如果您有任何意见或建议请联系QQ:390798960-->
<header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <a href="/">
                    <img src="/images/logo.png" class="logo" alt="LOGO" />
                </a>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5">
                <form id="searchform" name="formsearch" action="/home/search">
                    <div class="input-group search_group">
                        <input type="hidden" name="kwtype" value="0" />
                        <input type="text" name="q" class="form-control input-sm" placeholder="<?=CONFIG($this->LAN)["search_word"]?>">
                        <span class="input-group-btn">
                            <span id="search-submit" onclick="searchform.submit();" title="Products search" class="glyphicon glyphicon-search btn-lg" aria-hidden="true"></span>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 tel_box">
                <div class="top_tel">
                    <img src="/images/tel.png">
                    <span><?=CONFIG($this->LAN)["service_tel"]?>：</span>
                    <p><?=$info["tel"]?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fixed navbar -->
    <nav id="top_nav" class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span id="search_btn" class="glyphicon glyphicon-search" aria-hidden="true"></span>
                <a class="navbar-brand" href="javascript:;"></a></div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class='active' href="/"><?=CONFIG($this->LAN)["title_1"]?></a>
                    </li>
                    <li class="dropdown">
                        <a href="/home/profile" class=''><?=CONFIG($this->LAN)["title_2"]?></a>
                        <a href="/home/profile" id="app_menudown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-menu-down btn-xs"></span>
                        </a>
                        <ul class='dropdown-menu nav_small' role='menu'>
                            <li><a href="/home/profile"><?=CONFIG($this->LAN)["title_2_1"]?></a></li>
                            <li><a href="/home/ceo_speech"><?=CONFIG($this->LAN)["title_2_2"]?></a></li>
                            <li><a href="/home/culture"><?=CONFIG($this->LAN)["title_2_3"]?></a></li>
                            <li><a href="/home/facility"><?=CONFIG($this->LAN)["title_2_4"]?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="/home/products" class=''><?=CONFIG($this->LAN)["title_3"]?></a>
                        <a href="/home/products" id="app_menudown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-menu-down btn-xs"></span>
                        </a>
                        <ul class='dropdown-menu nav_small' role='menu'>
                            <?php foreach($product_classify as $k => $v):?>
                            <li><a href="/home/products?type=<?=$v["id"]?>"><?=$v["title"]?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="/home/news" class=''><?=CONFIG($this->LAN)["title_4"]?></a>
                        <a href="/home/news" id="app_menudown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-menu-down btn-xs"></span>
                        </a>
                        <ul class='dropdown-menu nav_small' role='menu'>
                            <?php foreach($news_classify as $k => $v):?>
                            <li><a href="/home/products?type=<?=$v["id"]?>"><?=$v["title"]?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </li>
                    <li>
                        <a href="/home/honor" class=""><?=CONFIG($this->LAN)["title_5"]?></a>
                    </li>
                    <li>
                        <a href="/home/message" class=""><?=CONFIG($this->LAN)["title_6"]?></a>
                    </li>
                    <li>
                        <a href="/home/contact" class=""><?=CONFIG($this->LAN)["title_7"]?></a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class=''><?=CONFIG($this->LAN)["title_8"]?></a>
                        <a href="javascript:;" id="app_menudown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-menu-down btn-xs"></span>
                        </a>
                        <ul class='dropdown-menu nav_small' role='menu'>
                            <li><a class="btn-language" href="javascript:;" data-language="cn"><?=CONFIG($this->LAN)["title_8_1"]?></a></li>
                            <li><a class="btn-language" href="javascript:;"  data-language="en"><?=CONFIG($this->LAN)["title_8_2"]?></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>