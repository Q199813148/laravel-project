@extends("Home.HomePublic.Personal")
@section('title','悦桔拉拉')
@section('static')
		<link href="/static/Home/css/infstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">

					<!--标题 -->
					<div class="user-safety">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
						</div>
						<hr>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<img class="am-circle am-img-thumbnail" src="{{$user->pic}}" alt="">
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>{{$user->u_name}}</i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">
							             	@if($data->level == 0)
							             	普通用户
							             	@else
							             	<span style="color: #f00;">VIP</span>
							             	@endif
							             </a>
						            </span>
								</div>
								<div class="u-safety">
									<a href="safety.html">
									 个性签名：
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">{{$user->summary}}</i></span>
									</a>
								</div>
							</div>
						</div>

						<div class="check">
							<ul>
								<li>
									<i class="i-safety-lock"></i>
									<div class="m-left">
										<div class="fore1">登录密码</div>
										<div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
									</div>
									<div class="fore3">
										<a href="/safetypass">
											<div class="am-btn am-btn-secondary">修改</div>
										</a>
									</div>
								</li>
								<li>
									<i class="i-safety-wallet"></i>
									<div class="m-left">
										<div class="fore1">支付密码</div>
										<div class="fore2"><small>启用支付密码功能，为您资产账户安全加把锁。</small></div>
									</div>
									<div class="fore3">
										<a href="setpay.html">
											<div class="am-btn am-btn-secondary">
												
												立即启用
												</div>
										</a>
									</div>
								</li>
								<li>
									<i class="i-safety-iphone"></i>
									<div class="m-left">
										<div class="fore1">手机验证</div>
										<div class="fore2"><small>您验证的手机：{{$user->phone}} 若已丢失或停用，请立即更换</small></div>
									</div>
									<div class="fore3">
										<a href="/safetyphone">
											<div class="am-btn am-btn-secondary">换绑</div>
										</a>
									</div>
								</li>
								<li>
									<i class="i-safety-mail"></i>
									<div class="m-left">
										<div class="fore1">邮箱验证</div>
										<div class="fore2"><small>您验证的邮箱：{{$data->email}} 可用于快速找回登录密码</small></div>
									</div>
									<div class="fore3">
										<a href="email.html">
											<div class="am-btn am-btn-secondary">换绑</div>
										</a>
									</div>
								</li>
								<li>
									<i class="i-safety-security"></i>
									<div class="m-left">
										<div class="fore1">安全问题</div>
										<div class="fore2"><small>保护账户安全，验证您身份的工具之一。</small></div>
									</div>
									<div class="fore3">
										@if(empty($encrypted))
										<a href="/personalsafety/create">
											<div class="am-btn am-btn-secondary">添加密保</div>
										</a>
										@else
										<a href="/safetyencrypted">
											<div class="am-btn am-btn-secondary">修改密保</div>
										</a>
										@endif
									</div>
								</li>
							</ul>
						</div>

					</div>
				</div>
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
