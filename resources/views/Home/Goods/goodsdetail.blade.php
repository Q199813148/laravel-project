@extends("Home.HomePublic.index")
<link href="static/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
<link href="static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
<link href="static/Home/basic/css/demo.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="static/Home/css/optstyle.css" rel="stylesheet" />
<link type="text/css" href="static/Home/css/style.css" rel="stylesheet" />

<script type="text/javascript" src="static/Home/basic/js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="static/Home/basic/js/quick_links.js"></script>

<script type="text/javascript" src="static/Home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
<script type="text/javascript" src="static/Home/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="static/Home/js/list.js"></script>

<link href="static/address/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="static/address/css/city-picker.css" rel="stylesheet" type="text/css" />
<script src="static/address/js/jquery.js"></script>
<script src="static/address/js/bootstrap.js"></script>
<script src="static/address/js/city-picker.data.js"></script>
<script src="static/address/js/city-picker.js"></script>
<script src="static/address/js/main.js"></script>
@section('goods')


    <b class="line"></b>
    <div class="listMain">

        <!--分类-->


        <!--放大镜-->

        <div class="item-inform">
            <div class="clearfixLeft" id="clearcontent">

                <div class="box">
                    <script type="text/javascript">
                        $(document).ready(function() {
                            (function($){$.fn.imagezoom=function(options){var settings={xzoom:450,yzoom:400,offset:10,position:"BTR",preload:1};if(options){$.extend(settings,options);}
                                var noalt='';var self=this;$(this).bind("mouseenter",function(ev){var imageLeft=$(this).offset().left;var imageTop=$(this).offset().top;var imageWidth=$(this).get(0).offsetWidth;var imageHeight=$(this).get(0).offsetHeight;var boxLeft=$(this).parent().offset().left;var boxTop=$(this).parent().offset().top;var boxWidth=$(this).parent().width();var boxHeight=$(this).parent().height();noalt=$(this).attr("alt");var bigimage=$(this).attr("rel");$(this).attr("alt",'');if($("div.zoomDiv").get().length==0){$(document.body).append("<div class='zoomDiv'><img class='bigimg' src='"+bigimage+"'/></div><div class='zoomMask'>&nbsp;</div>");}
                                    if(settings.position=="BTR"){if(boxLeft+boxWidth+settings.offset+settings.xzoom>screen.width){leftpos=boxLeft-settings.offset-settings.xzoom;}else{leftpos=boxLeft+boxWidth+settings.offset;}}else{leftpos=imageLeft-settings.xzoom-settings.offset;if(leftpos<0){leftpos=imageLeft+imageWidth+settings.offset;}}
                                    $("div.zoomDiv").css({top:boxTop,left:leftpos});$("div.zoomDiv").width(settings.xzoom);$("div.zoomDiv").height(settings.yzoom);$("div.zoomDiv").show();$(this).css('cursor','crosshair');$(document.body).mousemove(function(e){mouse=new MouseEvent(e);if(mouse.x<imageLeft||mouse.x>imageLeft+imageWidth||mouse.y<imageTop||mouse.y>imageTop+imageHeight){mouseOutImage();return;}
                                        var bigwidth=$(".bigimg").get(0).offsetWidth;var bigheight=$(".bigimg").get(0).offsetHeight;var scaley='x';var scalex='y';if(isNaN(scalex)|isNaN(scaley)){var scalex=(bigwidth/imageWidth);var scaley=(bigheight/imageHeight);$("div.zoomMask").width((settings.xzoom)/scalex);$("div.zoomMask").height((settings.yzoom)/scaley);$("div.zoomMask").css('visibility','visible');}
                                        xpos=mouse.x-$("div.zoomMask").width()/2;ypos=mouse.y-$("div.zoomMask").height()/2;xposs=mouse.x-$("div.zoomMask").width()/2-imageLeft;yposs=mouse.y-$("div.zoomMask").height()/2-imageTop;xpos=(mouse.x-$("div.zoomMask").width()/2<imageLeft)?imageLeft:(mouse.x+$("div.zoomMask").width()/2>imageWidth+imageLeft)?(imageWidth+imageLeft-$("div.zoomMask").width()):xpos;ypos=(mouse.y-$("div.zoomMask").height()/2<imageTop)?imageTop:(mouse.y+$("div.zoomMask").height()/2>imageHeight+imageTop)?(imageHeight+imageTop-$("div.zoomMask").height()):ypos;$("div.zoomMask").css({top:ypos,left:xpos});$("div.zoomDiv").get(0).scrollLeft=xposs*scalex;$("div.zoomDiv").get(0).scrollTop=yposs*scaley;});});function mouseOutImage(){$(self).attr("alt",noalt);$(document.body).unbind("mousemove");$("div.zoomMask").remove();$("div.zoomDiv").remove();}
                                count=0;if(settings.preload){$('body').append("<div style='display:none;' class='jqPreload"+count+"'></div>");$(this).each(function(){var imagetopreload=$(this).attr("rel");var content=jQuery('div.jqPreload'+count+'').html();jQuery('div.jqPreload'+count+'').html(content+'<img src=\"'+imagetopreload+'\">');});}}})(jQuery);function MouseEvent(e){this.x=e.pageX;this.y=e.pageY;}
                            $(".jqzoom").imagezoom();
                            $("#thumblist li a").click(function() {
                                $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
                                $(".jqzoom").attr('src', $(this).find("img").attr("mid"));
                                $(".jqzoom").attr('rel', $(this).find("img").attr("big"));
                            });
                        });
                    </script>

                    <div class="tb-booth tb-pic tb-s310">
                        <a href="{{$data->photo}}"><img src="{{$data->photo}}" alt="细节展示放大镜特效" rel="{{$data->photo}}" class="jqzoom" /></a>
                    </div>
                    <ul class="tb-thumb" id="thumblist">
                        <li class="tb-selected">
                            <div class="tb-pic tb-s40">
                                <a><img src="{{$data->photo}}" mid="{{$data->photo}}" big="{{$data->photo}}"></a>
                            </div>
                        </li>
                        <li>
                            <div class="tb-pic tb-s40">
                                <a><img src="{{$data->photo}}" mid="{{$data->photo}}" big="{{$data->photo}}"></a>
                            </div>
                        </li>
                        <li>
                            <div class="tb-pic tb-s40">
                                <a><img src="{{$data->photo}}" mid="{{$data->photo}}" big="{{$data->photo}}"></a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="clear"></div>
            </div>

            <div class="clearfixRight">

                <!--规格属性-->
                <!--名称-->
                <div class="tb-detail-hd">
                    <h1>
                        {{$data->name}}
                    </h1>
                </div>
                <div class="tb-detail-list">
                    <!--价格-->
                    <div class="tb-detail-price">
                        <li class="price iteminfo_price">
                            <dt>促销价</dt>
                            <dd><em>¥</em><b class="sys_item_price">{{$data->price}}</b>  </dd>
                        </li>
                        <li class="price iteminfo_mktprice">
                            <dt>原价</dt>
                            <dd><em>¥</em><b class="sys_item_mktprice">{{$data->price+10.00}}</b></dd>
                        </li>
                        <div class="clear"></div>
                    </div>

                    <!--地址-->
                    <dl class="iteminfo_parameter freight">
                        <dt>配送至</dt>
                        <div class="docs-methods">
                            <form class="form-inline">
                                <div id="distpicker">
                                    <div class="form-group">
                                        <div style="position: relative;">
                                            <input id="city-picker3" class="form-control" readonly type="text" value="广东省/广州市/天河区" data-toggle="city-picker">快递<b class="sys_item_freprice">0</b>元
                                            </div>
                                    </div>
                                </div>

                            </form>
                        </div>


                    </dl>
                    <div class="clear"></div>

                    <!--销量-->
                    <ul class="tm-ind-panel">
                        <li class="tm-ind-item tm-ind-sellCount canClick">
                            <div class="tm-indcon"><span class="tm-label">月销量</span><span class="tm-count">{{$data->sales}}</span></div>
                        </li>
                        <li class="tm-ind-item tm-ind-sumCount canClick">
                            <div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">{{$data->sales+123}}</span></div>
                        </li>
                        <li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
                            <div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count">0</span></div>
                        </li>
                    </ul>
                    <div class="clear"></div>

                    <!--各种规格-->
                    <dl class="iteminfo_parameter sys_item_specpara">
                        <dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
                        <dd>
                            <!--操作页面-->

                            <div class="theme-popover-mask"></div>

                            <div class="theme-popover">
                                <div class="theme-span"></div>
                                <div class="theme-poptit">
                                    <a href="static/Home/javascript:;" title="关闭" class="close">×</a>
                                </div>
                                <div class="theme-popbod dform">
                                    <form id="order_form" class="theme-signin" name="loginform" action="/confirm_order" method="post">
                                        {{csrf_field()}}
                                        <div class="theme-signin-left">

                                            <div class="theme-options">
                                                <div class="cart-title">口味</div>
                                                <ul>
                                                    @foreach($taste as $v)
                                                    <li class="sku-line">{{$v}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="theme-options">
                                                <div class="cart-title number">数量</div>
                                                <input type="hidden" name="goods_id" value="{{$id}}">
                                                <input type="hidden" name="taste" value="">

                        <dd>
                            <input id="min" class="am-btn am-btn-default" name="" type="button" value="-" disabled/>
                            <input id="text_box" name="num" type="text" value="1" style="width:40px;" />
                            <input id="add" class="am-btn am-btn-default" name="" type="button" value="+" />
                            <span id="Stock" class="tb-hidden">库存<span class="stock">{{$data->store}}</span>件</span>
                        </dd>


                </div>
                <div class="clear"></div>

            </div>


            </form>
        </div>
    </div>

    </dd>
    </dl>
    <div class="clear"></div>
    <!--活动	-->
    <div class="shopPromotion gold">
        <div class="hot">
            <dt class="tb-metatit">店铺优惠</dt>
            <div class="gold-list">
                <p>暂无优惠<span>点击领券<i class="am-icon-sort-down"></i></span></p>
            </div>
        </div>
        <div class="clear"></div>
        <div class="coupon">
            <dt class="tb-metatit">优惠券</dt>
            <div class="gold-list">
                <ul>
                    <li>暂无优惠券</li>
                </ul>
            </div>
        </div>
    </div>
    </div>

    <div class="pay">
        <div class="pay-opt">
            <a href="static/Home/home.html"><span class="am-icon-home am-icon-fw">首页</span></a>
            <a><span class="am-icon-heart am-icon-fw">收藏</span></a>

        </div>
        <li>
            <div class="clearfix tb-btn tb-btn-buy theme-login">
                <a id="LikBuy" title="点此按钮到下一步确认购买信息" href="javascript:viod(0)" data-am-modal="{target: '#my-alert'}">立即购买</a>
            </div>

        </li>
        <li>
            <div class="clearfix tb-btn tb-btn-basket theme-login">
                <a id="LikBasket" title="加入购物车" href="javascript:viod(0)"><i></i>加入购物车</a>
            </div>
        </li>
    </div>

    </div>

    <div class="clear"></div>

    </div>


    <div class="clear"></div>


    <!-- introduce-->

    <div class="introduce">
        <div class="browse">
            <div class="mc">
                <ul>
                    <div class="mt">
                        <h2>看了又看</h2>
                    </div>
                    @foreach($match as $val)
                    <li class="first">
                        <div class="p-img">
                            <a  href="/goodsdetail?id={{$val->id}}"> <img class="" src="{{$val->photo}}"> </a>
                        </div>
                        <div class="p-name"><a href="static/Home/#">
                                <a  href="/goodsdetail?id={{$val->id}}">{{$val->name}}</a>
                            </a>
                        </div>
                        <div class="p-price"><strong>￥{{$val->price}}</strong></div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="introduceMain">
            <div class="am-tabs" data-am-tabs>
                <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active">
                        <a href="static/Home/#">

                            <span class="index-needs-dt-txt">宝贝详情</span></a>

                    </li>

                    <li>
                        <a href="static/Home/#">

                            <span class="index-needs-dt-txt">全部评价</span></a>

                    </li>

                    <li>
                        <a href="static/Home/#">

                            <span class="index-needs-dt-txt">猜你喜欢</span></a>
                    </li>
                </ul>

                <div class="am-tabs-bd">

                    <div class="am-tab-panel am-fade am-in am-active">
                        <div class="J_Brand">

                            <div class="attr-list-hd tm-clear">
                                <h4>产品参数：</h4></div>
                            <div class="clear"></div>
                            <ul id="J_AttrUL">
                                <li title="">产品类型:&nbsp;烘炒类</li>
                                <li title="">原料产地:&nbsp;巴基斯坦</li>
                                <li title="">产地:&nbsp;{{$data->company}}</li>
                                <li title="">配料表:&nbsp;进口松子、食用盐</li>
                                <li title="">产品规格:&nbsp;210g</li>
                                <li title="">保质期:&nbsp;180天</li>
                                <li title="">产品标准号:&nbsp;GB/T 22165</li>
                                <li title="">生产许可证编号：&nbsp;QS4201 1801 0226</li>
                                <li title="">储存方法：&nbsp;请放置于常温、阴凉、通风、干燥处保存 </li>
                                <li title="">食用方法：&nbsp;开袋去壳即食</li>
                            </ul>
                            <div class="clear"></div>
                        </div>

                        <div class="details">
                            <div class="attr-list-hd after-market-hd">
                                <h4>商品细节</h4>
                            </div>
                            <div class="twlistNews">
                                {!! $data->pic !!}
                            </div>
                        </div>
                        <div class="clear"></div>

                    </div>

                    <div class="am-tab-panel am-fade">

                        <div class="actor-new">
                            <div class="rate">
                                <strong>100<span>%</span></strong><br> <span>好评度</span>
                            </div>
                            <dl>
                                <dt>买家印象</dt>
                                <dd class="p-bfc">
                                    <q class="comm-tags"><span>味道不错</span><em>(2177)</em></q>
                                    <q class="comm-tags"><span>颗粒饱满</span><em>(1860)</em></q>
                                    <q class="comm-tags"><span>口感好</span><em>(1823)</em></q>
                                    <q class="comm-tags"><span>商品不错</span><em>(1689)</em></q>
                                    <q class="comm-tags"><span>香脆可口</span><em>(1488)</em></q>
                                    <q class="comm-tags"><span>个个开口</span><em>(1392)</em></q>
                                    <q class="comm-tags"><span>价格便宜</span><em>(1119)</em></q>
                                    <q class="comm-tags"><span>特价买的</span><em>(865)</em></q>
                                    <q class="comm-tags"><span>皮很薄</span><em>(831)</em></q>
                                </dd>
                            </dl>
                        </div>
                        <div class="clear"></div>
                        <div class="tb-r-filter-bar">
                            <ul class=" tb-taglist am-avg-sm-4">
                                <li class="tb-taglist-li tb-taglist-li-current">
                                    <div class="comment-info">
                                        <span>全部评价</span>
                                        <span class="tb-tbcr-num">(32)</span>
                                    </div>
                                </li>

                                <li class="tb-taglist-li tb-taglist-li-1">
                                    <div class="comment-info">
                                        <span>好评</span>
                                        <span class="tb-tbcr-num">(32)</span>
                                    </div>
                                </li>

                                <li class="tb-taglist-li tb-taglist-li-0">
                                    <div class="comment-info">
                                        <span>中评</span>
                                        <span class="tb-tbcr-num">(32)</span>
                                    </div>
                                </li>

                                <li class="tb-taglist-li tb-taglist-li--1">
                                    <div class="comment-info">
                                        <span>差评</span>
                                        <span class="tb-tbcr-num">(32)</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="clear"></div>

                        <ul class="am-comments-list am-comments-list-flip">
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">b***1 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月02日 17:46</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255776406962">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">l***4 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年10月28日 11:33</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255095758792">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                没有色差，很暖和……美美的
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：蓝调灰&nbsp;&nbsp;尺码：2XL
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">b***1 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月02日 17:46</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255776406962">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">h***n (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月25日 12:48</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="258040417670">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                式样不错，初冬穿
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：L
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>

                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">b***1 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月02日 17:46</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255776406962">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">l***4 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年10月28日 11:33</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255095758792">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                没有色差，很暖和……美美的
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：蓝调灰&nbsp;&nbsp;尺码：2XL
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">b***1 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月02日 17:46</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255776406962">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">h***n (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月25日 12:48</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="258040417670">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                式样不错，初冬穿
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：L
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">b***1 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月02日 17:46</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255776406962">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">l***4 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年10月28日 11:33</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255095758792">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                没有色差，很暖和……美美的
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：蓝调灰&nbsp;&nbsp;尺码：2XL
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">b***1 (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月02日 17:46</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255776406962">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
                                            </div>
                                        </div>

                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="static/Home/">
                                    <img class="am-comment-avatar" src="static/Home/images/hwbn40x40.jpg" />
                                    <!-- 评论者头像 -->
                                </a>

                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="static/Home/#link-to-user" class="am-comment-author">h***n (匿名)</a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">2015年11月25日 12:48</time>
                                        </div>
                                    </header>

                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="258040417670">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                式样不错，初冬穿
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：L
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>

                        </ul>

                        <div class="clear"></div>

                        <!--分页 -->
                        <ul class="am-pagination am-pagination-right">
                            <li class="am-disabled"><a href="static/Home/#">&laquo;</a></li>
                            <li class="am-active"><a href="static/Home/#">1</a></li>
                            <li><a href="static/Home/#">2</a></li>
                            <li><a href="static/Home/#">3</a></li>
                            <li><a href="static/Home/#">4</a></li>
                            <li><a href="static/Home/#">5</a></li>
                            <li><a href="static/Home/#">&raquo;</a></li>
                        </ul>
                        <div class="clear"></div>

                        <div class="tb-reviewsft">
                            <div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="static/Home/#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
                        </div>

                    </div>

                    <div class="am-tab-panel am-fade">
                        <div class="like">
                            <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                                @foreach($guess as $value)
                                <li>
                                    <div class="i-pic limit">
                                        <a href="/goodsdetail?id={{$value->id}}"><img src="{{$value->photo}}" /></a>
                                        <a href="/goodsdetail?id={{$value->id}}"><p>{{$value->name}}</p></a>
                                        <p class="price fl">
                                            <b>¥</b>
                                            <strong>{{$value->price}}</strong>
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="clear"></div>



                    </div>

                </div>

            </div>

            <div class="clear"></div>


        </div>

    </div>
    <script>
                {{--最大数量--}}
        var store = JSON.parse({{$data->store}});

        $('#text_box').change(function () {
            box = $(this);
            var num = $('#text_box').val();
            if(num >= store){
                $(this).val(store);
                $('#add').attr('disabled','true');
                $('#min').removeAttr('disabled');
            }else if(num <= 1){
                $(this).val('1');
                $('#add').removeAttr('disabled');
                $('#min').attr('disabled','true');
            }else{
                $('#add').removeAttr('disabled');
                $('#min').removeAttr('disabled');
            }
        })
        $('#min').click(function(){
            var num = parseInt($('#text_box').val()) - 1;
            $('#text_box').val(num);
            if(num <= 1){
                $('#text_box').val('1');
                $('#add').removeAttr('disabled');
                $('#min').attr('disabled','true');
            }else{
                $('#add').removeAttr('disabled');
                $('#min').removeAttr('disabled');
            }
        })
        $('#add').click(function(){
            var num = parseInt($('#text_box').val()) + 1;
            $('#text_box').val(num);
            if(num >= store){
                $('#text_box').val(store);
                $('#add').attr('disabled','true');
                $('#min').removeAttr('disabled');
            }else{
                $('#add').removeAttr('disabled');
                $('#min').removeAttr('disabled');
            }
        })

    </script>

    <script>
        $('.slideall').css('height','0px');
        $('.introduce').css("min-height",'1400px')
        //立即购买
        $('#LikBuy').click(function(){
            var taste = $(".theme-options li[class='sku-line selected']").html();
            if(taste == undefined){
                alert('至少选择一种口味');exit;
            }
            $("#order_form").attr('action','/confirm_order?msg=immediately');
            $('input[name="taste"]').val(taste);
            $('#order_form').submit();
        })
        //加入购物车
        $('#LikBasket').click(function () {
            var taste = $(".theme-options li[class='sku-line selected']").html();
            if(taste == undefined){
                alert('至少选择一种口味');exit;
            }
            $("#order_form").attr('action','/cart');
            $('input[name="taste"]').val(taste);
            $('#order_form').submit();
        })

    </script>
@endsection
