@extends("Home.HomePublic.index")
@section('title','零食么 - 吃!  我喜欢')
<!--轮播图-->
@section('adminshows')
    <div class="banner">
        <!--轮播 -->
        <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
            <ul class="am-slides">
                @if(!empty($shows->all()))
                @foreach($shows as $value)
                <li class="banner{{$i++}}">
                    <a href="{{$value->url}}">
                        <img id="shows" src="{{$value->pic}}" alt="{{$value->name}}"/>
                    </a>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        <div class="clear"></div>
    </div>

@endsection
<!--侧边导航-->
@section('types')

<div id="nav" class="navfull">
	<div class="area clearfix">
		<div class="category-content" id="guide_2">
			<div class="category">
				<ul class="category-list" style="height: 450px;" id="js_climit_li">
        @foreach ($types as $row)
					<li class="appliance js_toggle relative first">
						<div class="category-info">
							<h3 class="category-name b-category-name"><i>
							<img src="/static/Home/images/cake.png">
							</i>
							<a class="ml-22" title="{{$row->name}}">
              {{$row->name}}
							</a></h3>
							<em>&gt;</em>
						</div>
						<div class="menu-item menu-in top">
							<div class="area-in">
								<div class="area-bg">
									<div class="menu-srot">
										<div class="sort-side">
                    @foreach ($row->suv as $rows)
											<dl class="dl-sort" style="height:150px;">
												<dt>
												<span title="{{$rows->name}}">{{$rows->name}}</span>
												</dt>
                        @foreach ($rows->suv as $rowss)
												<dd>
													<a title="{{$rowss->name}}" href="/typelist?typeid={{$rowss->id}}">
														<span>{{$rowss->name}}</span>
													</a>
												</dd>
                        @endforeach
											</dl>
                      @endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
						<b class="arrow"></b>
					</li>
          @endforeach
				</ul>
			</div>
		</div>
	</div>
</div>

@endsection

<!--个人中心框-->
@section('personal')

    <div class="marqueen">
        <span class="marqueen-title">商城公告</span>
        <div class="demo">

		<ul>
		<li class="title-first">
				<a  href="#">
					<span>{{$data2['city']}}</span>&nbsp;&nbsp;&nbsp;&nbsp;{{$data2['week']}}
				</a>
			</li>
			<li class="title-first">
				<a href="#">{{$data2['temperature']}}&nbsp;&nbsp;{{$data2['weather']}}</a>
			</li>
			@foreach ($notice as $vel)
			<li class="title-first">
				<a target="_blank" href="/notice?id={{$vel->id}}">
					<span>[公告]</span>{{$vel->title}}
				</a>
			</li>
			@endforeach
			<!--登录-->
			<div class="mod-vip">
				@if(session('user'))
				<div class="m-baseinfo">
					<a href="/personal">
          <!-- 头像 -->
          				@if(!empty($pic->pic))
						<img src="{{$pic->pic}}">
						@else
						<img src="/static/Home/images/getAvatar.do.jpg">
						@endif
					</a>
					<em> Hi,<span class="s-name">{{session('user')->name}}</span><a class="dropdown-item" href="/exit">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                 退出
              </a>
					<p>
						@if(session('user')->level == 0)
						普通用户
						@else
						VIP会员
						@endif
					</p> </em>
				</div>
				@else
				<div class="m-baseinfo">
					<a href="/personal">
          <!-- 头像 -->
						<img src="/static/Home/images/getAvatar.do.jpg">
					</a>
					<em> Hi,<span class="s-name">登录后更精彩</span>
					<p>
						level
					</p> </em>
				</div>
				@endif


				@if(session('user'))
				<div class="member-login" style="display: inline-block;">
                    <a href="/order_management">
                        <strong>{{$orderInfo['dfk']}}</strong>待付款
                    </a>
					<a href="/order_management">
						<strong>{{$orderInfo['dsh']}}</strong>待收货
					</a>
					<a href="/order_management">
						<strong>{{$orderInfo['dfh']}}</strong>待发货
					</a>
					<a href="/order_management">
						<strong>{{$orderInfo['dpj']}}</strong>待评价
					</a>
				</div>
				@else
				<div class="member-logout">
					<a class="am-btn-warning btn" href="/login">
						登录
					</a>
					<a class="am-btn-warning btn" href="/regist">
						注册
					</a>
				</div>
				@endif
				<div class="clear"></div>


            </div>

            </ul>

            <div class="advTip">
                <img src="/static/Home/images/advTip.jpg"/>
            </div>
        </div>
    </div>
@endsection
<!--广告-->
@section('recommend')
    <div class="am-g am-g-fixed recommendation">
        @if(!empty($advertisements))
        @foreach ($advertisements as $value)
        <div class="am-u-sm-4 am-u-lg-3 ">
            <div class="info ">
                <h3>{{$value->title}}</h3>
                <h4>{{$value->descr}}</h4>
            </div>
            <div class="recommendationMain one">
                <a href="http://{{$value->url}}"><img src="{{$value->pic}} "></img></a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
@endsection
<!--热门活动-->
@section('activity')

@endsection
<!--商品列表-->
@section('goods')
    @foreach($type as $key=>$val)
    <div id="f1" style="height:350px;">
        <!--甜点-->
        <div class="am-container ">
            <div class="shopTitle ">
                <h4>{{$val->name}}</h4>
                <span class="more ">
	{{--<a href="/typelist?typeid={{$val->id}}">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>--}}
	</span>
            </div>
        </div>
        <div class="am-g am-g-fixed floodFour">
            <div class="goodslist{{$key}}">
            </div>
        </div>
        <div class="clear "></div>
    </div>
    <script>
        $.get('/homegoodslist',{id:{{$val->id}}},function(data) {
            // alert(data);
            $('.goodslist{{$key}}').html(data);
        });
    </script>
    @endforeach
@endsection
