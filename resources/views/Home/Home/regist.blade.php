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
			<a href="home/demo.html">
				<img alt="" src="/static/Home/images/logobig.png" />
			</a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg">
					<span></span>
					<img src="/static/Home/images/big.jpg" />
				</div>
				<div class="login-box">

					<div class="am-tabs" id="doc-my-tabs">
						<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
							<li class="am-active">
								<a href="">
									邮箱注册
								</a>
							</li>
							<li>
								<a href="">
									手机号注册
								</a>
							</li>
						</ul>
									@if(session('error'))
									<div style="font-size: 12px; color: #f00; ">　　　　　　　 　　　{{session('error')}}</div>
									@endif
									@if(session('success'))
									<div style="font-size: 12px; color: #0f0; ">　　　　　　　 　　　{{sesstion('success')}}</div>
									@endif
						<div class="am-tabs-bd">
							<div class="am-tab-panel am-active">
								<form method="post">

									<div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="email" name="" class="email" id="email" placeholder="请输入邮箱账号">
									</div>
									<div class="user-pass">
										<label for="password"><i class="am-icon-lock"></i></label>
										<input type="password" name="" id="password" placeholder="设置密码">
									</div>
									<div class="user-pass">
										<label for="passwordRepeat"><i class="am-icon-lock"></i></label>
										<input type="password" name="" id="passwordRepeat" placeholder="确认密码">
									</div>


								</form>
								<div class="login-links">
									<label for="reader-me">
									<input id="reader-me" type="checkbox">
									点击表示您同意商城《服务协议》 </label>
								</div>
								<div class="am-cf">
									<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
								</div>

							</div>


							<div class="am-tab-panel">
								<form action="/register" id="formt" method="post">

									<div class="user-phone">
										<label for="phone"><i class="am-icon-user am-icon-fw"></i></label>
										<input type="text" name="name" value="{{old('name')}}" id="name" class="name" placeholder="请输入用户名">
									</div>
									<span style="font-size: 12px; color: #f00; " class="ebool">{{$errors->first('name')}}</span>
									<div class="user-phone">
										<label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
										<input type="tel" name="phone" value="{{old('phone')}}" id="phone" class="phone" placeholder="请输入手机号">
									</div>
									<span style="font-size: 12px; color: #f00; " class="ebool">{{$errors->first('phone')}}</span>
									<div class="user-phone">
										<label for="code"><i class="am-icon-code-fork"></i></label>
										<input type="tel" name="" class="mecode" style="width: 180px;" placeholder="请输入验证码">
										<input id="dyMobileButton" class="dycode" type="button" style="width: 100px; display: inline;" value="获取验证码">
									</div>
									<span style="font-size: 12px; color: #f00; "></span>
									<div class="user-pass">
										<label for="password"><i class="am-icon-lock"></i></label>
										<input type="password" name="password" class="pepassword" id="password" placeholder="设置密码">
									</div>
									<span style="font-size: 12px; color: #f00; " class="ebool">{{$errors->first('password')}}</span>
									<div class="user-pass">
										<label for="passwordRepeat"><i class="am-icon-lock"></i></label>
										<input type="password" name="repassword" class="repassword" id="passwordRepeat" placeholder="确认密码">
									</div>
									<span style="font-size: 12px; color: #f00; " class="ebool">{{$errors->first('repassword')}}</span>
               					 {{csrf_field()}}
								</form>
								<div class="login-links">
									<label for="reader-me">
									<input id="reader-me" class="readerme" type="checkbox">
									点击表示您同意商城《服务协议》 </label>
								</div>
								<div class="am-cf" >
									<input type="submit" id="submit" disabled value="注册" class="am-btn am-btn-primary am-btn-sm am-fl button">
								</div>

								<hr>
							</div>
<script>
      $('#submit').click(function() {
        $('#formt').submit();
      });
</script>
<script>
	$(function() {
	$('#doc-my-tabs').tabs();
	})
</script>
<!--执行手机注册-->
<script type="text/javascript">
//	手机号码验证
	var bool = false;
//	密码验证
	var bool1 = false;
//	确认密码验证
	var bool2 = false;
//	同意协议验证
	var bool3 = false;
//	手机验证码验证
	var bool4 = false;
//	用户名验证
	var bool5 = false;
//	存储发送验证码的手机号码
	var phones = '';
	var a = 0;
//	协议验证
	$('.readerme').click(function() {
		if(a%2 == 0) {
			bool3 = true;
		} else {
			bool3 = false;
		}
		a++;
		reg();
	});
//	声明注册按钮禁用
	$(".button").attr('disabled','true');
//	执行手机号码验证
	$(".phone").blur(function() {
//		获取手机号码
		var str = $(this).val();
		bool = false;
//		进行判断
		if($(this).val() == '') {
			$(this).parent('div').next().html('*手机号码不能为空');
		}else if(str.match(/\d{11}/) == null) {
			$(this).parent('div').next().html('*手机格式错误');
		} else {
			bool = true;
			$(this).parent('div').next().html('');
		}
		reg();
	});
//	执行用户名验证
	$(".name").blur(function() {
//		获取用户名
		var str = $(this).val();
		bool5 = false;
//		进行判断
		if($(this).val() == '') {
			$(this).parent('div').next().html('*用户名不能为空');
		}else if(str.match(/\w{5,10}/) == null) {
			$(this).parent('div').next().html('*用户名为5-10位数字字母下划线');
		} else {
			bool5 = true;
			$(this).parent('div').next().html('');
		}
		reg();
	});
//	执行密码验证
	$(".pepassword").blur(function() {
//		获取密码
		var str = $(this).val();
		bool1 = false;
//		判断
		if($(this).val() == '') {
			$(this).parent('div').next().html('*密码不能为空');
		}else if(str.match(/\w{6,18}/) == null) {
			$(this).parent('div').next().html('*密码为6-18位数字字母下划线组成');
		} else {
			bool1 = true;
			$(this).parent('div').next().html('');
		}
		reg();
	});
//	执行确认密码验证
	$(".repassword").blur(function() {
//		获取确认密码
		var str = $(this).val();
		var pass = $(".pepassword").val();
		bool2 = false;
//		判断
		if($(this).val() == '') {
			$(this).parent('div').next().html('*确认密码不能为空');
		}else if(pass != str) {
			$(this).parent('div').next().html('*两次密码不一致');
		}else {
			bool2 = true;
			$(this).parent('div').next().html('');
		}
		reg();
	});
//	发送手机验证码
	$(".dycode").click(function() {
		
	obj = $(this);
//	按钮倒计时
	num = 120;
		time = setInterval(function() {
			obj.val("(" + num + ")重新发送");
			obj.attr('disabled', true);
			if(num == 0) {
				clearInterval(time);
				obj.val("重新发送");
				obj.removeAttr('disabled');
			}
			num--;
		}, 1000);
//		判断是否发送成功
		phone = $("#phone").val();
		$.get("/rephone", { phone: phone }, function(result) {
			if(result.code == '000000') {
				phones = result.mobile;
				obj.parent('div').next().html('');
			} else {
				obj.parent('div').next().html('*发送失败');
//				clearInterval(time);
//				obj.val("重新发送");
//				obj.removeAttr('disabled');
			}
		}, 'json');
	});
//	执行手机验证码验证
	$(".mecode").blur(function() {
		obj1 = $(this);
		yzm =  obj1.val();
//		获取当前手机号码
		ph = $('.phone').val();
		bool4 = false;
//		判断手机号码是否被更改
		if(ph == phones) {
//			执行验证码校验
			$.get("/mecode", { yzm: yzm }, function(result) {
				switch(result){
					case '1':
						bool4 = true;
						obj1.parent('div').next().html('验证码正确').css('color','green');
						break;
					case '2':
						obj1.parent('div').next().html('*验证码错误').css('color','red');
						break;
					case '3':
						obj1.parent('div').next().html('*验证码不能为空').css('color','red');
						break;
					default:
						obj1.parent('div').next().html('*验证码发送失败或过期').css('color','red');
						break;
				}
				reg();
			});
		} else {
			obj1.parent('div').next().html('发送验证码的手机号码被更改').css('color','red');
		}
	});
	
	
	function reg() {
		if(bool && bool1 && bool2 && bool3 && bool4 && bool5) {
			$(".button").removeAttr('disabled');
		} else {			
			$(".button").attr('disabled','true');
		}
	}
</script>	
						</div>
					</div>

				</div>
			</div>

			<div class="footer ">
				<div class="footer-hd ">
					<p>
						<a href="# ">
							恒望科技
						</a>
						<b>|</b>
						<a href="# ">
							商城首页
						</a>
						<b>|</b>
						<a href="# ">
							支付宝
						</a>
						<b>|</b>
						<a href="# ">
							物流
						</a>
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
	</body>

</html>