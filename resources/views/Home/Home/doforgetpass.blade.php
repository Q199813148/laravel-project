@extends("Home.HomePublic.Personal")
@section('title','悦桔拉拉')
@section('static')
<link href="/static/Home/css/stepstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">找回密码</strong> / <small>Password</small></div>
					</div>
					<hr>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list" >
							<span class="step">
                                <em class="u-progress-stage-bg" ></em>
                                <i class="u-stage-icon-inner"  style="background: #23C279; border-radius: 50%; color: #fff;">1<em class="bg" ></em></i>
                                <p class="stage-name">提交账号</p>
                            </span>
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">验证信息</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                <p class="stage-name">修改密码</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">4<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<div class="verify1" style="height: 40px; cursor: pointer; background:mediumslateblue; width: 50%; float: left; text-align: center; line-height: 40px;">手机验证</div>
					<div class="verify2" style="height: 40px; cursor: pointer; background: aqua; width: 50%; float: left; text-align: center; line-height: 40px;">邮箱验证</div>
					<div style="clear: both;"></div>
					<br /><br /><br />
					<form action="/reforgetpass" style="display: block;" method="post" class="am-form am-form-horizontal verify11">
						<div class="am-form-group bind">
							<label for="user-phone" class="am-form-label">验证手机</label>
							<div class="am-form-content">
								<span id="user-phone">{{$phone  or '未绑定手机'}}</span> <span class="error" style="color: #f00;">　　　　　　　　　@if(session('error')) {{session('error')}} @endif</span>
							</div>
						</div>
            			{{csrf_field()}}
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input type="tel" name="phcode" id="user-code" placeholder="短信验证码" style="width: 380px;">
								<input type="hidden" name="phone" value="phone" class="phone"  />
								<input type="hidden" name="name" value="{{$name}}" class="name"  />
								<input type="hidden" name="bool" value="{{$bool}}" class="bool"  />
							</div>
							<a class="btn" href="javascript:void(0);"  id="sendMobileCode">
								<input type="button" class="am-btn am-btn-danger dycode" style=" width:120px;display: block;" value="获取验证码"></input>
							</a>
						</div>

						<div class="info-btn">
							<button type="submit" class="am-btn am-btn-danger">提交认证</button>
						</div>

					</form>
					
					<form action="/reemforgetpass" method="post" class="am-form am-form-horizontal verify22" style="display: none;">
						
						<div class="am-form-group bind">
							<label for="user-phone" class="am-form-label">验证邮箱</label>
							<div class="am-form-content">
								<span id="user-phone">{{$email or '未绑定邮箱'}}</span> <span class="error" style="color: #f00;">　　　　　　　　　@if(session('error')) {{session('error')}} @endif</span>
							</div>
						</div>
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input type="tel" name="emcode" id="user-code" placeholder="短信验证码" style="width: 380px;">
							</div>
							<a class="btn" href="javascript:void(0);"  id="sendMobileCode">
								<input type="button" class="am-btn am-btn-danger emcode" style=" width:120px;display: block;" value="获取验证码"></input>
							</a>
						</div>
						<div style="text-align: center;" class="error"></div>
						<br />
						<input type="hidden" name="email" value="{{$email}}" class="email"  />
						<input type="hidden" name="name" value="{{$name}}" class="name"  />
						<input type="hidden" name="bool" value="{{$bool}}" class="bool"  />
            			{{csrf_field()}}
						<div class="info-btn">
							<button type="submit" class="am-btn am-btn-danger">提交修改</button>
						</div>

					</form>

				</div>
<script>
	$('.verify1').click(function() {
	
		$(this).css('background','mediumslateblue');
		$('.verify11').css('display','block')
		$('.verify2').css('background','aqua');
		$('.verify22').css('display','none');
	});
	$('.verify2').click(function() {

		$(this).css('background','mediumslateblue');
		$('.verify22').css('display','block')
		$('.verify1').css('background','aqua');
		$('.verify11').css('display','none');
	});
</script>
<script>
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
		phone = {{$data}};
		$.get("/rephone", { phone: phone }, function(result) {
			if(result.code == '000000') {
//				获取发送验证码的手机
				$('.phone').val(result.mobile);
				$('.error').html('');
			} else {
				$('.error').html('*发送失败');
			}
		}, 'json');
	});
</script>
<script>
//	发送邮箱
	$(".emcode").click(function() {
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
		email = $('.email').val();
		$.get("/sendemail", { email:email }, function(result) {
			if(result == 1) {
				$('.success').html('发送成功');
			} else {
				$('.error').html('*发送失败');
			}
		}, 'json');
	});
</script>
@endsection
