@extends("Home.HomePublic.Personal")
@section('title','绑定手机-零食么')
@section('static')
		<link href="/static/Home/css/stepstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定手机</strong> / <small>Bind&nbsp;Phone</small></div>
					</div>
					<hr>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner" style="background: #23C279; border-radius: 50%; color: #fff;">1<em class="bg"></em></i>
                                <p class="stage-name">验证密保</p>
                            </span>
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">绑定手机</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<form action="/dosafetyphone" style="display: block;" method="post" class="am-form am-form-horizontal verify11">
						<div class="am-form-group code">
							<label for="user-phone" class="am-form-label">新号码</label>
							<div class="am-form-content">
								<input type="text" name="phone" value="{{old('phone')}}" class="phone" placeholder="请输入手机" />
							</div>
						</div>
            			{{csrf_field()}}
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input type="tel" name="phcode" id="user-code" placeholder="短信验证码" style="width: 380px;">
							</div>
							<a class="btn" href="javascript:void(0);"  id="sendMobileCode">
								<input type="button" class="am-btn am-btn-danger dycode" style=" width:120px;display: block;" value="获取验证码"></input>
							</a>
						</div>

						<div class="info-btn">
							<button type="submit" class="am-btn am-btn-danger">提交修改</button>
						</div>

					</form>

				</div>
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
		phone = $('.phone').val();
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
@endsection
