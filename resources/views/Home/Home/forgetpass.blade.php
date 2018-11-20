@extends("Home.HomePublic.Personal")
@section('title','零食么-密码找回')
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
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">提交账号</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">验证信息</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">修改密码</p>
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
					<form action="/doforgetpass" method="get" class="am-form am-form-horizontal">
						<div class="am-form-group">
							<label for="user-old-password" class="am-form-label"></label>
							<div class="am-form-content">
								<input type="text" name="name" id="user-old-password" value="{{old('name')}}" placeholder="输入用户名/邮箱/手机号码">
							</div>
						</div>
						
						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label"></label>
							<div class="am-form-content">
			                  <img  title="点击刷新" src="/static/Admin/yzm/captcha.php" align="absbottom" onclick="this.src='/static/Admin/yzm/captcha.php?'+Math.random();"></img> 
				            @foreach ($errors->all() as $error)
				            <span style="color: #f00;">{{ $error }},</span>
				            @endforeach
					      	@if(session('error'))
					      	<span style="color: #f00;">{{session('error')}}</span>
					      	@endif 
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label"></label>
							<div class="am-form-content">
								<input type="text" name="code" id="user-confirm-password" placeholder="请输入验证码">
							</div>
						</div>
						<div class="info-btn">
							<button class="am-btn am-btn-danger">下一步</button>
						</div>

					</form>

				</div>
@endsection
