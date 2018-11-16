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
						<div class="m-progress-list" >
							<span class="step">
                                <em class="u-progress-stage-bg" ></em>
                                <i class="u-stage-icon-inner" style="background: #23C279; border-radius: 50%; color: #fff;">1<em class="bg" ></em></i>
                                <p class="stage-name">提交账号</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner" style="background: #23C279; border-radius: 50%; color: #fff;">2<em class="bg"></em></i>
                                <p class="stage-name">验证信息</p>
                            </span>
							<span class="step-1 step">
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
		            @foreach ($errors->all() as $error)
		            <div style="color: #f00;text-align: center;">{{ $error }},</div>
		            @endforeach
			      	@if(session('error'))
			      	<div style="color: #f00;text-align: center;">{{session('error')}}</div>
			      	@endif 

					<form action="/endforgetpass" method="post" class="am-form am-form-horizontal">
						<div class="am-form-group">
							<label for="user-old-password" class="am-form-label"></label>
							<div class="am-form-content">
								<input type="password" name="password" id="user-old-password" placeholder="新密码">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label"></label>
							<div class="am-form-content">
								<input type="password" name="repassword" id="user-confirm-password" placeholder="确认密码">
							</div>
						</div>
						<input type="hidden" name="id" value="{{$id}}">
						<input type="hidden" name="token" value="{{$token}}">
            			{{csrf_field()}}
						<div class="info-btn">
							<button class="am-btn am-btn-danger">下一步</button>
						</div>

					</form>

				</div>
@endsection
