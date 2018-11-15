@extends("Home.HomePublic.Personal")
@section('title','悦桔拉拉')
@section('static')
<link href="/static/Home/css/infstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">

	<div class="user-info">
		<!--标题 -->
		<div class="am-cf am-padding">
			<div class="am-fl am-cf">
				<strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small>
			</div>
		</div>
		<hr>

		<!--头像 -->
		<div class="user-infoPic">
			<div class="filePic">
				<input type="file" name="userimg" class="inputPic" form="tf" onchange="preview(this)" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
				<img class="am-circle am-img-thumbnail userimg" id="fileimg" src="{{$data->pic}}" alt="">
			</div>
				{{csrf_field()}}
			<p class="am-form-help">
				头像
			</p>

			<div class="info-m">
				<div>
					{{-- dd($data) --}}
					<b>用户名：<i>{{$data->u_name}}</i></b>
				</div>
				<div class="u-level">
					<span class="rank r2"> <s class="vip1"></s>
					<a class="classes" href="#">
						@if(session('user')->level == 0)
						普通会员
						@else
						<span style="color: #f00;">VIP用户</span>
						@endif
					</a> </span>
				</div>
				<div class="u-safety">
					<a href="#">
						<span style="font-size: 12px;">个性签名:</span>
						<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0"><input type="" style="border:0px" name="summary"form="tf" placeholder="{{$data->summary or '懒到没个性'}}" /></i></span>
					</a>
				</div>
			</div>
		</div>
		<!--个人信息 -->
		<div class="info-main">
			<form  id="tf" action="/personal/{{$data->user_id}}" method="post" enctype="multipart/form-data" class="am-form am-form-horizontal">
				<div class="am-form-group">
					<label for="user-name2" class="am-form-label">昵称</label>
					<div class="am-form-content">
						<input type="text" name="nickname" id="user-name2"  placeholder="{{$data->nickname or '起个昵称,让世界认识你'}}">

					</div>
				</div>

				<div class="am-form-group">
					<label for="user-name" class="am-form-label">年龄</label>
					<div class="am-form-content">
						<div class="birth-select">
							<select name="age" >
								@for($i = 1; $i < 150; $i++)
									@if($i == $data->age) 
										<option value="{{$i}}" selected>{{$i}}</option>
									@else
										<option value="{{$i}}">{{$i}}</option>
									@endif
								@endfor
							</select>
							<em>岁</em>
						</div>
					</div>
				</div>

				<div class="am-form-group">
					<label class="am-form-label">性别</label>
					<div class="am-form-content sex">
						<label class="am-radio-inline">
						<input type="radio" name="sex" value="1"  data-am-ucheck="" class="am-ucheck-radio" @if($data->sex == 1) checked @endif >
						<span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 男 </label>
						<label class="am-radio-inline">
						<input type="radio" name="sex" value="0" data-am-ucheck="" class="am-ucheck-radio" @if($data->sex == 0) checked @endif >
						<span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 女 </label>
						<label class="am-radio-inline">
						<input type="radio" name="sex" value="2" data-am-ucheck="" class="am-ucheck-radio"  @if($data->sex == 2) checked @endif >
						<span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 保密 </label>
					</div>
				</div>

				<div class="am-form-group">
					<label for="user-birth" class="am-form-label">生日</label>
					<div class="am-form-content birth">
						<div class="birth-select">
							<select name="years" >
								@for($i = $data->dates; $i > 1918; $i--)
									@if($i == $data->years) 
										<option value="{{$i}}" selected>{{$i}}</option>
									@else
										<option value="{{$i}}">{{$i}}</option>
									@endif
								@endfor
							</select>
							<em>年</em>
						</div>
						<div class="birth-select2">
							<select name="month" >
								@for($i = 1; $i <= 12; $i++)
									@if($i == $data->month) 
										<option value="{{$i}}" selected>{{$i}}</option>
									@else
										<option value="{{$i}}">{{$i}}</option>
									@endif
								@endfor
							</select>
							
							<em>月</em>
						</div>
						<div class="birth-select2">
							<select name="day">
								<option value=""></option>
								@for($i = 1; $i <= 31; $i++)
									@if($i == $data->day) 
										<option value="{{$i}}" selected>{{$i}}</option>
									@else
										<option value="{{$i}}">{{$i}}</option>
									@endif
								@endfor
							</select>
							
							<em>日</em>
						</div>
					</div>

				</div>
				
          		{{method_field("PUT")}}
				{{csrf_field()}}
				<div class="am-form-group">
					<label for="user-phone" class="am-form-label">电话</label>
					<div class="am-form-content">
						<input id="user-phone" name="phone" placeholder="{{$data->phone}}" type="tel">

					</div>
				</div>
				<div class="am-form-group">
					<label for="user-email" class="am-form-label">电子邮件</label>
					<div class="am-form-content">
						<input id="user-email" name="email" placeholder="{{session('user')->email}}" type="email">

					</div>
				</div>
				<div class="am-form-group address">
					<label for="user-address" class="am-form-label">收货地址</label>
					<div class="am-form-content address">
						<a href="address.html">
							<p class="new-mu_l2cw">
								<span class="province">湖北</span>省 <span class="city">武汉</span>市 <span class="dist">洪山</span>区 <span class="street">雄楚大道666号(中南财经政法大学)</span>
								<span class="am-icon-angle-right"></span>
							</p>
						</a>

					</div>
				</div>
				<div class="am-form-group safety">
					<label for="user-safety" class="am-form-label">账号安全</label>
					<div class="am-form-content safety">
						<a href="safety.html">

							<span class="am-icon-angle-right"></span>

						</a>

					</div>
				</div>
				<div class="info-btn">
						<button  class="am-btn am-btn-danger" type="submit">保存修改</button>
				</div>

			</form>
		</div>

	</div>

</div>

<script type="text/javascript">
    function preview(file) {
        var prevImg = $('.userimg');
        if (file.files && file.files[0]) {
            var reader = new FileReader();
            reader.onload = function(evt) {
                prevImg.attr('src', evt.target.result);
            }
//          
            reader.readAsDataURL(file.files[0]);
        } else {
            prevImg.attr('src', '{{$data->pic}}');
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
				<a href="/personaldata"  style="color: #f00;">
					个人信息
				</a>
			</li>
			<li>
				<a href="safety.html">
					安全设置
				</a>
			</li>
			<li>
				<a href="/address">
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
