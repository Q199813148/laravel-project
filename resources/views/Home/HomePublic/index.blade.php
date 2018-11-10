<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>首页</title>

		<link href="/static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/static/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/static/Home/basic/css/demo.css" rel="stylesheet" type="text/css" />


		<link href="/static/Home/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/static/Home/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/static/Home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/static/Home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>
		<div class="hmtop">
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						@if(session('user'))
						<div class="menu-hd">
							<a href="#" target="_top" class="h">
								{{session('user')->name}}
							</a>
							<a class="dropdown-item" href="/exit">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                 退出
              </a>
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
							<a href="#" target="_top" class="h">
								商城首页
							</a>
						</div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng">
							<a href="#" target="_top">
								<i class="am-icon-user am-icon-fw"></i>个人中心
							</a>
						</div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd">
							<a id="mc-menu-hd" href="#" target="_top">
								<i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong>
							</a>
						</div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd">
							<a href="#" target="_top">
								<i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span>
							</a>
						</div>
				</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo">
					<img src="/static/Home/images/logo.png" />
				</div>
				<div class="logoBig">
					<li>
						<img src="/static/Home/images/logobig.png" />
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
		@section('adminshows')

		@show
		<div class="shopNav">
			<div class="slideall">

				<div class="long-title">
					<span class="all-goods">全部分类</span>
				</div>
				<div class="nav-cont">
					<ul>
						<li class="index">
							<a href="#">
								首页
							</a>
						</li>
						<li class="qc">
							<a href="#">
								闪购
							</a>
						</li>
						<li class="qc">
							<a href="#">
								限时抢
							</a>
						</li>
						<li class="qc">
							<a href="#">
								团购
							</a>
						</li>
						<li class="qc last">
							<a href="#">
								大包装
							</a>
						</li>
					</ul>
					<div class="nav-extra">
						<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利 <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
					</div>
				</div>

				<!--侧边导航 -->
				@section('types')

				@show

				<!--轮播-->

				<script type="text/javascript">(function() {
	$('.am-slider').flexslider();
});
$(document).ready(function() {
	$("li").hover(function() {
		$(".category-content .category-list li.first .menu-in").css("display", "none");
		$(".category-content .category-list li.first").removeClass("hover");
		$(this).addClass("hover");
		$(this).children("div.menu-in").css("display", "block")
	}, function() {
		$(this).removeClass("hover")
		$(this).children("div.menu-in").css("display", "none")
	});
})</script>

				<!--小导航 -->
				<div class="am-g am-g-fixed smallnav">
					<div class="am-u-sm-3">
						<a href="sort.html">
							<img src="/static/Home/images/navsmall.jpg" />
							<div class="title">
								商品分类
							</div>
						</a>
					</div>
					<div class="am-u-sm-3">
						<a href="#">
							<img src="/static/Home/images/huismall.jpg" />
							<div class="title">
								大聚惠
							</div>
						</a>
					</div>
					<div class="am-u-sm-3">
						<a href="#">
							<img src="/static/Home/images/mansmall.jpg" />
							<div class="title">
								个人中心
							</div>
						</a>
					</div>
					<div class="am-u-sm-3">
						<a href="#">
							<img src="/static/Home/images/moneysmall.jpg" />
							<div class="title">
								投资理财
							</div>
						</a>
					</div>
				</div>

				<!--走马灯 -->
				<!--个人中心-->
				@section('personal')

				@show
				<div class="clear"></div>
			</div>
			<script type="text/javascript">if($(window).width() < 640) {
	function autoScroll(obj) {
		$(obj).find("ul").animate({
			marginTop: "-39px"
		}, 500, function() {
			$(this).css({
				marginTop: "0px"
			}).find("li:first").appendTo(this);
		})
	}
	$(function() {
		setInterval('autoScroll(".demo")', 3000);
	})
}</script>
		</div>
		<div class="shopMainbg">
			<div class="shopMain" id="shopmain">

				<!--今日推荐 -->
				@section('recommend')

				@show
				<div class="clear "></div>
				<!--热门活动 -->
				@section('activity')

				@show
				<div class="clear "></div>

				<!--商品列表-->
				@section('goods')

				@show

				<div class="footer ">
					<div class="footer-hd ">
						<p>
							<b>|</b>
							<a href="# ">恒望科技</a>
							<b>|</b>
							<a href="# ">商城首页</a>
							<b>|</b>
							<a href="# ">支付宝</a>
							<b>|</b>
							<a href="# ">友情链接</a>
							<b>|</b>
							<a href="# ">友情链接</a>
							<b>|</b>
							<a href="# ">友情链接</a>
							<b>|</b>
							<a href="# ">友情链接</a>
							<b>|</b>
							<a href="# ">友情链接</a>
							<b>|</b>
							<a href="# ">友情链接</a>
							<b>|</b>
							<a href="# ">友情链接</a>
							<b>|</b>
						</p>
					</div>
					<div class="footer-bd ">
						<p>
							<a href="# ">
								关于恒望
							</a>
							<a href="# ">
								合作伙伴
							</a>
							<a href="# ">
								联系我们
							</a>
							<a href="# ">
								网站地图
							</a>
							<em>© 2015-2025 Hengwang.com 版权所有</em>
						</p>
					</div>
				</div>

			</div>
		</div>
		<!--引导 -->
		<div class="navCir">
			<li class="active">
				<a href="home.html">
					<i class="am-icon-home "></i>首页
				</a>
			</li>
			<li>
				<a href="sort.html">
					<i class="am-icon-list"></i>分类
				</a>
			</li>
			<li>
				<a href="shopcart.html">
					<i class="am-icon-shopping-basket"></i>购物车
				</a>
			</li>
			<li>
				<a href="person/index.html">
					<i class="am-icon-user"></i>我的
				</a>
			</li>
		</div>

		<!--菜单 -->
		<div class=tip>
			<div id="sidebar">
				<div id="wrap">
					<div id="prof" class="item personal">
						<a href="# ">
							<span class="setting "></span>
						</a>
						@if(session('user'))
						<div class="ibar_login_box status_login personals">
							<div class="avatar_box ">
								<p class="avatar_imgbox ">
									<img src="/static/Home/images/no-img_mid_.jpg " />
								</p>
								<ul class="user_info ">
									<li>
										用户名:{{session('user')->name}}
									</li>
									@if(session('user')->level == 1)
									<li>
										级&nbsp;别:VIP会员
									</li>
									@else
									<li>
										级&nbsp;别:普通会员
									</li>
									@endif
								</ul>
							</div>
							<div class="login_btnbox ">
								<a href="# " class="login_order ">
									我的订单
								</a>
								<a href="# " class="login_favorite ">
									我的收藏
								</a>
							</div>
							<i class="icon_arrow_white "></i>
						</div>
						@else
						<div class="ibar_login_box status_login personals">
							<div class="avatar_box ">
								<p class="avatar_imgbox ">
									<img src="/static/Home/images/no-img_mid_.jpg " />
								</p>
								<ul class="user_info ">
									<li>
										用户名sl1903
									</li>
									<li>
										级&nbsp;别:普通会员
									</li>
								</ul>
							</div>
							<div class="login_btnbox ">
								<a href="# " class="login_order ">
									我的订单
								</a>
								<a href="# " class="login_favorite ">
									我的收藏
								</a>
							</div>
							<i class="icon_arrow_white "></i>
						</div>
						@endif
					</div>
					<div id="shopCart " class="item ">
						<a href="# ">
							<span class="message "></span>
						</a>
						<p>
							购物车
						</p>
						<p class="cart_num ">
							0
						</p>
					</div>
					<div id="asset " class="item ">
						<a href="# ">
							<span class="view "></span>
						</a>
						<div class="mp_tooltip ">
							我的资产
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="foot " class="item ">
						<a href="# ">
							<span class="zuji "></span>
						</a>
						<div class="mp_tooltip ">
							我的足迹
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="brand " class="item ">
						<a href="#">
							<span class="wdsc ">
							<img src="/static/Home/images/wdsc.png " />
							</span>
						</a>
						<div class="mp_tooltip ">
							我的收藏
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="broadcast " class="item ">
						<a href="# ">
							<span class="chongzhi ">
							<img src="/static/Home/images/chongzhi.png " />
							</span>
						</a>
						<div class="mp_tooltip ">
							我要充值
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div class="quick_toggle ">
						<li class="qtitem ">
							<a href="# ">
								<span class="kfzx "></span>
							</a>
							<div class="mp_tooltip ">
								客服中心<i class="icon_arrow_right_black "></i>
							</div>
						</li>
						<!--二维码 -->
						<li class="qtitem ">
							<a href="#none ">
								<span class="mpbtn_qrcode "></span>
							</a>
							<div class="mp_qrcode " style="display:none; ">
								<img src="/static/Home/images/weixin_code_145.png " />
								<i class="icon_arrow_white "></i>
							</div>
						</li>
						<li class="qtitem ">
							<a href="#top " class="return_top ">
								<span class="top "></span>
							</a>
						</li>
					</div>

					<!--回到顶部 -->
					<div id="quick_links_pop " class="quick_links_pop hide "></div>

				</div>

			</div>
			<div id="prof-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					我
				</div>
			</div>
			<div id="shopCart-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					购物车
				</div>
			</div>
			<div id="asset-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					资产
				</div>

				<div class="ia-head-list ">
					<a href="# " target="_blank " class="pl ">
						<div class="num ">
							0
						</div>
						<div class="text ">
							优惠券
						</div>
					</a>
					<a href="# " target="_blank " class="pl ">
						<div class="num ">
							0
						</div>
						<div class="text ">
							红包
						</div>
					</a>
					<a href="# " target="_blank " class="pl money ">
						<div class="num ">
							￥0
						</div>
						<div class="text ">
							余额
						</div>
					</a>
				</div>

			</div>
			<div id="foot-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					足迹
				</div>
			</div>
			<div id="brand-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					收藏
				</div>
			</div>
			<div id="broadcast-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					充值
				</div>
			</div>
		</div>
		<script>window.jQuery || document.write('<script src="/static/Home/basic/js/jquery.min.js "><\/script>');</script>
		<script type="text/javascript " src="/static/Home/basic/js/quick_links.js "></script>
	</body>
</html>