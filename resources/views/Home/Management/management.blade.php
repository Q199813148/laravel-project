@extends("Home.HomePublic.personal")
@section('title','订单管理')
@section('static')
    <link href="static/Home/css/orstyle.css" rel="stylesheet" type="text/css">
    <script src="/static/Home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/static/Home/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
    <script src="static/Home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

@endsection

@section('content')
    <div class="main-wrap">
        <div class="user-order">

            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> /
                    <small>Order</small>
                </div>
            </div>
            <hr>

            <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">

                <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active"><a href="#tab1">所有订单</a></li>
                    <li class=""><a href="#tab2">待付款</a></li>
                    <li class=""><a href="#tab3">待发货</a></li>
                    <li class=""><a href="#tab4">待收货</a></li>
                    <li class=""><a href="#tab5">待评价</a></li>
                </ul>

                <div class="am-tabs-bd"
                     style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                    <div class="am-tab-panel am-fade am-active am-in" id="tab1">
                        <div class="order-top">
                            <div class="th th-item">
                                商品
                            </div>
                            <div class="th th-price">
                                单价
                            </div>
                            <div class="th th-number">
                                数量
                            </div>
                            <div class="th th-operation">
                                商品操作
                            </div>
                            <div class="th th-amount">
                                合计
                            </div>
                            <div class="th th-status">
                                交易状态
                            </div>
                            <div class="th th-change">
                                交易操作
                            </div>
                        </div>

                        <div class="order-main">
                            <div class="order-list">

                                <!--所有订单-->
                                @foreach($data as $value)
                                    {{--订单开始--}}
                                    <div class="order-status1">
                                        <div class="order-title">
                                            <div class="dd-num">订单编号：<a href="javascript:;">{{$value->orderno}}</a>
                                            </div>
                                            <span>下单时间：{{$value->time}}</span>
                                            <!--    <em>店铺：小桔灯</em>-->
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                                {{--订单内容开始--}}
                                                @foreach($details[$value->id] as $val)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="/goodsdetail?id={{$val->good_id}}"
                                                                   class="J_MakePoint">
                                                                    <img src="{{$val->photo}}"
                                                                         class="itempic J_ItemImg">
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="/goodsdetail?id={{$val->good_id}}">
                                                                        <p>{{$val->name}}</p>
                                                                        <p class="info-little">口味：{{$val->taste}} </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$val->price}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$val->num}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                            <div class="item-operation">

                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                                {{--订单内容结束--}}
                                            </div>
                                            <div class="order-right">
                                                <li class="td td-amount">
                                                    <div class="item-amount">
                                                        合计：{{$value->goods_money}}
                                                        <p>含运费：<span>0.00</span></p>
                                                    </div>
                                                </li>
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        {{--订单状态开始--}}
                                                        @if($value->status == 0)
                                                            <div class="item-status">
                                                                <p class="Mystatus">等待买家付款</p>
                                                                <p class="order-info"><a
                                                                            href="/order_info?id={{$value->id}}">订单详情</a>
                                                                </p>
                                                            </div>
                                                        @elseif($value->status == 1)
                                                            <div class="item-status">
                                                                <p class="Mystatus">买家已付款</p>
                                                                <p class="order-info"><a
                                                                            href="/order_info?id={{$value->id}}">订单详情</a>
                                                                </p>
                                                            </div>
                                                        @elseif($value->status == 2)
                                                            <div class="item-status">
                                                                <p class="Mystatus">卖家已发货</p>
                                                                <p class="order-info"><a
                                                                            href="/order_info?id={{$value->id}}">订单详情</a>
                                                                </p>
                                                                <p class="order-info"><a
                                                                            href="/order_info?id={{$value->id}}">查看物流</a>
                                                                </p>
                                                            </div>
                                                        @elseif($value->status == 3)
                                                            <div class="item-status">
                                                                <p class="Mystatus">交易成功</p>
                                                                <p class="order-info"><a
                                                                            href="/order_info?id={{$value->id}}">订单详情</a>
                                                                </p>
                                                                <p class="order-info"><a
                                                                            href="/order_info?id={{$value->id}}">查看物流</a>
                                                                </p>
                                                            </div>
                                                        @elseif($value->status == 4)
                                                            <div class="item-status">
                                                                <p class="Mystatus">评价完成</p>
                                                                <p class="order-info"><a
                                                                            href="/order_info?id={{$value->id}}">订单详情</a>
                                                                </p>
                                                                <p class="order-info"><a
                                                                            href="/order_info?id={{$value->id}}">查看物流</a>
                                                                </p>
                                                            </div>
                                                        @elseif($value->status == 5)
                                                            <div class="item-status">
                                                                <p class="Mystatus">退款中</p>
                                                                <p class="order-info"><a
                                                                            href="/order_info?id={{$value->id}}">订单详情</a>
                                                                </p>
                                                                <p class="order-info"><a
                                                                            href="/order_info?id={{$value->id}}">查看物流</a>
                                                                </p>
                                                            </div>
                                                        @endif
                                                        {{--订单状态结束--}}
                                                    </li>
                                                    <li class="td td-change">
                                                        {{--订单操作开始--}}
                                                        @if($value->status == 0)
                                                            <a href="/orderpay?id={{$value->id}}">
                                                                <div class="am-btn am-btn-danger anniu">立即支付</div>
                                                            </a>
                                                        @elseif($value->status == 1)
                                                            <div class="am-btn am-btn-danger anniu">等待发货</div>
                                                        @elseif($value->status == 2)
                                                            <a href="/order_management/{{$value->id}}/edit"
                                                               onClick="return confirm('确定收货?');">
                                                                <div class="am-btn am-btn-danger anniu">确认收货</div>
                                                            </a>
                                                        @elseif($value->status == 3)
                                                            <a href="/comment?id={{$value->id}}">
                                                                <div class="am-btn am-btn-danger anniu">立即评价</div>
                                                            </a>
                                                        @elseif($value->status == 4)
                                                            <a href="/order_management/{{$value->id}}"
                                                               onClick="return confirm('确定删除?');">
                                                                <div class="am-btn am-btn-danger anniu">删除订单</div>
                                                            </a>
                                                        @elseif($value->status == 5)
                                                            <a href="/order_management/{{$value->id}}"
                                                               onClick="return confirm('确定删除?');">
                                                                <div class="am-btn am-btn-danger anniu">删除订单</div>
                                                            </a>
                                                            <a href="">
                                                                查看退款信息
                                                            </a>

                                                        @endif
                                                        {{--订单操作结束--}}
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--订单结束--}}
                                @endforeach
                                {{$data->render()}}
                            </div>

                        </div>

                    </div>

                    <div class="am-tab-panel am-fade" id="tab2">

                        <div class="order-top">
                            <div class="th th-item">
                                商品
                            </div>
                            <div class="th th-price">
                                单价
                            </div>
                            <div class="th th-number">
                                数量
                            </div>
                            <div class="th th-operation">
                                商品操作
                            </div>
                            <div class="th th-amount">
                                合计
                            </div>
                            <div class="th th-status">
                                交易状态
                            </div>
                            <div class="th th-change">
                                交易操作
                            </div>
                        </div>

                        <div class="order-main">
                            <div class="order-list">
                                <!--待付款-->
                                @foreach($df_data as $value)
                                    {{--订单开始--}}
                                    <div class="order-status1">
                                        <div class="order-title">
                                            <div class="dd-num">订单编号：<a href="javascript:;">{{$value->orderno}}</a>
                                            </div>
                                            <span>下单时间：{{$value->time}}</span>
                                            <!--    <em>店铺：小桔灯</em>-->
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                                {{--订单内容开始--}}
                                                @foreach($df_details[$value->id] as $val)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="/goodsdetail?id={{$val->good_id}}"
                                                                   class="J_MakePoint">
                                                                    <img src="{{$val->photo}}"
                                                                         class="itempic J_ItemImg">
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="/goodsdetail?id={{$val->good_id}}">
                                                                        <p>{{$val->name}}</p>
                                                                        <p class="info-little">口味：{{$val->taste}} </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$val->price}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$val->num}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                            <div class="item-operation">

                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                                {{--订单内容结束--}}
                                            </div>
                                            <div class="order-right">
                                                <li class="td td-amount">
                                                    <div class="item-amount">
                                                        合计：{{$value->goods_money}}
                                                        <p>含运费：<span>0.00</span></p>
                                                    </div>
                                                </li>
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        {{--订单状态开始--}}

                                                        <div class="item-status">
                                                            <p class="Mystatus">等待买家付款</p>
                                                            <p class="order-info"><a
                                                                        href="/order_info?id={{$value->id}}">订单详情</a>
                                                            </p>
                                                        </div>
                                                        {{--订单状态结束--}}
                                                    </li>
                                                    <li class="td td-change">
                                                        {{--订单操作开始--}}

                                                        <a href="/orderpay?id={{$value->id}}">
                                                            <div class="am-btn am-btn-danger anniu">立即支付</div>
                                                        </a>
                                                        {{--订单操作结束--}}
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--订单结束--}}
                                @endforeach
                                {{--{{$df_data->render()}}--}}
                            </div>

                        </div>
                    </div>
                    <div class="am-tab-panel am-fade" id="tab3">
                        <div class="order-top">
                            <div class="th th-item">
                                商品
                            </div>
                            <div class="th th-price">
                                单价
                            </div>
                            <div class="th th-number">
                                数量
                            </div>
                            <div class="th th-operation">
                                商品操作
                            </div>
                            <div class="th th-amount">
                                合计
                            </div>
                            <div class="th th-status">
                                交易状态
                            </div>
                            <div class="th th-change">
                                交易操作
                            </div>
                        </div>

                        <div class="order-main">
                            <div class="order-list">
                                <!--待发货-->

                                @foreach($dfh_data as $value)
                                    {{--订单开始--}}
                                    <div class="order-status1">
                                        <div class="order-title">
                                            <div class="dd-num">订单编号：<a href="javascript:;">{{$value->orderno}}</a>
                                            </div>
                                            <span>下单时间：{{$value->time}}</span>
                                            <!--    <em>店铺：小桔灯</em>-->
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                                {{--订单内容开始--}}
                                                @foreach($dfh_details[$value->id] as $val)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="/goodsdetail?id={{$val->good_id}}"
                                                                   class="J_MakePoint">
                                                                    <img src="{{$val->photo}}"
                                                                         class="itempic J_ItemImg">
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="/goodsdetail?id={{$val->good_id}}">
                                                                        <p>{{$val->name}}</p>
                                                                        <p class="info-little">口味：{{$val->taste}} </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$val->price}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$val->num}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                        	@if(!empty($val->r_status) && $val->r_status == 1)
                                                            <p class="Mystatus">已申请退款</p>
                                                            @elseif(!empty($val->r_status) && $val->r_status == 2)
                                                            <p class="Mystatus">以退款成功</p>
                                                            @else
                                                            <div class="item-operation">
                                                                <a href="/refundx/{{$val->id}}/edit">退款/售后</a>
                                                            </div>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                @endforeach
                                                {{--订单内容结束--}}
                                            </div>
                                            <div class="order-right">
                                                <li class="td td-amount">
                                                    <div class="item-amount">
                                                        合计：{{$value->goods_money}}
                                                        <p>含运费：<span>0.00</span></p>
                                                    </div>
                                                </li>
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        {{--订单状态开始--}}
                                                        <div class="item-status">
                                                            <p class="Mystatus">买家已付款</p>

                                                            <p class="order-info"><a
                                                                        href="/order_info?id={{$value->id}}">订单详情</a>
                                                            </p>
                                                        </div>
                                                        {{--订单状态结束--}}
                                                    </li>
                                                    <li class="td td-change">
                                                        {{--订单操作开始--}}
                                                        <div class="am-btn am-btn-danger anniu">等待发货</div>
                                                        {{--订单操作结束--}}
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--订单结束--}}
                                @endforeach
                                {{--{{$dfh_data->render()}}--}}
                            </div>
                        </div>
                    </div>
                    <div class="am-tab-panel am-fade" id="tab4">
                        <div class="order-top">
                            <div class="th th-item">
                                商品
                            </div>
                            <div class="th th-price">
                                单价
                            </div>
                            <div class="th th-number">
                                数量
                            </div>
                            <div class="th th-operation">
                                商品操作
                            </div>
                            <div class="th th-amount">
                                合计
                            </div>
                            <div class="th th-status">
                                交易状态
                            </div>
                            <div class="th th-change">
                                交易操作
                            </div>
                        </div>

                        <div class="order-main">
                            <div class="order-list">
                                <!--待收货-->
                                @foreach($dsh_data as $value)
                                    {{--订单开始--}}
                                    <div class="order-status1">
                                        <div class="order-title">
                                            <div class="dd-num">订单编号：<a href="javascript:;">{{$value->orderno}}</a>
                                            </div>
                                            <span>下单时间：{{$value->time}}</span>
                                            <!--    <em>店铺：小桔灯</em>-->
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                                {{--订单内容开始--}}
                                                @foreach($dsh_details[$value->id] as $val)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="/goodsdetail?id={{$val->good_id}}"
                                                                   class="J_MakePoint">
                                                                    <img src="{{$val->photo}}"
                                                                         class="itempic J_ItemImg">
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="/goodsdetail?id={{$val->good_id}}">
                                                                        <p>{{$val->name}}</p>
                                                                        <p class="info-little">口味：{{$val->taste}} </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$val->price}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$val->num}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                        	@if(!empty($val->r_status) && $val->r_status == 1)
                                                            <p class="Mystatus">已申请退款</p>
                                                            @elseif(!empty($val->r_status) && $val->r_status == 2)
                                                            <p class="Mystatus">以退款成功</p>
                                                            @else
                                                            <div class="item-operation">
                                                                <a href="/refundx/{{$val->id}}/edit">退款/退货</a>
                                                            </div>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                @endforeach
                                                {{--订单内容结束--}}
                                            </div>
                                            <div class="order-right">
                                                <li class="td td-amount">
                                                    <div class="item-amount">
                                                        合计：{{$value->goods_money}}
                                                        <p>含运费：<span>0.00</span></p>
                                                    </div>
                                                </li>
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        {{--订单状态开始--}}
                                                        <div class="item-status">
                                                            <p class="Mystatus">卖家已发货</p>
                                                            <p class="order-info"><a
                                                                        href="/order_info?id={{$value->id}}">订单详情</a>
                                                            </p>
                                                            <p class="order-info"><a
                                                                        href="/order_info?id={{$value->id}}">查看物流</a>
                                                            </p>
                                                        </div>
                                                        {{--订单状态结束--}}
                                                    </li>
                                                    <li class="td td-change">
                                                        {{--订单操作开始--}}
                                                        <a href="/order_management/{{$value->id}}/edit"
                                                           onClick="return confirm('确定收货?');">
                                                            <div class="am-btn am-btn-danger anniu">确认收货</div>
                                                        </a>
                                                        {{--订单操作结束--}}
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--订单结束--}}
                                @endforeach
                                {{--{{$dsh_data->render()}}--}}
                            </div>
                        </div>
                    </div>

                    <div class="am-tab-panel am-fade" id="tab5">
                        <div class="order-top">
                            <div class="th th-item">
                                商品
                            </div>
                            <div class="th th-price">
                                单价
                            </div>
                            <div class="th th-number">
                                数量
                            </div>
                            <div class="th th-operation">
                                商品操作
                            </div>
                            <div class="th th-amount">
                                合计
                            </div>
                            <div class="th th-status">
                                交易状态
                            </div>
                            <div class="th th-change">
                                交易操作
                            </div>
                        </div>

                        <div class="order-main">
                            <div class="order-list">
                                <!--待评价-->
                                @foreach($dpj_data as $value)
                                    {{--订单开始--}}
                                    <div class="order-status1">
                                        <div class="order-title">
                                            <div class="dd-num">订单编号：<a href="javascript:;">{{$value->orderno}}</a>
                                            </div>
                                            <span>下单时间：{{$value->time}}</span>
                                            <!--    <em>店铺：小桔灯</em>-->
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                                {{--订单内容开始--}}
                                                @foreach($dpj_details[$value->id] as $val)
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="/goodsdetail?id={{$val->good_id}}"
                                                                   class="J_MakePoint">
                                                                    <img src="{{$val->photo}}"
                                                                         class="itempic J_ItemImg">
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="/goodsdetail?id={{$val->good_id}}">
                                                                        <p>{{$val->name}}</p>
                                                                        <p class="info-little">口味：{{$val->taste}} </p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$val->price}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-number">
                                                            <div class="item-number">
                                                                <span>×</span>{{$val->num}}
                                                            </div>
                                                        </li>
                                                        <li class="td td-operation">
                                                        	@if(!empty($val->r_status) && $val->r_status == 1)
                                                            <p class="Mystatus">已申请退款</p>
                                                            @elseif(!empty($val->r_status) && $val->r_status == 2)
                                                            <p class="Mystatus">以退款成功</p>
                                                            @else
                                                            <div class="item-operation">
                                                                <a href="/refundx/{{$val->id}}/edit">退款/退货</a>
                                                            </div>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                @endforeach
                                                {{--订单内容结束--}}
                                            </div>
                                            <div class="order-right">
                                                <li class="td td-amount">
                                                    <div class="item-amount">
                                                        合计：{{$value->goods_money}}
                                                        <p>含运费：<span>0.00</span></p>
                                                    </div>
                                                </li>
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        {{--订单状态开始--}}
                                                        <div class="item-status">
                                                            <p class="Mystatus">交易成功</p>
                                                            <p class="order-info"><a
                                                                        href="/order_info?id={{$value->id}}">订单详情</a>
                                                            </p>
                                                            <p class="order-info"><a
                                                                        href="/order_info?id={{$value->id}}">查看物流</a>
                                                            </p>
                                                        </div>
                                                        {{--订单状态结束--}}
                                                    </li>
                                                    <li class="td td-change">
                                                        {{--订单操作开始--}}
                                                        <a href="/comment?id={{$value->id}}">
                                                            <div class="am-btn am-btn-danger anniu">立即评价</div>
                                                        </a>
                                                         {{--订单操作结束--}}
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--订单结束--}}
                                @endforeach
                                {{--                                {{$dpj_data->render()}}--}}
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection