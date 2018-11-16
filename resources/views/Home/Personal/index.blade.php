@extends("Home.HomePublic.Personal")
@section('title','悦桔拉拉')
@section('static')
<link href="/static/Home/css/systyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">
	<!--center内容-->
	<div class="wrap-left">
		<div class="wrap-list">
			<div class="m-user">
				<!--个人信息 -->
				<div class="m-bg"></div>
				<div class="m-userinfo">
					<div class="m-baseinfo">
						<a href="information.html">
							<img src="{{$user->pic}}">
						</a>
						<em class="s-name">{{session('user')->name}}<span class="vip1"></span></em>
						<div class="s-prestige am-btn am-round">
							@if(session('user')->level == 1) 
							<span style="color: #f00;">VIP</span>
							@else
							普通用户
							@endif
						</div>
					</div>
					<div class="m-right">
						<div class="m-new">
							<a href="news.html">
								<i class="am-icon-bell-o"></i>消息
							</a>
						</div>
						<div class="m-address">
							<a href="/personaladdress" class="i-trigger">
								我的收货地址
							</a>
						</div>
					</div>
				</div>

				<!--个人资产-->
			</div>
			<div class="box-container-bottom"></div>

			<!--订单 -->
			<div class="m-order">
				<div class="s-bar">
					<i class="s-icon"></i>我的订单
					<a class="i-load-more-item-shadow" href="#">
						全部订单
					</a>
				</div>
				<ul>
					<li>
						<a href="#">
							<i>
							<img src="/static/Home/images/pay.png">
							</i><span>待付款<em class="m-num">{{$data['hand']}}</em></span>
						</a>
					</li>
					<li>
						<a href="order.html">
							<i>
							<img src="/static/Home/images/send.png">
							</i><span>待发货<em class="m-num">{{$data['issue']}}</em></span>
						</a>
					</li>
					<li>
						<a href="order.html">
							<i>
							<img src="/static/Home/images/receive.png">
							</i><span>待收货<em class="m-num">{{$data['receipts']}}</em></span>
						</a>
					</li>
					<li>
						<a href="#">
							<i>
							<img src="/static/Home/images/comment.png">
							</i><span>待评价<em class="m-num">{{$data['discuss']}}</em></span>
						</a>
					</li>
					<li>
						<a href="#">
							<i>
							<img src="/static/Home/images/refund.png">
							</i><span>售后</span>
						</a>
					</li>
				</ul>
			</div>
			<!--九宫格-->
			<div class="user-patternIcon">
				<div class="s-bar">
					<i class="s-icon"></i>我的常用
				</div>
				<ul>

					<a href="home/shopcart.html">
						<li class="am-u-sm-4">
							<i class="am-icon-shopping-basket am-icon-md"></i>
							<img src="/static/Home/images/iconbig.png">
							<p>
								购物车
							</p>
						</li>
					</a>
					<a href="/collectlist">
						<li class="am-u-sm-4">
							<i class="am-icon-heart am-icon-md"></i>
							<img src="/static/Home/images/iconsmall1.png">
							<p>
								我的收藏
							</p>
						</li>
					</a>
					<a href="home/home.html">
						<li class="am-u-sm-4">
							<i class="am-icon-gift am-icon-md"></i>
							<img src="/static/Home/images/iconsmall0.png">
							<p>
								为你推荐
							</p>
						</li>
					</a>
					<a href="comment.html">
						<li class="am-u-sm-4">
							<i class="am-icon-pencil am-icon-md"></i>
							<img src="/static/Home/images/iconsmall3.png">
							<p>
								好评宝贝
							</p>
						</li>
					</a>
					<a href="foot.html">
						<li class="am-u-sm-4">
							<i class="am-icon-clock-o am-icon-md"></i>
							<img src="/static/Home/images/iconsmall2.png">
							<p>
								我的足迹
							</p>
						</li>
					</a>
				</ul>
			</div>
			<!--物流 -->
			<!--<div class="m-logistics">

				<div class="s-bar">
					<i class="s-icon"></i>我的物流
				</div>
				<div class="s-content">
					<ul class="lg-list">

						<li class="lg-item">
							<div class="item-info">
								<a href="#">
									<img src="/static/Home/images/65.jpg_120x120xz.jpg" alt="抗严寒冬天保暖隔凉羊毛毡底鞋垫超薄0.35厘米厚吸汗排湿气舒适">
								</a>

							</div>
							<div class="lg-info">

								<p>
									快件已从 义乌 发出
								</p>
								<time>
								2015-12-20 17:58:05
								</time>

								<div class="lg-detail-wrap">
									<a class="lg-detail i-tip-trigger" href="logistics.html">
										查看物流明细
									</a>
									<div class="J_TipsCon hide">
										<div class="s-tip-bar">
											中通快递&nbsp;&nbsp;&nbsp;&nbsp;运单号：373269427686
										</div>
										<div class="s-tip-content">
											<ul>
												<li>
													快件已从 义乌 发出2015-12-20 17:58:05
												</li>
												<li>
													义乌 的 义乌总部直发车 已揽件2015-12-20 17:54:49
												</li>
												<li class="s-omit">
													<a data-spm-anchor-id="a1z02.1.1998049142.3" target="_blank" href="#">
														··· 查看全部
													</a>
												</li>
												<li>
													您的订单开始处理2015-12-20 08:13:48
												</li>

											</ul>
										</div>
									</div>
								</div>

							</div>
							<div class="lg-confirm">
								<a class="i-btn-typical" href="#">
									确认收货
								</a>
							</div>
						</li>
						<div class="clear"></div>

						<li class="lg-item">
							<div class="item-info">
								<a href="#">
									<img src="/static/Home/images/88.jpg_120x120xz.jpg" alt="礼盒袜子女秋冬 纯棉袜加厚 女式中筒袜子 韩国可爱 女袜 女棉袜">
								</a>

							</div>
							<div class="lg-info">

								<p>
									已签收,签收人是青年城签收
								</p>
								<time>
								2015-12-19 15:35:42
								</time>

								<div class="lg-detail-wrap">
									<a class="lg-detail i-tip-trigger" href="logistics.html">
										查看物流明细
									</a>
									<div class="J_TipsCon hide">
										<div class="s-tip-bar">
											天天快递&nbsp;&nbsp;&nbsp;&nbsp;运单号：666287461069
										</div>
										<div class="s-tip-content">
											<ul>

												<li>
													已签收,签收人是青年城签收2015-12-19 15:35:42
												</li>
												<li>
													【光谷关山分部】的派件员【关山代派】正在派件 电话:*2015-12-19 14:27:28
												</li>
												<li class="s-omit">
													<a data-spm-anchor-id="a1z02.1.1998049142.7" target="_blank" href="//wuliu.taobao.com/user/order_detail_new.htm?spm=a1z02.1.1998049142.7.8BJBiJ&amp;trade_id=1479374251166800&amp;seller_id=1651462988&amp;tracelog=yimaidaologistics">
														··· 查看全部
													</a>
												</li>
												<li>
													您的订单开始处理2015-12-17 14:27:50
												</li>

											</ul>
										</div>
									</div>
								</div>

							</div>
							<div class="lg-confirm">
								<a class="i-btn-typical" href="#">
									确认收货
								</a>
							</div>
						</li>

					</ul>

				</div>

			</div>-->

			<!--收藏夹 -->
			<div class="you-like">
				<div class="s-bar">
					我的收藏
					<a class="i-load-more-item-shadow" href="/collectlist">
						查看全部
					</a>
				</div>
				<div class="s-content">
					@foreach($goods as $val)
					@if(!empty($val))
					<div class="s-item-wrap">
						<div class="s-item">
							<div class="s-pic">
								<a href="/goodsdetail?id={{$val->id}}" @if($val->status == 0) onclick="alert('商品已下架');return false" @endif class="s-pic-link">
									<img src="{{$val->photo}}" alt="{{$val->name}}" class="s-pic-img s-guess-item-img">
								</a>
							</div>
							<div class="s-price-box">
								<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$val->price}}</em></span>
								<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$val->price+10}}</em></span>
								<span class="s-history-price"><em class="s-price-sign">@if($val->status == 0) 已下架 @endif</em></span>

							</div>
							<div class="s-title">
								<a href="#" title="{{$val->name}}">
									{{$val->name}}
								</a>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>

				<div class="s-more-btn i-load-more-item" data-screen="0">
					<a href="/">再去逛逛</a>
				</div>

			</div>

		</div>
	</div>
	<!--右侧内容-->
	<div class="wrap-right">

		<!-- 日历-->
		<div class="day-list">
			<div class="s-bar">
				<a class="i-history-trigger s-icon" href="#"></a>
				我的日历
				<a class="i-setting-trigger s-icon" href="#"></a>
			</div>
			<div class="s-care s-care-noweather">
				<div class="s-date">
					<em>{{date('d')}}</em>
					<span>
						@if(date('w') == 1)
						星期一
						@elseif(date('w') == 2)
						星期二
						@elseif(date('w') == 3)
						星期三
						@elseif(date('w') == 4)
						星期四
						@elseif(date('w') == 5)
						星期五
						@elseif(date('w') == 6)
						星期六
						@elseif(date('w') == 0)
						星期日
						@endif
					</span>
					<span>{{date('Y.m')}}</span>
				</div>
			</div>
		</div>
		<!--新品 -->
		@if(!empty($new))
		<div class="new-goods">
			<div class="s-bar">
				<i class="s-icon"></i>今日新品
				<a class="i-load-more-item-shadow">
					
				</a>
			</div>
			<div class="new-goods-info">
				<a class="shop-info" href="/goodsdetail?id={{$new->id}}" target="_blank">
					<div class="face-img-panel">
						<img src="{{$new->photo}}" alt="">
					</div>
					<span class="shop-title">{{$new->name}}</span>
				</a>
				<a class="follow " target="_blank">
					关注
				</a>
			</div>
		</div>
		@endif
		<!--热卖推荐 -->
		@if(!empty($sales))
		<div class="new-goods">
			<div class="s-bar">
				<i class="s-icon"></i>热卖推荐
			</div>
			<div class="new-goods-info">
				<a class="shop-info" href="/goodsdetail?id={{$sales->id}}" target="_blank">
					<div>
						<img src="{{$sales->photo}}"" alt="{{$sales->name}}">
					</div>
					<span class="one-hot-goods">￥{{$sales->price}}</span>
				</a>
			</div>
		</div>
		@endif
	</div>
</div>

@endsection

@section('list')
<!--左侧列表-->
<ul>
	<li class="person">
		<a href="/personal" style="color: #f00;">
			个人中心
		</a>
	</li>
	<li class="person">
		<span  style="font-size: 18px;"	>
			个人资料
		</span>
		<ul>
			<li>
				<a href="/personal/{{session('user')->user_id}}/edit">
					个人信息
				</a>
			</li>
			<li>
				<a href="/personalsafety">
					安全设置
				</a>
			</li>
			<li>
				<a href="/personaladdress">
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
				<a href="/collectlist">
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
