<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>@yield('title')</title>

    <link href="/static/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

    <link href="/static/Home/css/personal.css" rel="stylesheet" type="text/css">


    @section('static')
    @show

    <script src="/static/Home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/static/Home/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>

</head>

<body>
<!--头 -->
<header>
    <article>
        <div class="mt-logo">
            <!--顶部导航条 -->
            <div class="am-container header">
                <ul class="message-l">
                    <div class="topMessage">
                        @if(session('user'))
                            <div class="menu-hd">
                                欢迎你
                                <a href="/personal" target="_top" style="color: #f00;">
                                    {{session('user')->name}}
                                </a>

                                <a href="/exit">退出</a>
                            </div>
                        @else

                            <div class="menu-hd">
                                <a href="/login" target="_top" class="h">
                                    亲，请登录
                                </a>
                                <a href="/regist" target="_top">
                                    免费注册
                                </a>
                            </div>
                        @endif
                    </div>
                </ul>
                <ul class="message-r">
                    <div class="topMessage home">
                        <div class="menu-hd">
                            <a href="/" target="_top" class="h">
                                商城首页
                            </a>
                        </div>
                    </div>
                    <div class="topMessage my-shangcheng">
                        <div class="menu-hd MyShangcheng">
                            <a href="/personal" target="_top">
                                <i class="am-icon-user am-icon-fw"></i>个人中心
                            </a>
                        </div>
                    </div>
                    <div class="topMessage mini-cart">
                        <div class="menu-hd">
                            <a id="mc-menu-hd" href="/cart" target="_top">
                                <i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong
                                        id="J_MiniCartNum" class="h">0</strong>
                            </a>
                        </div>
                    </div>
                    <div class="topMessage favorite">
                        <div class="menu-hd">
                            <a href="/collectlist" target="_top">
                                <i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span>
                            </a>
                        </div>
                </ul>
            </div>

            <!--悬浮搜索框-->

            <div class="nav white">
                <div class="logoBig">
                    <li>
                        <a href="/"><img src="/static/Home/images/logobig.png"/></a>
                    </li>
                </div>

                <div class="search-bar pr">
                    <a name="index_none_header_sysc" href="#"></a>
                    <form action="/goodslist" method="get">
                        <input id="searchInput" name="ss" type="text" placeholder="搜索" autocomplete="off">
                        <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                    </form>
                </div>
            </div>

            <div class="clear"></div>
        </div>
        </div>
    </article>
</header>

<div class="center">
    <div class="col-main">
    @section('content')
    @show


    <!--底部-->
        <div class="footer">
            <div class="footer-hd">
                <p>
                    <a href="#">
                        恒望科技
                    </a>
                    <b>|</b>
                    <a href="#">
                        商城首页
                    </a>
                    <b>|</b>
                    <a href="#">
                        支付宝
                    </a>
                    <b>|</b>
                    <a href="#">
                        物流
                    </a>
                    <b>|</b>
                    <a href="/relinks">链接申请</a>
                    <span class="links">
								
							</span>

                    <b>|</b>
                </p>
            </div>
            <div class="footer-bd">
                <p>
                    <a href="#">
                        关于恒望
                    </a>
                    <a href="#">
                        合作伙伴
                    </a>
                    <a href="#">
                        联系我们
                    </a>
                    <a href="#">
                        网站地图
                    </a>
                    <em>© 2015-2025 Hengwang.com 版权所有</em>
                </p>
            </div>
        </div>
    </div>

    <aside class="menu">
    @section('list')
        <!--左侧列表-->
            <ul>
                <li class="person">
                    <a href="/personal" style="color: #f00;">
                        个人中心
                    </a>
                </li>
                <li class="person">
		<span style="font-size: 18px;">
			个人资料
		</span>
                    <ul>
                        <li>
                            <a href="/personal/{{session('user')->user_id}}/edit">
                                个人信息
                            </a>
                        </li>
                        <li>
                            <a href="/personalsafety">
                                安全设置
                            </a>
                        </li>
                        <li>
                            <a href="/personaladdress">
                                收货地址
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="person">
		<span style="font-size: 18px;">
			我的交易
		</span>
                    <ul>
                        <li>
                            <a href="/order_management">
                                订单管理
                            </a>
                        </li>
                        <li>
                            <a href="/refundx">
                                退款售后
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="person">
		<span style="font-size: 18px;">
			我的资产
		</span>
                    <ul>
                        <li>
                            <a href="coupon.html">
                                优惠券
                            </a>
                        </li>
                        <li>
                            <a href="bonus.html">
                                红包
                            </a>
                        </li>
                        <li>
                            <a href="bill.html">
                                账单明细
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="person">
		<span style="font-size: 18px;">
			我的小窝
		</span>
                    <ul>
                        <li>
                            <a href="/collectlist">
                                收藏
                            </a>
                        </li>
                        <li>
                            <a href="/history">
                                足迹
                            </a>
                        </li>
                        <li>
                            <a href="/comment">
                                评价
                            </a>
                        </li>
                        <li>
                            <a href="news.html">
                                消息
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @show
    </aside>
</div>

</body>
@foreach ($errors->all() as $error)
<div class="baocuo" style=" position: fixed; top: 0; left: 40%; width: 20%; height: 80px; background: #FE7C96; line-height: 80px;text-align: center; color: #fff;">{{$error}}</div>
@endforeach
@if(session('error'))
<div class="baocuo" style=" position: fixed; top: 0; left: 40%; width: 20%; height: 80px; background: #FE7C96; line-height: 80px;text-align: center; color: #fff;">{{session('error')}}</div>
@endif
@if(session('success'))
<div class="baocuo" style=" position: fixed; top: 0; left: 40%; width: 20%; height: 80px; background: #1CCFB4; line-height: 80px;text-align: center; color: #fff;">{{session('success')}}</div>
@endif
<script type="text/javascript">
	$('.baocuo').click(function() {
		$(this).css('display','none');
	});
</script>
<script type="text/javascript">

    $.get("/links", function (links) {
        //alert(links);
        $('.links').html(links);
    });

</script>
</body>
</html>