<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>@yield('title')</title>

		<link href="/static/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/static/Home/css/personal.css" rel="stylesheet" type="text/css">
			

		<link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">


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
						<div class="logoBig">
							<li>
								<a href="/"><img src="/static/Home/images/logobig.png" /></a>
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
				@show
			</aside>
		</div>

	</body>

</html>