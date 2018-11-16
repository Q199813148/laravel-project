@extends("Home.HomePublic.Personal")
@section('title','悦桔拉拉')
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
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">绑定手机</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<form class="am-form am-form-horizontal">
						<div class="am-form-group bind">
							<label for="user-phone" class="am-form-label">验证手机</label>
							<div class="am-form-content">
								<span id="user-phone">186XXXX0531</span>
							</div>
						</div>
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input type="tel" id="user-code" placeholder="短信验证码">
							</div>
							<a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">
								<div class="am-btn am-btn-danger">验证码</div>
							</a>
						</div>
						<div class="am-form-group">
							<label for="user-new-phone" class="am-form-label">验证手机</label>
							<div class="am-form-content">
								<input type="tel" id="user-new-phone" placeholder="绑定新手机号">
							</div>
						</div>
						<div class="am-form-group code">
							<label for="user-new-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input type="tel" id="user-new-code" placeholder="短信验证码">
							</div>
							<a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">
								<div class="am-btn am-btn-danger">验证码</div>
							</a>
						</div>
						<div class="info-btn">
							<div class="am-btn am-btn-danger">保存修改</div>
						</div>

					</form>

				</div>
<script type="text/javascript">
	var bool = false;
	var bool1 = false;
	$(".button").attr('disabled',true);
//	执行密码验证
	$(".password").blur(function() {
//		获取密码
		var str = $(this).val();
		bool = false;
//		判断
		if($(this).val() == '') {
			$(this).parent('div').next().html('　　　　　　*密码不能为空');
		}else if(str.match(/\w{6,18}/) == null) {
			$(this).parent('div').next().html('　　　　　　*密码为6-18位数字字母下划线组成');
		} else {
			bool = true;
			$(this).parent('div').next().html('');
		}
		reg();
	});
//	执行确认密码验证
	$(".repassword").blur(function() {
//		获取确认密码
		var str = $(this).val();
		var pass = $(".password").val();
		boo12 = false;
//		判断
		if($(this).val() == '') {
			$(this).parent('div').next().html('　　　　　　*确认密码不能为空');
		}else if(pass != str) {
			$(this).parent('div').next().html('　　　　　　*两次密码不一致');
		}else {
			bool1 = true;
			$(this).parent('div').next().html('');
		}
		reg();
	});
	function reg() {
		if(bool && bool1) {
			$(".button").removeAttr('disabled');
		}else{
			$(".button").attr('disabled',true);
		}
	}
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
