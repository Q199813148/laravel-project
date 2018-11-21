@extends("Home.HomePublic.personal")
@section('title','我的评价')
@section('static')
	<link href="static/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
	<link href="static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

	<link href="static/Home/css/personal.css" rel="stylesheet" type="text/css">
	<link href="static/Home/css/cmstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
	<div class="main-wrap">

		<div class="user-comment">
			<!--标题 -->
			<div class="am-cf am-padding">
				<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
			</div>
			<hr/>

			<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

				<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
					<li class="am-active"><a href="#tab1">所有评价</a></li>
					<li><a href="#tab2">有图评价</a></li>

				</ul>
				<div class="comment-top">
					<div class="th th-price">
						<td class="td-inner">评价</td>
					</div>
					<div class="th th-item">
						<td class="td-inner">商品</td>
					</div>
				</div>
				<div class="am-tabs-bd">

					<div class="am-tab-panel am-fade am-in am-active" id="tab1">
						@foreach($data as $value)
						<div class="comment-main" style="margin-bottom: 20px">
							<div class="comment-list">
								<ul class="item-list">



									<li class="td td-item">
										<div class="item-pic">
											<a href="/goodsdetail?id={{$value->good_id}}" class="J_MakePoint">
												<img src="{{$value->photo}}" class="itempic">
											</a>
										</div>
									</li>

									<li class="td td-comment">
										<div class="item-title">
											<div class="item-opinion">好评</div>
											<div class="item-name">
												<a href="/goodsdetail?id={{$value->good_id}}">
													<p class="item-basic-info">{{$value->name}}</p>
												</a>
											</div>
										</div>
										<div class="item-comment">
											{{$value->content or '该买家很懒,没有评价内容'}}
										</div>

										<div class="item-info">
											<div>
												<p class="info-little"><span>口味：{{$value->taste}}</span><span>评价等级: @if($value->level==0) 好评 @elseif($value->level==1) 中评 @else 差评 @endif</span>  </p>
												<p class="info-time">{{$value->addtime}}</p>

											</div>
										</div>
									</li>

								</ul>

							</div>
						</div>
						@endforeach
					</div>

					<div class="am-tab-panel am-fade" id="tab2">
						@foreach($data1 as $val)
							<div class="comment-main">
							<div class="comment-list">
								<ul class="item-list">



									<li class="td td-item">
										<div class="item-pic">
											<a href="/goodsdetail?id={{$val->good_id}}" class="J_MakePoint">
												<img src="{{$val->photo}}" class="itempic">
											</a>
										</div>
									</li>

									<li class="td td-comment">
										<div class="item-title">
											<div class="item-opinion">好评</div>
											<div class="item-name">
												<a href="/goodsdetail?id={{$val->good_id}}">
													<p class="item-basic-info">{{$val->name}}</p>
												</a>
											</div>
										</div>
										<div class="item-comment">
											{{$val->content or '该买家很懒,没有评价内容'}}

										</div>

										<div class="item-info">
											<div>
												<p class="info-little"><span>口味：{{$val->taste}}</span> <span>评价等级: @if($val->level==0) 好评 @elseif($val->level==1) 中评 @else 差评 @endif</span> </p>
												<p class="info-time">{{$val->addtime}}</p>

											</div>
										</div>
									</li>

								</ul>

							</div>
						</div>
							<div class="filePic" style="width: 998px;">

								@foreach($val->pic as $v)
								<div style="float: left; width: 100px;">
									<img src="{{$v}}" alt="" class="am-img-thumbnail am-circle" style="height: 100px; width: 100px;">
								</div>
								@endforeach
								<div style="clear: both"></div>
							</div>
							<hr>
						@endforeach
					</div>
				</div>
			</div>

		</div>

	</div>
@endsection


