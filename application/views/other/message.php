<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>在线留言 - 博罗县华瑞针织实业有限公司</title>
    <meta name="keywords" content="资质证书,内衣超薄面料,内衣提花面料,内衣网布,睡衣,功能性面料" />
    <meta name="description" content="资质证书,博罗县华瑞针织实业有限公司," />
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
    <div class="page_bg" style="background: url(/images/detail_bg.jpg) center top no-repeat;"></div>
    <div class="bread_bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="bread_nav">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <a href='/'>主页</a>>
                        <a href='javascript:;'>在线留言</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- left -->
            <div class="col-xs-12 col-sm-4 col-md-3">
                <h3 class="left_h3">
                    <span>在线留言</span>
                </h3>
                <div class="left_column">
                    <ul class="left_nav_ul" id="firstpane">
                        <li><a href="javascript:;" class="biglink left_active">留言板</a></li>
                    </ul>
                </div>
                <?php $this->load->view("layout/news_sidebar")?>
            </div>
            <!-- right -->
            <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
                <div class="right_head">
                    <h2><span>留言板</span></h2>
                </div>
                <div class="right_contents">
                    <div class="met-feedback-body">
                        <form action="#" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <div><input name="name" id="name" class="form-control" type="text" placeholder="您的姓名"></div>
                            </div>
                            <div class="form-group">
                                <div><input name="tel" id="tel" class="form-control" type="text" placeholder="联系电话"></div>
                            </div>
                            <div class="form-group">
                                <div><input name="email" id="email" class="form-control" type="text" placeholder="您的邮箱"></div>
                            </div>
                            <div class="form-group">
                                <div><textarea name="content" id="content" class="form-control" placeholder="反馈内容" rows="5"></textarea></div>
                            </div>
                            <div class="form-group col-xs-9 col-sm-9 col-md-9">
                                <div><input name="vcode" id="vcode" class="form-control" type="text" placeholder="验证码"></div>
                            </div>
                            <div class="form-group col-xs-3 col-sm-3 col-md-3">
                                <div style="text-align:center"><img src="/captcha/1576935389.7031.jpg"></div>
                            </div>
                            <div class="form-group margin-bottom-0">
                                <input type="submit" class="btn btn-primary btn-lg btn-block btn-squared" value="提交" id="tj">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("layout/footer")?>
</body>
<script>
    $(function() {
        $('#tj').click(function() {
            if ($('#name').val() == '') {
                alert('请输入您的姓名！');
                $("#name").focus();
                return false;
            }
            if ($("#tel").val() == "") {
                alert("请输入你的手机！");
                $("#tel").focus();
                return false;
            }
            if (!$("#tel").val().match(/^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(16[0-9]{1})|(17[0-9]{1})|(18[0-9]{1})|(19[0-9]{1}))+\d{8})$/)) {
                alert("手机号码格式不正确！");
                $("#tel").focus();
                return false;
            }
            if ($("#email").val() == "") {
                alert("请输入电子邮箱!");
                return false;
            }
            if (!$("#email").val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)) {
                alert("电子邮箱格式不正确");
                $("#email").focus();
                return false;
            }
            if ($('#content').val() == '') {
                alert('请输入留言内容！');
                return false;
            }
        })
    })
</script>
</html>