@extends("Home.HomePublic.Personal")
@section('title','悦桔拉拉')
@section('static')
		<link href="/static/Home/css/orstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">

	<div class="user-order">

		<!--标题 -->
		<div class="am-cf am-padding">
			<div class="am-fl am-cf">
				<strong class="am-text-danger am-text-lg">退换货管理</strong> / <small>Change</small>
			</div>
		</div>
		<hr>

		<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">

			<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
				<li class="">
					<a href="#tab1">
						退款管理
					</a>
				</li>
			</ul>
			<div class="am-tabs-bd" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
				<div class="am-tab-panel am-fade" id="tab1">
					<div class="order-top">
						<div class="th th-item">
							商品
						</div>
						<div class="th th-orderprice th-price">
							交易金额
						</div>
						<div class="th th-changeprice th-price">
							退款金额
						</div>
						<div class="th th-status th-moneystatus">
							交易状态
						</div>
						<div class="th th-change th-changebuttom">
							交易操作
						</div>
					</div>


					@if(!empty($datb))
					@foreach($datb as $val)
					<div class="order-main">
						<div class="order-list">
							<div class="order-title">
								<div class="dd-num">
									退款编号：
									<a href="javascript:;">
										{{$val->orderno}}
									</a>
								</div>
								<span>申请时间：{{$val->time}}</span>
								<!--    <em>店铺：小桔灯</em>-->
							</div>
							<div class="order-content">
								<div class="order-left">
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="#" class="J_MakePoint">
													<img src="{{$val->photo}}" class="itempic J_ItemImg">
												</a>
											</div>
											<div class="item-info">
												<div class="item-basic-info">
													<a href="#">
														<p>
															{{$val->name}}
														</p>
														<p class="info-little">
															{{$val->taste}}
															<br>
														</p>
													</a>
												</div>
											</div>
										</li>

										<ul class="td-changeorder">
											<li class="td td-orderprice">
												<div class="item-orderprice">
													<span>交易金额：</span>{{$val->price}}
												</div>
											</li>
											<li class="td td-changeprice">
												<div class="item-changeprice">
													<span>退款金额：</span>{{$val->price}}
												</div>
											</li>
										</ul>
										<div class="clear"></div>
									</ul>

									<div class="change move-right">
										<li class="td td-moneystatus td-status">
											<div class="item-status">
												<p class="Mystatus">
													@if($val->status == 0)
													未退款
													@elseif($val->status == 1)
													等待商家响应
													@elseif($val->status == 2)
													退款成功
													@elseif($val->status == 3)
													退款被驳回<br />
													@endif
												</p>
											</div>
										</li>
									</div>
												<form action="/refundx/{{$val->id}}" id="deform"  method="post">
										          {{csrf_field()}}
										          {{method_field("DELETE")}}
										       </form>
									<li class="td td-change td-changebutton">
												@if($val->status < 2)
												<input form="deform" class="am-btn am-btn-danger anniu" type="submit" value="取消退款" />
												@elseif($val->status == 2)
												退款成功
												@elseif($val->status == 3)
												<a href="/refundx/{{$val->details_id}}/edit" class="am-btn am-btn-danger anniu"  />再次申请退款</a>
												@endif
												</p>
									</li>

								</div>
							</div>
						</div>

					</div>
					{{$data->render()}}
					@endforeach
					@endif
				</div>

			</div>

		</div>
	</div>

</div>
@endsection

