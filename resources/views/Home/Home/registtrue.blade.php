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
						<div class="m-progress-list">
							<span class="step-1 step">
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
					<form class="am-form am-form-horizontal">
						<div class="am-form-group" style="text-align: center;">
							修改成功！
						</div><br /><br />
						<div class="info-btn">
							<a href="/login" class="am-btn am-btn-danger">前往登录</a>
						</div>

					</form>

				</div>
@endsection
