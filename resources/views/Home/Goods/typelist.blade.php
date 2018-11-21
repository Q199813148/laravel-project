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
                <a title="坚果" href="/goodslist?ss=坚果">坚果</a>
                <a title="零食" href="/goodslist?ss=零食">零食</a>
                <a title="巧克力" href="/goodslist?ss=巧克力">巧克力</a>
            </div>

            <div class="clear"></div>
        </div>
        <div class="search-content">
            <div class="sort">
                @if(empty($request['order']))
                <li class="first"><a href="/typelist?typeid={{$id}}" title="综合">综合排序</a></li>
                <li><a href="/typelist?order=sales&typeid={{$id}}" title="销量">销量排序</a></li>
                <li><a href="/typelist?order=price&typeid={{$id}} title="价格">价格优先</a></li>
                @else
                <li><a href="/typelist?typeid={{$id}}" title="综合">综合排序</a></li>
                <li class="@if($request['order']=='sales') first @endif"><a href="/typelist?order=sales&typeid={{$id}}" title="销量">销量排序</a></li>
                <li class="@if($request['order']=='price') first @endif"><a href="/typelist?order=price&typeid={{$id}}" title="价格">价格优先</a></li>
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
<script>
    document.title = $('.searchTitle').html()+'_零食么搜索';
</script>
@endsection
