@extends("Home.HomePublic.Personal")
@section('title','激活邮箱-零食么')
@section('static')
		<link href="/static/Home/css/stepstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg"></strong> / <small></small></div>
					</div>
					<hr>
					<!--进度条-->
					<div style="text-align: center; font-size: 30px;">
						邮箱未激活!!!
					</div><br /><br />
					<div style="text-align: center; font-size: 30px;">
						<form action="/emailagain" method="post">
							@if(!empty($email))
							<input type="hidden" name="email" value="{{$email}}"  />
							<input type="hidden" name="id" value="{{$emid}}" />
							<input type="hidden" name="token" value="{{$token}}" />
							@endif
            				{{csrf_field()}}
							<input type="submit" value="重新发送验证邮件"/>
						</form>
					</div>


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

