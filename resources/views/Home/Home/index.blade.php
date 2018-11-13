@extends("Home.HomePublic.index")

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
					<a href="person/index.html">
          <!-- 头像 -->
						<img src="/static/Home/images/getAvatar.do.jpg">
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
					<a href="person/index.html">
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
                            <a href="#">
                                <strong>0</strong>待收货
                            </a>
                            <a href="#">
                                <strong>0</strong>待发货
                            </a>
                            <a href="#">
                                <strong>0</strong>待付款
                            </a>
                            <a href="#">
                                <strong>0</strong>待评价
                            </a>
                        </div>
                    @else
                        <div class="member-logout">
                            <a class="am-btn-warning btn" href="/login">
                                登录
                            </a>
                            <a class="am-btn-warning btn" href="">
                                注册
                            </a>
                        </div>
                    @endif
                    <div class="clear"></div>
                </div>
                <li>
                    <a target="_blank" href="#">
                        <span>[特惠]</span>洋河年末大促，低至两件五折
                    </a>
                </li>
                <li>
                    <a target="_blank" href="#">
                        <span>[公告]</span>华北、华中部分地区配送延迟
                    </a>
                </li>
                <li>
                    <a target="_blank" href="#">
                        <span>[特惠]</span>家电狂欢千亿礼券 买1送1！
                    </a>
                </li>

<<<<<<< HEAD
        
				@if(session('user'))
				<div class="member-login" style="display: inline-block;">
					<a href="#">
						<strong>0</strong>待收货
					</a>
					<a href="#">
						<strong>0</strong>待发货
					</a>
					<a href="#">
						<strong>0</strong>待付款
					</a>
					<a href="#">
						<strong>0</strong>待评价
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
		
=======
            </ul>
>>>>>>> 54d2f397589d47ecd11573dcd7fff5a28ff93d15

            <div class="advTip">
                <img src="/static/Home/images/advTip.jpg"/>
            </div>
        </div>
    </div>
@endsection
<!--今日推荐-->
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
                <a href="{{$value->url}}"><img src="{{$value->pic}} "></img></a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
@endsection
<!--热门活动-->
@section('activity')
    <div class="am-container activity ">
        <div class="shopTitle ">
            <h4>活动</h4>
            <h3>每期活动 优惠享不停 </h3>
            <span class="more ">
	<a href="# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
	</span>
        </div>
        <div class="am-g am-g-fixed ">
            <div class="am-u-sm-3 ">
                <div class="icon-sale one "></div>
                <h4>秒杀</h4>
                <div class="activityMain ">
                    <img src="/static/Home/images/activity1.jpg "></img>
                </div>
                <div class="info ">
                    <h3>春节送礼优选</h3>
                </div>
            </div>
            <div class="am-u-sm-3 ">
                <div class="icon-sale two "></div>
                <h4>特惠</h4>
                <div class="activityMain ">
                    <img src="/static/Home/images/activity2.jpg "></img>
                </div>
                <div class="info ">
                    <h3>春节送礼优选</h3>
                </div>
            </div>
            <div class="am-u-sm-3 ">
                <div class="icon-sale three "></div>
                <h4>团购</h4>
                <div class="activityMain ">
                    <img src="/static/Home/images/activity3.jpg "></img>
                </div>
                <div class="info ">
                    <h3>春节送礼优选</h3>
                </div>
            </div>
            <div class="am-u-sm-3 last ">
                <div class="icon-sale "></div>
                <h4>超值</h4>
                <div class="activityMain ">
                    <img src="/static/Home/images/activity.jpg "></img>
                </div>
                <div class="info ">
                    <h3>春节送礼优选</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--商品列表-->
@section('goods')
    <div id="f1">
        <!--甜点-->
        <div class="am-container ">
            <div class="shopTitle ">
                <h4>甜品</h4>
                <h3>每一道甜品都有一个故事</h3>
                <div class="today-brands ">
                    <a href="# ">桂花糕</a>
                    <a href="# ">奶皮酥</a>
                    <a href="# ">栗子糕 </a>
                    <a href="# ">马卡龙</a>
                    <a href="# ">铜锣烧</a>
                    <a href="# ">豌豆黄</a>
                </div>
                <span class="more ">
	<a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
	</span>
            </div>
        </div>
        <div class="am-g am-g-fixed floodFour">
            <div class="am-u-sm-5 am-u-md-4 text-one list ">
                <div class="word">
                    <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                    <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                    <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                    <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                    <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                    <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                </div>
                <a href="# ">
                    <div class="outer-con ">
                        <div class="title ">
                            开抢啦！
                        </div>
                        <div class="sub-title ">
                            零食大礼包
                        </div>
                    </div>
                    <img src="/static/Home/images/act1.png " />
                </a>
                <div class="triangle-topright"></div>
            </div>
            <div class="am-u-sm-7 am-u-md-4 text-two sug">
                <div class="outer-con ">
                    <div class="title ">
                        雪之恋和风大福
                    </div>
                    <div class="sub-title ">
                        ¥13.8
                    </div>
                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                </div>
                <a href="# "><img src="/static/Home/images/2.jpg" /></a>
            </div>
            <div class="am-u-sm-7 am-u-md-4 text-two">
                <div class="outer-con ">
                    <div class="title ">
                        雪之恋和风大福
                    </div>
                    <div class="sub-title ">
                        ¥13.8
                    </div>
                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                </div>
                <a href="# "><img src="/static/Home/images/1.jpg" /></a>
            </div>
            <div class="am-u-sm-3 am-u-md-2 text-three big">
                <div class="outer-con ">
                    <div class="title ">
                        小优布丁
                    </div>
                    <div class="sub-title ">
                        ¥4.8
                    </div>
                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                </div>
                <a href="# ">
                    <img src="/static/Home/images/5.jpg" />
                </a>
            </div>
            <div class="am-u-sm-3 am-u-md-2 text-three sug">
                <div class="outer-con ">
                    <div class="title ">
                        小优布丁
                    </div>
                    <div class="sub-title ">
                        ¥4.8
                    </div>
                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                </div>
                <a href="# ">
                    <img src="/static/Home/images/3.jpg" />
                </a>
            </div>
            <div class="am-u-sm-3 am-u-md-2 text-three ">
                <div class="outer-con ">
                    <div class="title ">
                        小优布丁
                    </div>
                    <div class="sub-title ">
                        ¥4.8
                    </div>
                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                </div>
                <a href="# ">
                    <img src="/static/Home/images/4.jpg" />
                </a>
            </div>
            <div class="am-u-sm-3 am-u-md-2 text-three last big ">
                <div class="outer-con ">
                    <div class="title ">
                        小优布丁
                    </div>
                    <div class="sub-title ">
                        ¥4.8
                    </div>
                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                </div>
                <a href="# ">
                    <img src="/static/Home/images/5.jpg" />
                </a>
            </div>
        </div>
        <div class="clear "></div>
    </div>
@endsection
