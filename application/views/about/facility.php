<div id="layer-photos" class="product_list product_list2">
    <div class="col-sm-4 col-md-4 col-mm-6 product_img">
        <a href="javascript:;" title="厂房大门"><img src="/uploads/facility/1.jpg" layer-src="/uploads/facility/1.jpg" alt="厂房大门" class="img-thumbnail" /></a>
        <p class="product_title"><a href="javascript:;" title="厂房大门">厂房大门</a></p>
    </div>
    <div class="col-sm-4 col-md-4 col-mm-6 product_img">
        <a href="javascript:;" title="厂房大楼"><img src="/uploads/facility/2.jpg" layer-src="/uploads/facility/2.jpg" alt="厂房大楼" class="img-thumbnail" /></a>
        <p class="product_title"><a href="javascript:;" title="厂房大楼">厂房大楼</a></p>
    </div>
    <div class="col-sm-4 col-md-4 col-mm-6 product_img">
        <a href="javascript:;" title="厂房环境1"><img src="/uploads/facility/3.jpg" layer-src="/uploads/facility/3.jpg" alt="厂房环境1" class="img-thumbnail" /></a>
        <p class="product_title"><a href="javascript:;" title="厂房环境1">厂房环境1</a></p>
    </div>
    <div class="col-sm-4 col-md-4 col-mm-6 product_img">
        <a href="javascript:;" title="厂房环境2"><img src="/uploads/facility/4.jpg" layer-src="/uploads/facility/4.jpg" alt="厂房环境2" class="img-thumbnail" /></a>
        <p class="product_title"><a href="javascript:;" title="厂房环境2">厂房环境2</a></p>
    </div>
    <div class="col-sm-4 col-md-4 col-mm-6 product_img">
        <a href="javascript:;" title="厂房环境3"><img src="/uploads/facility/5.jpg" layer-src="/uploads/facility/5.jpg" alt="厂房环境3" class="img-thumbnail" /></a>
        <p class="product_title"><a href="javascript:;" title="厂房环境3">厂房环境3</a></p>
    </div>
    <div class="col-sm-4 col-md-4 col-mm-6 product_img">
        <a href="javascript:;" title="公司前台"><img src="/uploads/facility/6.jpg"  layer-src="/uploads/facility/6.jpg" alt="公司前台" class="img-thumbnail" /></a>
        <p class="product_title"><a href="javascript:;" title="公司前台">公司前台</a></p>
    </div>
    <div class="pages">
        <ul>
            <li><span class="pageinfo"><?=CONFIG($this->LAN)["pagenation_1"]?> <strong>1</strong> <?=CONFIG($this->LAN)["pagenation_2"]?> <strong>6</strong> <?=CONFIG($this->LAN)["pagenation_3"]?> </span></li>
        </ul>
    </div>
</div>
<script src="/layui/js/modules/layer.js"></script>
<script>
    layer.photos({
        photos: '#layer-photos',
        anim: 5
    }); 
</script>