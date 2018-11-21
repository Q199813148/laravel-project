@extends("Home.HomePublic.Personal")
@section('title','悦桔拉拉')
@section('static')
		<link href="/static/Home/css/refstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<form action="/refundx/{{$data->id}}" method="post">
<div class="main-wrap">
	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf">
			<strong class="am-text-danger am-text-lg">退换货申请</strong> / <small>Apply&nbsp;for&nbsp;returns</small>
		</div>
	</div>
	<hr>
	<div class="comment-list">
		<!--进度条-->
		<div class="m-progress">
			<div class="m-progress-list">
				<span class="step-1 step"> <em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">1<em class="bg"></em></i>
				<p class="stage-name">
					买家申请退款
				</p> </span>
				<span class="step-2 step"> <em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">2<em class="bg"></em></i>
				<p class="stage-name">
					商家处理退款申请
				</p> </span>
				<span class="step-3 step"> <em class="u-progress-stage-bg"></em> <i class="u-stage-icon-inner">3<em class="bg"></em></i>
				<p class="stage-name">
					款项成功退回
				</p> </span>
				<span class="u-progress-placeholder"></span>
			</div>
			<div class="u-progress-bar total-steps-2">
				<div class="u-progress-bar-inner"></div>
			</div>
		</div>

		<div class="refund-aside">
			<div class="item-pic">
				<a href="#" class="J_MakePoint">
					<img src="{{$data->photo}}" class="itempic">
				</a>
			</div>

			<div class="item-title">

				<div class="item-name">
					<a href="#">
						<p class="item-basic-info">
							{{$data->name}}
						</p>
					</a>
				</div>
				<div class="info-little">
					<span>口味：{{$data->taste}}</span>
				</div>
			</div>
			<div class="item-info">
				<div class="item-ordernumber">
					<span class="info-title">订单编号：</span>
					<a>
						{{$data->orderno}}
					</a>
				</div>
				<div class="item-price">
					<span class="info-title">价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：</span><span class="price">{{$data->price}}元</span>
					<span class="number">x{{$data->num}}</span><span class="item-title">(数量)</span>
				</div>
				<div class="item-amount">
					<span class="info-title">小&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;计：</span><span class="amount">{{$data->sum}}元</span>
				</div>
				<div class="item-pay-logis">
					<span class="info-title">运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费：</span><span class="price">0元</span>
				</div>
				<div class="item-amountall">
					<span class="info-title">总&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;计：</span><span class="amountall">{{$data->sum}}元</span>
				</div>
				<div class="item-time">
					<span class="info-title">订单时间：</span><span class="time">{{$data->time}}</span>
				</div>

			</div>
			<div class="clear"></div>
		</div>

		<div class="refund-main">
			<div class="item-comment">
				<div class="am-form-group">
					<label for="refund-type" class="am-form-label">退款类型</label>
					<div class="am-form-content">
						<select name="refundx_type" data-am-selected="" style="display: none;">
							<option value="0" selected="">仅退款</option>
							<option value="1">退款/退货</option>
						</select>
						
					</div>
				</div>

				<div class="am-form-group">
					<label for="refund-reason" class="am-form-label">退款原因</label>
					<div class="am-form-content">
						<select name="refundx_name" data-am-selected="" style="display: none;">
							<option value="0">不想要了</option>
							<option value="1">买错了</option>
							<option value="2">没收到货</option>
							<option value="3">与说明不符</option>
						</select>
						
					</div>
				</div>

				<div class="am-form-group">
					<label for="refund-money" class="am-form-label">退款金额<span>（不可修改）</span></label>
					<div class="am-form-content">
						<input type="text" id="refund-money" readonly="readonly" placeholder="{{$data->sum}}">
					</div>
				</div>
				<div class="am-form-group">
					<label for="refund-info" class="am-form-label">退款说明<span>（可不填）</span></label>
					<div class="am-form-content">
						<textarea name="content" placeholder="请输入退款说明"></textarea>
					</div>
				</div>
			</div><br /><br />
			{{csrf_field()}}
	  		{{method_field("PUT")}}
			<div class="info-btn">
				<input type="submit" class="am-btn am-btn-danger" value="提交申请">
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
</form>
@endsection

