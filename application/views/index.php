<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?=CONFIG($this->LAN)["site_name"]?></title>
	<meta name="description" content="<?=CONFIG($this->LAN)["description"]?>" />
	<meta name="keywords" content="<?=CONFIG($this->LAN)["keywords"]?>" />
	<meta name="author" content=Hsc_QQ:390798960" />
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
	<?php $this->load->view("layout/header")?>
	<!-- 轮播图 -->
	<div class="flash">
		<ul class="bxslider">
			<?php foreach($banner as $v):?>
			<li>
				<a href="<?php if($v["url"]){echo $v["url"];}else{echo "javascript:;";}?>" target="_blank">
					<img src="/uploads/banner/<?=$v["id"]?>.jpg" />
				</a>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
	<script type="text/javascript">
		$('.bxslider').bxSlider({
			adaptiveHeight: true,
			infiniteLoop: true,
			hideControlOnEnd: true,
			auto: true
		});
	</script>
	<!-- 产品中心 -->
	<div class="container">
		<div class="row">
			<div class="product_head" data-move-y="-40px">
				<h2><?=CONFIG($this->LAN)["index_product_show"]?></h2>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="product_list">
					<?php foreach($product as $v):?>
					<div class="col-sm-4 col-md-4 col-mm-6 product_img" data-move-y="50px">
						<a href="/home/product_info?id=<?=$v["id"]?>" title="<?=$v["title"]?>">
							<img src="/uploads/cover/<?=$v["id"]?>.jpg" alt="<?=$v["title"]?>" class="img-thumbnail" />
						</a>
						<p class="product_title">
							<a href="/home/product_info?id=<?=$v["id"]?>" title="<?=$v["title"]?>"><?=$v["title"]?></a>
						</p>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
	<!-- 关于我们 -->
	<div class="about_serv" style="background-image: url(/images/about.jpg); background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 left col"></div>
				<div class="col-xs-12 col-sm-6 col-md-6 right col">
					<h2><?=CONFIG($this->LAN)["index_about_us"]?></h2>
					<p class="about_contents">
						<p class="about_p"></p>
						<div class="about_content">
							<p>
								<span style="line-height:3;">
									<?=$about?>
								</span>
							</p>
							<p>
								<span style="line-height:2;">
									<span style="line-height:3;"></span>
									<br />
								</span>
							</p>
						</div>
					</p>
					<p>
					</p>
					<a href="/home/profile" class="service-all"><?=CONFIG($this->LAN)["all_more"]?></a>
				</div>
			</div>
		</div>
	</div>
	<!-- 新闻资讯 -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="news_head" data-move-y="-40px">
					<h2><?=CONFIG($this->LAN)["index_news"]?></h2>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="news_list">
						<?php foreach($news as $k => $v):?>
						<div class="col-sm-4 col-md-4 news_img" data-move-y="50px">
							<a href="/home/news_detail?id=<?=$v["id"]?>" title="<?=$v["title"]?>">
								<img src="/uploads/p_cover/<?=$v["id"]?>.jpg" alt="<?=$v["title"]?>" class="opacity_img">
							</a>
							<p class="news_title" style="text-align:center">
								<a href="/home/news_detail?id=<?=$v["id"]?>" title="<?=$v["title"]?>"><?=$v["title"]?></a>
							</p>
							<p class="news_desc"><?=$v["brief"]?></p>
						</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("layout/footer")?>
</body>
</html>