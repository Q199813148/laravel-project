@extends("Home.HomePublic.Personal")
@section('title','悦桔拉拉')
@section('static')
		<link href="/static/Home/css/stepstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
					</div>
					<hr>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">重置密码</p>
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
					<form action="/dosafetypass" method="post" class="am-form am-form-horizontal">
						<div class="am-form-group">
							<label for="user-old-password" class="am-form-label">原密码</label>
							<div class="am-form-content">
								<input type="password" name="plpassword" id="user-old-password" placeholder="请输入原登录密码">
							</div>
							<span style="color: #f00;">{{$errors->first('plpassword')}} @if(session('error')) {{session('error')}} @endif</span>
						</div>
						<div class="am-form-group">
							<label for="user-new-password" class="am-form-label">新密码</label>
							<div class="am-form-content">
								<input type="password" name="password" class="password" id="user-new-password" placeholder="由数字、字母组合">
							</div>
							<span style="color: #f00;">{{$errors->first('password')}}</span>
						</div>
						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label">确认密码</label>
							<div class="am-form-content">
								<input type="password" name="repassword" class="repassword" id="user-confirm-password" placeholder="请再次输入上面的密码">
							</div>
							<span style="color: #f00;">{{$errors->first('repassword')}}</span>
						</div>
               			{{csrf_field()}}
						<div class="info-btn">
							<input class="am-btn am-btn-danger button" type="submit" value="保存修改">
						</div>

					</form>

				</div>

@if(session('error'))
<div class="baocuo" style=" position: fixed; top: 0; left: 40%; width: 20%; height: 80px; background: #FE7C96; line-height: 80px;text-align: center; color: #fff;">{{session('error')}}</div>
@endif
<script type="text/javascript">
	$('.baocuo').click(function() {
		$(this).css('display','none');
	});
</script>
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