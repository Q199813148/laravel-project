@extends("Home.HomePublic.Personal")
@section('title','悦桔拉拉')
@section('static')
		<link href="/static/Home/css/stepstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定邮箱</strong> / <small>Email</small></div>
					</div>
					<hr>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner" style="background: #23C279; border-radius: 50%; color: #fff;">1<em class="bg"></em></i>
                                <p class="stage-name">验证邮箱</p>
                            </span>
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">修改邮箱</p>
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
					<form action="/dosafetyemail" style="display: block;" method="post" class="am-form am-form-horizontal verify11">
						<div class="am-form-group">
							<label for="user-email" class="am-form-label">验证密保</label>
							<div class="am-form-content">
								<input type="email" name="email" class="email" value="{{old('email')}}" id="user-email" placeholder="请输入邮箱地址">
							</div>
						</div>
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input type="tel" name="emcode" id="user-code" placeholder="短信验证码" style="width: 380px;">
							</div>
							<a class="btn" href="javascript:void(0);"  id="sendMobileCode">
								<input type="button" class="am-btn am-btn-danger dycode" style=" width:120px;display: block;" value="获取验证码"></input>
							</a>
						</div>
						<div style="text-align: center;" class="error"></div>
						<br />
            			{{csrf_field()}}
						<div class="info-btn">
							<button type="submit" class="am-btn am-btn-danger">提交修改</button>
						</div>

					</form>

				</div>
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
<script>
//	发送邮箱
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

@section('list')
<!--左侧列表-->
<ul>
	<li class="person">
		<a href="/personal">
			个人中心
		</a>
	</li>
	<li class="person">
		<span  style="font-size: 18px;"	>
			个人资料
		</span>
		<ul>
			<li>
				<a href="/personal/{{session('user')->user_id}}/edit">
					个人信息
				</a>
			</li>
			<li>
				<a href="/personalsafety"  style="color: #f00;">
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
		<span  style="font-size: 18px;"	>
			我的交易
		</span>
		<ul>
			<li>
				<a href="order.html">
					订单管理
				</a>
			</li>
			<li>
				<a href="change.html">
					退款售后
				</a>
			</li>
		</ul>
	</li>
	<li class="person">
		<span  style="font-size: 18px;"	>
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
		<span  style="font-size: 18px;"	>
			我的小窝
		</span>
		<ul>
			<li>
				<a href="collection.html">
					收藏
				</a>
			</li>
			<li>
				<a href="foot.html">
					足迹
				</a>
			</li>
			<li>
				<a href="comment.html">
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
@endsection
