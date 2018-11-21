<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录-零食么</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="/static/Home/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/static/Home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="/"><img alt="logo" src="/static/Home/images/logobig.png" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="/static/Home/images/big.jpg" /></div>
				<div class="login-box">

							<h3 class="title">登录商城</h3>

							<div class="clear"></div>
						
						<div class="login-form">
						  <form class="" action="/dologin" method="post">
							   <div class="user-name">
								    <label for="user"><i class="am-icon-user"></i></label>
								    <input type="text" name="name" id="user" placeholder="邮箱/手机/用户名" value="{{old('name')}}">
                 				</div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="password" placeholder="请输入密码">
                 </div>
                 
              
           </div>
            <div class="form-group">
                  <img  title="点击刷新" src="/static/Admin/yzm/captcha.php" align="absbottom" onclick="this.src='/static/Admin/yzm/captcha.php?'+Math.random();"></img> 
						      @if(session('error'))
						      <span class="text-danger">{{session('error')}}</span>
						      @endif 
                  <br />
							<input type="text" name="code"  placeholder="验证码">
                </div>
            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
								<a href="/forgetpass" class="am-fr">忘记密码</a>
								<a href="/regist" class="zcnext am-fr am-btn-default">注册</a>
								<br />
            </div>
            {{csrf_field()}}
								<div class="am-cf">
									<input type="submit" name="submint" value="登 录" class="am-btn am-btn-primary am-btn-sm">
								</div>
						<div class="partner">		
								<h3>合作账号</h3>
							<div class="am-btn-group">
								<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
								<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
								<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
							</div>
						</div>	
						</form>
				</div>
			</div>
		</div>


					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="/map">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>
	</body>
@if(session('success'))
<div class="baocuo" style=" position: fixed; top: 0; left: 40%; width: 20%; height: 80px; background: #1CCFB4; line-height: 80px;text-align: center; color: #fff;">{{session('success')}}</div>
@endif
<script type="text/javascript">
	$('.baocuo').click(function() {
		$(this).css('display','none');
	});
</script>
</html>