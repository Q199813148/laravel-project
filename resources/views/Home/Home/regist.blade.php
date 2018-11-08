<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/static/Home/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/static/Home/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/static/Home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/static/Home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="/index"><img alt="" src="/static/Home/images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/static/Home/images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="/static/Home/">邮箱注册</a></li>
							
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">
									<form action="/index/register" method="post">
									{{csrf_field()}}
								<div class="user-pass">
								    <label for="name"><i class="am-icon-lock"></i></label>
								    <input type="name" name="name" id="name" placeholder="请设置名字">
                 </div>		
							   <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                 </div>										
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="password" placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="passwordRepeat" id="passwordRepeat" placeholder="确认密码">
                 </div>	
                 <button class="am-btn am-btn-primary am-btn-sm am-fl" type="submit">注册</button>
                 </form>
                 
								 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
										</label>
							  	</div>
										

								</div>

								
								
									<hr>
								</div>

								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>

							</div>
						</div>

				</div>
			</div>
			
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="/static/Home/# ">恒望科技</a>
								<b>|</b>
								<a href="/static/Home/# ">商城首页</a>
								<b>|</b>
								<a href="/static/Home/# ">支付宝</a>
								<b>|</b>
								<a href="/static/Home/# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="/static/Home/# ">关于恒望</a>
								<a href="/static/Home/# ">合作伙伴</a>
								<a href="/static/Home/# ">联系我们</a>
								<a href="/static/Home/# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>
	</body>

</html>