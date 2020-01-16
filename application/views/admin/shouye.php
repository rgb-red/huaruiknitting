<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>首页</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layui/css/admin.css" media="all"></head>
<body>
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md8">
                <div class="layui-row layui-col-space15">
                    <div class="layui-col-md6">
                        <div class="layui-card">
                            <div class="layui-card-header">快捷方式</div>
                            <div class="layui-card-body">
                                <div class="layui-carousel layadmin-carousel layadmin-shortcut">
                                    <div carousel-item>
                                        <ul class="layui-row layui-col-space10">
                                            <li class="layui-col-xs3">
                                                <a lay-href="/admin/info" target="_blank">
                                                    <i class="layui-icon layui-icon-website"></i>
                                                    <cite>站点设置</cite>
                                                </a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a lay-href="/admin/slide">
                                                    <i class="layui-icon layui-icon-picture"></i>
                                                    <cite>轮播图</cite></a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a lay-href="/admin/product_list">
                                                    <i class="layui-icon layui-icon-release"></i>
                                                    <cite>产品列表</cite></a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a lay-href="/admin/edit_product">
                                                    <i class="layui-icon layui-icon-auz"></i>
                                                    <cite>发表产品</cite></a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a lay-href="/admin/news">
                                                    <i class="layui-icon layui-icon-template-1"></i>
                                                    <cite>新闻列表</cite></a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a lay-href="/admin/contact">
                                                    <i class="layui-icon layui-icon-survey"></i>
                                                    <cite>留言管理</cite></a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a lay-href="/admin/user">
                                                    <i class="layui-icon layui-icon-user"></i>
                                                    <cite>个人中心</cite></a>
                                            </li>
                                            <li class="layui-col-xs3">
                                                <a href="https://hscnote.com" target="_blank">
                                                    <i class="layui-icon layui-icon-tips"></i>
                                                    <cite>版权</cite></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-sm6">
                        <div class="layui-card">
                            <div class="layui-card-header">PV / UV</div>
                            <div class="layui-card-body layuiadmin-card-list">
                                <p class="layuiadmin-big-font">9,999,666</p>
                                <p>
                                    访问量 (PV)
                                    <span class="layuiadmin-span-color">
                                        88万 
                                        <span class="layui-badge layui-bg-green">月</span>
                                    </span>
                                </p>
                                <p>&nbsp;</p>
                                <p class="layuiadmin-big-font">9,999,666</p>
                                <p>
                                    访问人数 (UV)
                                    <span class="layuiadmin-span-color">
                                        88万 
                                        <span class="layui-badge layui-bg-blue">月</span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-md12">
                        <div class="layui-card">
                            <div class="layui-tab layui-tab-brief layadmin-latestData">
                                <ul class="layui-tab-title">
                                    <li class="layui-this">热门产品</li>
                                    <li>热门新闻</li>
                                </ul>
                                <div class="layui-tab-content">
                                    <div class="layui-tab-item layui-show">
                                        <table id="LAY-index-product"></table>
                                    </div>
                                    <div class="layui-tab-item">
                                        <table id="LAY-index-news"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md4">
                <div class="layui-card">
                    <div class="layui-card-header">版本信息</div>
                    <div class="layui-card-body layui-text">
                        <table class="layui-table">
                            <colgroup>
                                <col width="100">
                                    <col></colgroup>
                            <tbody>
                                <tr>
                                    <td>当前版本</td>
                                    <td>V 1.0</td>
                                </tr>
                                <tr>
                                    <td>基于框架</td>
                                    <td>HEnter（QQ：390798960）</td>
                                </tr>
                                <tr>
                                    <td>主要特色</td>
                                    <td>企业官网 / 后台 / 响应式 / 清爽 / 极简</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="layui-card">
                    <div class="layui-card-header">效果报告</div>
                    <div class="layui-card-body layadmin-takerates">
                        <div class="layui-progress" lay-showPercent="yes">
                            <h3>转化率（日同比 28%
                                <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
                            <div class="layui-progress-bar" lay-percent="65%"></div>
                        </div>
                        <div class="layui-progress" lay-showPercent="yes">
                            <h3>签到率（日同比 11%
                                <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
                            <div class="layui-progress-bar" lay-percent="32%"></div>
                        </div>
                    </div>
                </div>
                <div class="layui-card">
                    <div class="layui-card-header">实时监控</div>
                    <div class="layui-card-body layadmin-takerates">
                        <div class="layui-progress" lay-showPercent="yes">
                            <h3>CPU使用率</h3>
                            <div class="layui-progress-bar" lay-percent="58%"></div>
                        </div>
                        <div class="layui-progress" lay-showPercent="yes">
                            <h3>内存占用率</h3>
                            <div class="layui-progress-bar layui-bg-red" lay-percent="90%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/layui/js/layui.js"></script>
    <script>layui.config({base: '/layui/js/'}).extend({index: 'lib/index'}).use(['index', 'console']);</script>
</body>
</html> -->