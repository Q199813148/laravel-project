@extends("Home.HomePublic.Personal")
@section('title','密保验证-零食么')
@section('static')
		<link href="/static/Home/css/stepstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">验证</strong> / <small></small></div>
					</div>
					<hr>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner" style="background: #23C279; border-radius: 50%; color: #fff;">1<em class="bg"></em></i>
                                <p class="stage-name">验证</p>
                            </span>
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">修改</p>
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
					<form action="/dosafetyencrypted" method="post" class="am-form am-form-horizontal">
						<div class="am-form-group select">
							<label for="user-question1" class="am-form-label">问题一</label>
							<div class="am-form-content">
								<select name="issue1" >
									<option value="0" @if($data->issue1 == 0) selected @endif>您最喜欢的人是?</option>
									<option value="1" @if($data->issue1 == 1) selected @endif>您最讨厌的人是?</option>
									<option value="2" @if($data->issue1 == 2) selected @endif>你最尊敬的人是?</option>
									
								</select>
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-answer1" class="am-form-label">答案</label>
							<div class="am-form-content">
								<input type="text" name="result1" id="user-answer1" placeholder="请输入安全问题答案">
							</div>
						</div>
						<div class="am-form-group select">
							<label for="user-question2" class="am-form-label">问题二</label>
							<div class="am-form-content">
								<select name="issue2" >
									<option value="0" @if($data->issue2 == 0) selected @endif>您做过最愚蠢的事是?</option>
									<option value="1" @if($data->issue2 == 1) selected @endif>您干过最傻的事是?</option>
									<option value="2" @if($data->issue2 == 2) selected @endif>你认为自己做过最蠢的事是?</option>
								</select>
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-answer2" class="am-form-label">答案</label>
							<div class="am-form-content">
								<input type="text" name="result2" id="user-answer2" placeholder="请输入安全问题答案">
							</div>
						</div>
               			{{csrf_field()}}
						<div class="info-btn">
							<input class="am-btn am-btn-danger" type="submit" value="提交修改">
						</div>

					</form>

				</div>
@endsection
