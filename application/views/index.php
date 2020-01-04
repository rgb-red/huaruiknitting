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
			<li>
				<a href="javascript:;" target="_blank">
					<img src="/uploads/banner/1.jpg" /></a>
			</li>
			<li>
				<a href="javascript:;" target="_blank">
					<img src="/uploads/banner/2.jpg" /></a>
			</li>
			<li>
				<a href="javascript:;" target="_blank">
					<img src="/uploads/banner/3.jpg" /></a>
			</li>
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
					<div class="col-sm-4 col-md-4 col-mm-6 product_img" data-move-y="50px">
						<a href="/home/product_info" title="网布内衣">
							<img src="/uploads/product/1.jpg" alt="网布内衣" class="img-thumbnail" />
						</a>
						<p class="product_title">
							<a href="javascript:;" title="网布内衣">网布内衣</a>
						</p>
					</div>
					<div class="col-sm-4 col-md-4 col-mm-6 product_img" data-move-y="50px">
						<a href="/home/product_info" title="透气网孔内裤">
							<img src="/uploads/product/2.jpg" alt="透气网孔内裤" class="img-thumbnail" />
						</a>
						<p class="product_title">
							<a href="/home/product_info" title="透气网孔内裤">透气网孔内裤</a>
						</p>
					</div>
					<div class="col-sm-4 col-md-4 col-mm-6 product_img" data-move-y="50px">
						<a href="/home/product_info" title="女士泳衣">
							<img src="/uploads/product/3.jpg" alt="女士泳衣" class="img-thumbnail" />
						</a>
						<p class="product_title">
							<a href="/home/product_info" title="女士泳衣">女士泳衣</a>
						</p>
					</div>
					<div class="col-sm-4 col-md-4 col-mm-6 product_img" data-move-y="50px">
						<a href="/home/product_info" title="运动衣">
							<img src="/uploads/product/4.jpg" alt="运动衣" class="img-thumbnail" />
						</a>
						<p class="product_title">
							<a href="/home/product_info" title="运动衣">运动衣</a>
						</p>
					</div>
					<div class="col-sm-4 col-md-4 col-mm-6 product_img" data-move-y="50px">
						<a href="/home/product_info" title="瑜伽服">
							<img src="/uploads/product/5.jpg" alt="瑜伽服" class="img-thumbnail" />
						</a>
						<p class="product_title">
							<a href="/home/product_info" title="瑜伽服">瑜伽服</a>
						</p>
					</div>
					<div class="col-sm-4 col-md-4 col-mm-6 product_img" data-move-y="50px">
						<a href="/home/product_info" title="儿童泳衣">
							<img src="/uploads/product/6.jpg" alt="儿童泳衣" class="img-thumbnail" />
						</a>
						<p class="product_title">
							<a href="/home/product_info" title="儿童泳衣">儿童泳衣</a>
						</p>
					</div>
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
									<?=CONFIG($this->LAN)["index_about"]?>
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
						<div class="col-sm-4 col-md-4 news_img" data-move-y="50px">
							<a href="/home/news_detail" title="为生活提供更舒适、更健康、更美的产品">
								<img src="/uploads/news/1.jpg" alt="为生活提供更舒适、更健康、更美的产品" class="opacity_img">
							</a>
							<p class="news_title">
								<a href="/home/news_detail" title="为生活提供更舒适、更健康、更美的产品">为生活提供更舒适、更健康、更美的产品</a>
							</p>
							<p class="news_desc">“勇于实践，不断创新，客户满意，信誉第一”是“华瑞公司”不懈的追求。华瑞针织能满足不同客户要求，能确保在客户规定的时间内完成...</p>
						</div>
						<div class="col-sm-4 col-md-4 news_img" data-move-y="50px">
							<a href="/home/news_detail" title="华瑞是一个富有激情和理想的团队">
								<img src="/uploads/news/2.jpg" alt="华瑞是一个富有激情和理想的团队" class="opacity_img">
							</a>
							<p class="news_title">
								<a href="/home/news_detail" title="华瑞是一个富有激情和理想的团队">华瑞是一个富有激情和理想的团队</a>
							</p>
							<p class="news_desc">华瑞是一个富有激情和理想的团队，充满着追求创新的进取精神，在中国染整行业的发展道路上，华瑞扮演着极其重要的角色。“用心感悟...</p>
						</div>
						<div class="col-sm-4 col-md-4 news_img" data-move-y="50px">
							<a href="/home/news_detail" title="华瑞针织实业有限公司">
								<img src="/uploads/news/3.jpg" alt="华瑞针织实业有限公司" class="opacity_img">
							</a>
							<p class="news_title">
								<a href="/home/news_detail" title="华瑞针织实业有限公司">华瑞针织实业有限公司</a>
							</p>
							<p class="news_desc">博罗县华瑞针织实业有限公司创办于1995年，前身是汕头市金晨织造有限公司，公司一关以竭诚服务，努力为用户创造价值为宗旨，凭借出...</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("layout/footer")?>
</body>
</html>