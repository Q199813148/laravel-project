@extends("Home.HomePublic.Personal")
@section('title','我的足迹-零食么')
@section('static')
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">


		<link href="/static/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/static/Home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/static/Home/css/footstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">

					<div class="user-foot">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的足迹</strong> / <small>Browser&nbsp;History</small></div>
						</div>
						<hr>

						<!--足迹列表 -->
						@foreach ($history as $row)
						<div class="goods">
							<div class="goods-date" data-date="2015-12-21">
								<span><i class="month-lite">{{$row->addtime}}</i></span>
								<del class="am-icon-trash"></del>
								<s class="line"></s>
							</div>

							<div class="goods-box first-box">
								<div class="goods-pic">
									<div class="goods-pic-box">
										<a class="goods-pic-link" target="_blank" href="/goodsdetail?id={{$row->goods_id}}" title="{{$row->name}}">
											<img src="{{$row->photo}}" class="goods-img"></a>
									</div>
									<a class="goods-delete" href="/historydel?id={{$row->id}}"><i class="am-icon-trash"></i></a>
									
								</div>

								<div class="goods-attr">
									<div class="good-title">
										<a class="title" href="/goodsdetail?id={{$row->id}}" target="_blank">{{$row->name}}</a>
									</div>
									<div class="goods-price">
										<span class="g_price">                                    
                                        <span>¥</span><strong>{{$row->price}}</strong>
										</span>
										<span class="g_price g_price-original">                                    
                                        <span>¥</span><strong>{{$row->price+10}}</strong>
										</span>
									</div>
									<div class="clear"></div>
									<div class="goods-num">
										<div class="match-recom">
											
											<a href="/typelist?typeid=42" class="match-recom-item">找相似</a>
											<i><em></em><span></span></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
						<div class="clear"></div>
						
						
						
					</div>
				</div>

@endsection
