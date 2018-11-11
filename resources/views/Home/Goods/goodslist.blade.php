@extends("Home.HomePublic.index")
<style>
    .pagination{
        width: 166px;
    }
</style>
@section('goods')
<link href="/static/Home/css/seastyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/static/Home/js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="/static/Home/js/script.js"></script>
<script src="/static/home/js/jquery-1.7.2.min.js"></script>
<script>
    $('.slideall').css('height','0px');
    $('.footer').css('margin-left','60px');
</script>
<div class="am-g am-g-fixed">
    <div class="am-u-sm-12 am-u-md-12">
        <div class="theme-popover">
            <div class="searchAbout">
                <span class="font-pale">相关搜索：</span>
                <a title="坚果" href="#">坚果</a>
                <a title="瓜子" href="#">瓜子</a>
                <a title="鸡腿" href="#">豆干</a>

            </div>
            <ul class="select">
                <p class="title font-normal">
                    <span class="fl">{{$ss}}</span>
                    <span class="total fl">搜索到<strong class="num">{{$num}}</strong>件相关商品</span>
                </p>
                <div class="clear"></div>
                <li class="select-result">
                    <dl>
                        <dt>已选</dt>
                        <dd class="select-no"></dd>
                        <p class="eliminateCriteria">清除</p>
                    </dl>
                </li>
                <div class="clear"></div>
                <li class="select-list">
                    <dl id="select1">
                        <dt class="am-badge am-round">品牌</dt>

                        <div class="dd-conent">
                            <dd class="select-all selected"><a href="#">全部</a></dd>
                            <dd><a href="#">百草味</a></dd>
                            <dd><a href="#">良品铺子</a></dd>
                            <dd><a href="#">新农哥</a></dd>
                            <dd><a href="#">楼兰蜜语</a></dd>
                            <dd><a href="#">口水娃</a></dd>
                            <dd><a href="#">考拉兄弟</a></dd>
                        </div>

                    </dl>
                </li>
                <li class="select-list">
                    <dl id="select2">
                        <dt class="am-badge am-round">种类</dt>
                        <div class="dd-conent">
                            <dd class="select-all selected"><a href="#">全部</a></dd>
                            <dd><a href="#">东北松子</a></dd>
                            <dd><a href="#">巴西松子</a></dd>
                            <dd><a href="#">夏威夷果</a></dd>
                            <dd><a href="#">松子</a></dd>
                        </div>
                    </dl>
                </li>
                <li class="select-list">
                    <dl id="select3">
                        <dt class="am-badge am-round">选购热点</dt>
                        <div class="dd-conent">
                            <dd class="select-all selected"><a href="#">全部</a></dd>
                            <dd><a href="#">手剥松子</a></dd>
                            <dd><a href="#">薄壳松子</a></dd>
                            <dd><a href="#">进口零食</a></dd>
                            <dd><a href="#">有机零食</a></dd>
                        </div>
                    </dl>
                </li>

            </ul>
            <div class="clear"></div>
        </div>
        <div class="search-content">
            <div class="sort">
                @if(empty($request['order']))
                <li class="first"><a href="/goodslist?ss={{$ss}}" title="综合">综合排序</a></li>
                <li><a href="/goodslist?order=sales&ss={{$ss}}" title="销量">销量排序</a></li>
                <li><a title="价格">价格优先</a></li>
                @else
                <li><a href="/goodslist?ss={{$ss}}" title="综合">综合排序</a></li>
                <li class="@if($request['order']=='sales') first @endif"><a href="/goodslist?order=sales&ss={{$ss}}" title="销量">销量排序</a></li>
                <li class="@if($request['order']=='price') first @endif"><a href="/goodslist?order=price&ss={{$ss}}" title="价格">价格优先</a></li>
                @endif
            </div>
            <div class="clear"></div>

            <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                @if($num == 0) <br>&emsp;暂无此商品信息,请重新搜索商品信息 @endif
                @foreach($list as $val)
                <li>
                    <div class="i-pic limit">
                        <a href="/goodsdetail?id={{$val->id}}"><img src="{{$val->photo}}" width="218" height="218"></a>
                        <a href="/goodsdetail?id={{$val->id}}"><p class="title fl">{{$val->name}}</p></a>
                        <p class="price fl">
                            <b>¥</b>
                            <strong>{{$val->price}}</strong>
                        </p>
                        <p class="number fl">
                            销量<span>{{$val->sales}}</span>
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
        <div class="search-side">

            <div class="side-title">
                经典搭配
            </div>
            @foreach($match as $value)
            <li>
                <a href=""></a>
                <div class="i-pic check">
                    <a href="/goodsdetail?id={{$value->id}}"><img src="{{$value->photo}}" width="218" height="218"></a>
                    <a href="/goodsdetail?id={{$value->id}}"><p class="check-title">{{$value->descr}}</p></a>
                    <p class="price fl">
                        <b>¥</b>
                        <strong>{{$value->price}}</strong>
                    </p>
                    <p class="number fl">
                        销量<span>{{$value->sales}}</span>
                    </p>
                </div>
            </li>
            @endforeach

        </div>
        <div class="clear"></div>
        <!--分页 -->
        <center>{!! $list->appends($request)->render() !!}</center>






    </div>
</div>
@endsection
