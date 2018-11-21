@extends("Home.HomePublic.Personal")
@section('title','安全中心-零食么')
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
								@if($user->pic)
								<img class="am-circle am-img-thumbnail" src="{{$user->pic}}" alt="">
								@else
								<img class="am-circle am-img-thumbnail" src="/static/Home/images/getAvatar.do.jpg" alt="">
								@endif
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
									<a href="">
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
										<a href="/safetyemail">
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
