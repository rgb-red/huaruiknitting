<script src="/js/jquery.smoove.min.js"></script>
<script>
    $('.product_head,.news_head,.news_img,.about_head,.js_about_left,.js_about_right').smoove({
        offset: '10%'
    });
</script>
<nav class="navbar navbar-default navbar-fixed-bottom mfoot_box">
    <div class="mfoot_nav btn-group dropup">
        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
            <span class="glyphicon glyphicon-share btn-lg" aria-hidden="true"></span><?=CONFIG($this->LAN)["share"]?></a>
        <div class="dropdown-menu mfoot_share">
            <div class="bdsharebuttonbox" style="display: inline-block; float:left;">
                <a href="#" class="bds_more" data-cmd="more"></a>
                <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
            </div>
            <script>window._bd_share_config = {
                    "common": {
                        "bdSnsKey": {},
                        "bdText": "",
                        "bdMini": "2",
                        "bdMiniList": false,
                        "bdPic": "",
                        "bdStyle": "0",
                        "bdSize": "32"
                    },
                    "share": {}
                };
                with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = '//bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~ ( - new Date() / 36e5)];
            </script>
        </div>
    </div>
    <div class="mfoot_nav">
        <a href="tel:0752-6988698">
            <span class="glyphicon glyphicon-phone btn-lg" aria-hidden="true"></span><?=CONFIG($this->LAN)["tel"]?>
        </a>
    </div>
    <div class="mfoot_nav">
        <button id="foot_btn" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="width:100%; border: 0px; background: transparent;">
            <span class="glyphicon glyphicon-th-list btn-lg"></span><?=CONFIG($this->LAN)["classify"]?></button>
    </div>
    <div class="mfoot_nav">
        <a id="gototop" href="#">
            <span class="glyphicon glyphicon-circle-arrow-up btn-lg" aria-hidden="true"></span><?=CONFIG($this->LAN)["top"]?></a>
    </div>
</nav>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 footer_contact">
                <h4 style="color:#CC0E17"><?=CONFIG($this->LAN)["site_name"]?></h4>
                <p><?=CONFIG($this->LAN)["tel"]?>：0752-6988698</p>
                <p><?=CONFIG($this->LAN)["fax"]?>：0752-6988698</p>
                <p><?=CONFIG($this->LAN)["email"]?>：<?=CONFIG($this->LAN)["address"]?></p>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7">
                <div class="col-xs-6 col-md-3 footer_menu">
                    <p class="footer_menu_first"><a href="javascript:;"><?=CONFIG($this->LAN)["title_2"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_2_1"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_2_2"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_2_3"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_2_4"]?></a></p>
                </div>
                <div class="col-xs-6 col-md-3 footer_menu">
                    <p class="footer_menu_first"><a href="javascript:;"><?=CONFIG($this->LAN)["title_3"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_3_1"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_3_2"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_3_3"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_3_4"]?></a></p>
                </div>
                <div class="col-xs-6 col-md-3 footer_menu">
                    <p class="footer_menu_first"><a href="javascript:;"><?=CONFIG($this->LAN)["title_4"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_4_1"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_4_2"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_4_3"]?></a></p>
                </div>
                <div class="col-xs-6 col-md-3 footer_menu">
                    <p class="footer_menu_first"><a href="javascript:;"><?=CONFIG($this->LAN)["title_7"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_6"]?></a></p>
                    <p><a href="javascript:;"><?=CONFIG($this->LAN)["title_7"]?></a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copy">Copyright &copy; 1995-<?=date("Y")?> <?=CONFIG($this->LAN)["site_name"]?>
    <a href="http://beian.miit.gov.cn/" target="_blank" rel="nofollow">粤ICP备12040972号</a>
    <a href="http://wljg.gdgs.gov.cn/corpsrch.aspx?key=441322000003556" target="_blank" title="企业名称：<?=CONFIG($this->LAN)["site_name"]?>
法定代表人：郑兴烈
标识状态：已激活 粤工商备P131706004138">
        <img src="http://wljg.gdgs.gov.cn/upload/image/20141126/20141126002933.png" alt="" style="height:38px;border:0;">
    </a>
</div>