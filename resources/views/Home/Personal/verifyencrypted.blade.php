@extends("Home.HomePublic.Personal")
@section('title','悦桔拉拉')
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
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">验证</p>
                            </span>
							<span class="step-2 step">
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
					<form action="/doverifyencrypted" method="post" class="am-form am-form-horizontal">
						<div class="am-form-group select">
							<label for="user-question1" class="am-form-label">问题一</label>
							<div class="am-form-content">
								<select name="issue1" >
									@if($data->issue1 == 0)
									<option value="0" selected="">您最喜欢的人是?</option>
									@elseif($data->issue1 == 1)
									<option value="1">您最讨厌的人是?</option>
									@else
									<option value="2">你最尊敬的人是?</option>
									@endif
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
									@if($data->issue2 == 0)
									<option value="0" selected="">您做过最愚蠢的事是?</option>
									@elseif($data->issue2 == 1)
									<option value="1">您干过最傻的事是?</option>
									@else
									<option value="2">你认为自己做过最蠢的事是?</option>
									@endif
								</select>
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-answer2" class="am-form-label">答案</label>
							<div class="am-form-content">
								<input type="text" name="result2" id="user-answer2" placeholder="请输入安全问题答案">
							</div>
						</div>
						<input type="hidden" name="url" value="{{$data->url}}" />
               			{{csrf_field()}}
						<div class="info-btn">
							<input class="am-btn am-btn-danger" type="submit" value="提交">
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
@endsection
