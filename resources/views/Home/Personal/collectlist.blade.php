@extends("Home.HomePublic.Personal")
@section('title','我的收藏-零食么')
@section('static')
	<link href="/static/Home/css/colstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">

					<div class="user-collection">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
						</div>
						<hr>

						<div class="you-like">
							<div class="s-bar">
								我的收藏
								
							</div>
							<div class="s-content">
							@foreach($data as $row)
								<div class="s-item-wrap">
								@if($row->status == 0)
									<div class="s-item">
									
									<div class="s-pic">
											<a href="/goodsdetail?id={{$row->id}}" class="s-pic-link">
												<img src="{{$row->photo}}" alt="{{$row->name}}" title="{{$row->name}}" class="s-pic-img s-guess-item-img">
												
											</a>
										</div>
									
										
										<div class="s-info">
											<div class="s-title"><a href="#" title="{{$row->name}}">{{$row->name}}</a></div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$row->price}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$row->price+10}}</em></span>
											</div>
											<div class="s-extra-box">
												<span class="s-comment"></span>
												<span class="s-sales">销量:{{$row->sales}}</span>
											</div>
										</div>
										<div class="s-tp">
											<a href="/collectdel?good_id={{$row->id}}"><span class="ui-btn-loading-before">取消收藏</span></a>
											<i class="am-icon-shopping-cart"></i>
											<a href="/goodsdetail?id={{$row->id}}"><span class="ui-btn-loading-before buy">商品详情</span></a>
											<p>
												<a href="javascript:;" class="c-nodo J_delFav_btn">取消收藏</a>
											</p>
										</div>
									</div>
									@else
									<div class="s-item">
									
									<div class="s-pic">
											<a href="#" class="s-pic-link">
												<img src="{{$row->photo}}" alt="{{$row->name}}" title="{{$row->name}}" class="s-pic-img s-guess-item-img">
												<span class="tip-title">已下架</span>
											</a>
										</div>
										
										<div class="s-info">
											<div class="s-title"><a href="#" title="{{$row->name}}">{{$row->name}}</a></div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$row->price}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$row->price+10}}</em></span>
											</div>
											<div class="s-extra-box">
												<span class="s-comment">好评: 98.03%</span>
												<span class="s-sales">销量:{{$row->sales}}</span>
											</div>
										</div>
										<div class="s-tp">
											<a href="/collectdel?good_id={{$row->id}}"><span class="ui-btn-loading-before">取消收藏</span></a>
											<i class="am-icon-shopping-cart"></i>
											<a href="#"><span class="ui-btn-loading-before buy">商品详情</span></a>
											<p>
												<a href="javascript:;" class="c-nodo J_delFav_btn">取消收藏</a>
											</p>
										</div>
									</div>

									
									@endif
								</div>
								@endforeach
							</div>



						</div>

					</div>

				</div>

@endsection

