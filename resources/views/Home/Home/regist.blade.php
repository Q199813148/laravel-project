<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册-零食么</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/static/Home/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/static/Home/css/dlstyle.css" rel="stylesheet" type="text/css">
		<link href="/static/Home/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<script src="/static/Home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/static/Home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>
<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
												<div class="menu-hd">
							<a href="/login" target="_top" class="h">
								亲，请登录
							</a>
							<a href="/regist" target="_top">
								免费注册
							</a>
						</div>
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
							<a href="/login" target="_top">
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
				</div></ul>
			</div>
			
			
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
						<div class="am-tabs-bd">
							<div class="am-tab-panel am-active">
								<form action="/registemail" method="post" id="emform">

									<div class="user-phone">
										<label for="phone"><i class="am-icon-user am-icon-fw"></i></label>
										<input type="text" name="name" placeholder="@if(old('name')) {{old('name')}} @else 请输入用户名 @endif" id="name" class="emname">
									</div>
									<span style="font-size: 12px; color: #f00; " class="ebool">{{$errors->first('name')}}</span>
									<div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="email" name="email" class="email" placeholder="@if(old('email')) {{old('email')}} @else 请输入邮箱 @endif" id="email">
									</div>
									<span style="font-size: 12px; color: #f00; " class="ebool">{{$errors->first('email')}}</span>
									<div class="user-pass">
										<label for="password"><i class="am-icon-lock"></i></label>
										<input type="password" name="password" class="empassword" id="password" placeholder="设置密码">
									</div>
									<span style="font-size: 12px; color: #f00; " class="ebool">{{$errors->first('password')}}</span>
									<div class="user-pass">
										<label for="passwordRepeat"><i class="am-icon-lock"></i></label>
										<input type="password" name="repassword" class="emrepassword" id="passwordRepeat" placeholder="确认密码">
									</div>
									<span style="font-size: 12px; color: #f00; " class="ebool">{{$errors->first('repassword')}}</span>
               					 {{csrf_field()}}
								</form>
								<div class="login-links">
									<label for="reader-me">
								<input id="reader-me" class="l~1 pact" type="checkbox">
									点击表示您同意商城《服务协议》 </label>
								</div>
								<div class="am-cf">
									<input type="submit" form="emform" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl embutton">
								</div>

							</div>


							<div class="am-tab-panel">
								<form action="/register" id="formt" method="post">

									<div class="user-phone">
										<label for="phone"><i class="am-icon-user am-icon-fw"></i></label>
										<input type="text" name="name" placeholder="@if(old('name')) {{old('name')}} @else 请输入用户名 @endif" id="name" class="name" placeholder="请输入用户名">
									</div>
									<span style="font-size: 12px; color: #f00; " class="ebool">{{$errors->first('name')}}</span>
									<div class="user-phone">
										<label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
										<input type="tel" name="phone"  placeholder="@if(old('phone')) {{old('phone')}} @else 请输入手机号 @endif" id="phone" class="phone">
									</div>
									<span style="font-size: 12px; color: #f00; " class="ebool">{{$errors->first('phone')}}</span>
									<input type="hidden" name="lists" id="" class="feis" value="0" />
									<div class="user-phone">
										<label for="code"><i class="am-icon-code-fork"></i></label>
										<input type="tel" name="code" class="mecode" style="width: 180px;" placeholder="请输入验证码">
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
									<input type="hidden" name="err" id="" class="err" value="{{session('error')}}" />
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

<script type="text/javascript">
@if(session('error'))
err = $('.err').val();
alert(err);
@endif
</script>

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


<!--执行邮箱注册-->
<script type="text/javascript">
//	协议验证
	var bool = false;
//	邮箱验证
	var bool1 = false;
//	用户名验证
	var bool2 = false;
//	密码验证
	var bool3 = false;
//	确认密码验证
	var bool4 = false;
//	用于进行协议判断	
	var a = 0;
	
	$(".embutton").attr('disabled','true');
//	协议验证
	$('.pact').click(function() {
		if(a%2 == 0) {
			bool = true;
		} else {
			bool = false;
		}
		a++;
		reh();
	});
	
//	执行邮箱验证
	$(".email").blur(function() {
//		获取邮箱
		var str = $(this).val();
		bool1 = false;
//		进行判断
		if($(this).val() == '') {
			$(this).parent('div').next().html('*邮箱不能为空');
		}else if(str.match(/\w+@\w+\.\w+/) == null) {
			$(this).parent('div').next().html('*邮箱格式错误');
		} else {
			bool1 = true;
			$(this).parent('div').next().html('');
		}
		reh();
	});
	
//	执行用户名验证
	$(".emname").blur(function() {
//		获取用户名
		var str = $(this).val();
		bool2 = false;
//		进行判断
		if($(this).val() == '') {
			$(this).parent('div').next().html('*用户名不能为空');
		}else if(str.match(/\w{5,10}/) == null) {
			$(this).parent('div').next().html('*用户名为5-10位的数字字母下划线');
		} else {
			bool2 = true;
			$(this).parent('div').next().html('');
		}
		reh();
	});
//	执行密码验证
	$(".empassword").blur(function() {
//		获取用户名
		var str = $(this).val();
		bool3 = false;
//		进行判断
		if($(this).val() == '') {
			$(this).parent('div').next().html('*密码不能为空');
		}else if(str.match(/\w{6,18}/) == null) {
			$(this).parent('div').next().html('*密码为6-18位的数字字母下划线');
		} else {
			bool3 = true;
			$(this).parent('div').next().html('');
		}
		reh();
	});
	
//	执行确认密码验证
	$(".emrepassword").blur(function() {
//		获取确认密码
		var str = $(this).val();
		var pass = $(".empassword").val();
		bool4 = false;
//		判断
		if($(this).val() == '') {
			$(this).parent('div').next().html('*确认密码不能为空');
		}else if(pass != str) {
			$(this).parent('div').next().html('*两次密码不一致');
		}else {
			bool4 = true;
			$(this).parent('div').next().html('');
		}
		reh();
	});
	function reh() {
		if(bool && bool1 && bool2 && bool3 && bool4) {
			$(".embutton").removeAttr('disabled');
		} else {			
			$(".embutton").attr('disabled','true');
		}
	}
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
		}else if(str.match(/^\d{11}$/) == null) {
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
		bool4 = false;
//			执行验证码校验
			$.get("/mecode", { yzm: yzm }, function(result) {
			switch(result){
				case '1':
					bool4 = true;
					reg();
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

			});
	});
	
	function reg() {
//		判断手机号码是否被更改
		if(phones != '') {
//			获取当前手机号码
			ph = $('.phone').val();
			if(ph == phones) {
				obj1.parent('div').next().html('');
				if(bool && bool1 && bool2 && bool3 && bool4 && bool5) {
					$(".feis").val('111111');
					$(".button").removeAttr('disabled');
				} else {			
					$(".button").attr('disabled','true');
					$(".feis").val('112211');
				}
			}else{
				obj1.parent('div').next().html('*发送验证码手机被修改').css('color','red');
			}
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
</html>
