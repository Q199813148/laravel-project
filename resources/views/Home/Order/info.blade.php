@extends("Home.HomePublic.personal")
@section('title','订单详情-零食么')
<link href="static/home/css/orstyle.css" rel="stylesheet" type="text/css">

@section('content')
    <div class="main-wrap">

        <div class="user-orderinfo">

            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
            </div>
            <hr>
            <!--进度条-->
            <div class="m-progress">
                <div class="m-progress-list">
                    <span class="step-1 step">
                       <em class="u-progress-stage-bg"></em>
                       <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                       <p class="stage-name">拍下商品</p>
                    </span>
                    <span class="step-{{ $data->status>1 ? '2' : '3' }} step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                   <p class="stage-name">卖家发货</p>
                                </span>
                    <span class="step-{{ $data->status>2 ? '2' : '3' }} step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                   <p class="stage-name">确认收货</p>
                                </span>
                    <span class="step-{{ $data->status>=3 ? '2' : '3' }} step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">4<em class="bg"></em></i>
                                   <p class="stage-name">交易完成</p>
                                </span>
                    <span class="u-progress-placeholder"></span>
                </div>
                <div class="u-progress-bar total-steps-2">
                    <div class="u-progress-bar-inner"></div>
                </div>
            </div>
            <div class="order-infoaside">
                <div class="order-logistics">

                        <div class="icon-log">
                            <i><img src="static/home/images/receive.png"></i>
                        </div>
                    <div class="latest-logistics">
                            @if(empty($express->data))
                            <p class="text">暂无快递信息</p>
                            <div class="time-list">
                                <span class="date"><?=date('Y-m-d H:i:s') ?></span>
                            </div>
                            @else
                            <p class="text">{{$express->data['0']->context}}</p>
                            <div class="time-list">
                                <span class="date">{{$express->data['0']->time}}</span>
                            </div>
                            @endif
                        <div class="inquire">
                                <span class="package-detail">物流：{{$data->company or '未发货'}}</span>
                                <span class="package-detail">快递单号: </span>
                                <span class="package-number">{{$data->express or '未发货'}}</span>
                                <a
                                        class="am-btn am-btn-link"
                                        data-am-modal="{target: '#my-popup'}">
                                    查看详细物流
                                </a>
                        </div>
                    </div>
                    <div class="am-popup" id="my-popup">
                        <div class="am-popup-inner">
                            <div class="am-popup-hd">
                                <h6 class="am-popup-title">物流信息</h6>
                                <span data-am-modal-close
                                      class="am-close">&times;</span>
                            </div>
                            <div class="am-popup-bd"><img src="static/home/images/receive.png" style="width: 22px; height: 22px;">
                                @foreach($express->data as $val)

                                    <p class="text">{{$val->context}}</p>
                                    <div class="time-list">
                                        <span class="date">{{$val->time}}</span>
                                    </div>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <span class="am-icon-angle-right icon"></span>

                    <div class="clear"></div>
                </div>
                <div class="order-addresslist">
                    <div class="order-address">
                        <div class="icon-add">
                        </div>
                        <p class="new-tit new-p-re">
                            <span class="new-txt">{{$data->name}}</span>
                            <span class="new-txt-rd2">{{$data->phone}}</span>
                        </p>
                        <div class="new-mu_l2a new-p-re">
                            <p class="new-mu_l2cw">
                                <span class="title">收货地址：</span>
                                <span class="province"></span>{{$data->address}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-infomain">

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

                    <div class="order-status3">
                        <div class="order-title">
                            <div class="dd-num">订单编号：<a href="javascript:;">{{$data->orderno}}</a></div>
                            <span>成交时间：{{$data->time}}</span>
                            <!--    <em>店铺：小桔灯</em>-->
                        </div>
                        <div class="order-content">
                            <div class="order-left">
                                {{--子订单开始--}}
                                @foreach($info as $value)
                                <ul class="item-list">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="goodsdetail?id={{$value->good_id}}" class="J_MakePoint">
                                                <img src="{{$value->photo}}" class="itempic J_ItemImg">
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="goodsdetail?id={{$value->good_id}}">
                                                    <p>{{$value->name}}</p>
                                                    <p class="info-little">口味：{{$value->taste}}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price">
                                            {{$value->price}}
                                        </div>
                                    </li>
                                    <li class="td td-number">
                                        <div class="item-number">
                                            <span>×</span>{{$value->dnum}}
                                        </div>
                                    </li>
                                    <li class="td td-operation">
                                        <div class="item-operation">
                                            @if($data->status >= 1)
                                            退款/退货
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                                {{--子订单结束--}}
                                @endforeach
                            </div>
                            <div class="order-right">
                                <li class="td td-amount">
                                    <div class="item-amount">
                                        合计：{{$data->goods_money}}
                                        <p>含运费：<span>0.00</span></p>
                                    </div>
                                </li>
                                <div class="move-right">
                                    <li class="td td-status">
                                        {{--订单状态开始--}}
                                        @if($data->status == 0)
                                            <div class="item-status">
                                                <p class="Mystatus">等待买家付款</p>
                                                </p>
                                            </div>
                                        @elseif($data->status == 1)
                                            <div class="item-status">
                                                <p class="Mystatus">买家已付款</p>
                                            </div>
                                        @elseif($data->status == 2)
                                            <div class="item-status">
                                                <p class="Mystatus">卖家已发货</p>
                                            </div>
                                        @elseif($data->status == 3)
                                            <div class="item-status">
                                                <p class="Mystatus">交易成功</p>
                                            </div>
                                        @elseif($data->status == 4)
                                            <div class="item-status">
                                                <p class="Mystatus">评价完成</p>
                                            </div>
                                        @elseif($data->status == 5)
                                            <div class="item-status">
                                                <p class="Mystatus">退款中</p>
                                            </div>
                                        @endif
                                        {{--订单状态结束--}}
                                    </li>
                                    <li class="td td-change">
                                        @if($data->status == 0)
                                            <a href="/orderpay?id={{$data->id}}">
                                                <div class="am-btn am-btn-danger anniu">立即支付</div>
                                            </a>
                                        @elseif($data->status == 1)
                                            <div class="am-btn am-btn-danger anniu">等待发货</div>
                                        @elseif($data->status == 2)
                                            <a href="/order_management/{{$data->id}}/edit" onClick="return confirm('确定收货?');">
                                                <div class="am-btn am-btn-danger anniu">确认收货</div>
                                            </a>
                                            <a href="">
                                                退货申请
                                            </a>
                                        @elseif($data->status == 3)
                                            <a href="/comment?id={{$data->id}}">
                                                <div class="am-btn am-btn-danger anniu">立即评价</div>
                                            </a>
                                            <a href="">
                                                退货申请
                                            </a>
                                        @elseif($data->status == 4)
                                            <a href="/order_management/{{$data->id}}" onClick="return confirm('确定删除?');">
                                                <div class="am-btn am-btn-danger anniu">删除订单</div>
                                            </a>
                                            <a href="">
                                                退货申请
                                            </a>
                                        @elseif($data->status == 5)
                                            <a href="/order_management/{{$data->id}}" onClick="return confirm('确定删除?');">
                                                <div class="am-btn am-btn-danger anniu">删除订单</div>
                                            </a>
                                            <a href="">
                                                查看退款信息
                                            </a>

                                        @endif
                                    </li>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection