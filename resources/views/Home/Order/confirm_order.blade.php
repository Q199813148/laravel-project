@extends("Home.HomePublic.index")
@section('title','确认订单-零食么')
<link href="static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css"/>

<link href="static/Home/basic/css/demo.css" rel="stylesheet" type="text/css"/>
<link href="static/Home/css/cartstyle.css" rel="stylesheet" type="text/css"/>

<link href="static/Home/css/jsstyle.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="static/Home/js/address.js"></script>
@section('goods')
    <script>
        $('.slideall').remove();
        $('.tip').empty();
    </script>
    <div class="concent">
        <!--地址 -->
        <div class="paycont">
            <div class="address">
                <h3>确认收货地址 </h3>
                <div class="control">
                    <div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
                </div>
                <div class="clear"></div>
                <ul>
                    <div class="per-border"></div>
                    {{--默认地址--}}
                    <li class="user-addresslist defaultAddr">
                        <input type="hidden" name="address_id" value="{{$default->id}}">
                        <div class="address-left">
                            <div class="user DefaultAddr">

										<span class="buy-address-detail">
                   <span class="buy-user">{{$default->name}} </span>
										<span class="buy-phone">{{$default->phone}}</span>
										</span>
                            </div>
                            <div class="default-address DefaultAddr">
                                <span class="buy-line-title buy-line-title-type">收货地址：</span>
                                <span class="buy--address-detail">
								   <span class="province">{{$default->address}}</span>
                                </span>
                            </div>
                            <ins class="deftip">默认地址</ins>
                        </div>
                        <div class="address-right">
                            <a href="person/address.html">
                                <span class="am-icon-angle-right am-icon-lg"></span></a>
                        </div>
                        <div class="clear"></div>

                        <div class="new-addr-btn">
                            <a href="#" class="hidden">设为默认</a>
                            <span class="new-addr-bar hidden">|</span>
                            <a href="#">编辑</a>
                            <span class="new-addr-bar">|</span>
                            <a href="javascript:void(0);" onclick="delClick(this);">删除</a>
                        </div>

                    </li>
                    {{--默认地址结束--}}
                    <div class="per-border"></div>
                    {{--其他地址--}}
                    @foreach($address as $value)
                        <li class="user-addresslist">
                            <input type="hidden" name="address_id" value="{{$value->id}}">
                            <div class="address-left">
                                <div class="user DefaultAddr">

										<span class="buy-address-detail">
                   <span class="buy-user">{{$value->name}} </span>
										<span class="buy-phone">{{$value->phone}}</span>
										</span>
                                </div>
                                <div class="default-address DefaultAddr">
                                    <span class="buy-line-title buy-line-title-type">收货地址：</span>
                                    <span class="buy--address-detail">
								   <span class="province">{{$value->address}}</span>
                                </span>
                                </div>
                                <ins class="deftip hidden">默认地址</ins>
                            </div>
                            <div class="address-right">
                                <span class="am-icon-angle-right am-icon-lg"></span>
                            </div>
                            <div class="clear"></div>

                            <div class="new-addr-btn">
                                <a href="#">设为默认</a>
                                <span class="new-addr-bar">|</span>
                                <a href="#">编辑</a>
                                <span class="new-addr-bar">|</span>
                                <a href="javascript:void(0);" onclick="delClick(this);">删除</a>
                            </div>

                        </li>
                    @endforeach
                    {{--其他地址结束--}}
                </ul>

                <div class="clear"></div>
            </div>
            <!--物流 -->
            {{--<div class="logistics">--}}
                {{--<h3>选择物流方式</h3>--}}
                {{--<ul class="op_express_delivery_hot">--}}
                    {{--<li data-value="yuantong" class="OP_LOG_BTN"><i class="c-gap-right"--}}
                                                                    {{--style="background-position:0px -468px"></i>圆通<span></span>--}}
                    {{--</li>--}}
                    {{--<li data-value="shentong" class="OP_LOG_BTN"><i class="c-gap-right"--}}
                                                                    {{--style="background-position:0px -1008px"></i>申通<span></span>--}}
                    {{--</li>--}}
                    {{--<li data-value="yunda" class="OP_LOG_BTN selected"><i class="c-gap-right"--}}
                                                                          {{--style="background-position:0px -576px"></i>韵达<span></span>--}}
                    {{--</li>--}}
                    {{--<li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last"><i class="c-gap-right"--}}
                                                                                                  {{--style="background-position:0px -324px"></i>中通<span></span>--}}
                    {{--</li>--}}
                    {{--<li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right"--}}
                                                                                                    {{--style="background-position:0px -180px"></i>顺丰<span></span>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            <div class="clear"></div>

            <!--支付方式-->
            {{--<div class="logistics">--}}
                {{--<h3>选择支付方式</h3>--}}
                {{--<ul class="pay-list">--}}
                    {{--<li class="pay card"><img src="static/Home/images/wangyin.jpg">银联<span></span></li>--}}
                    {{--<li class="pay qq"><img src="static/Home/images/weizhifu.jpg">微信<span></span></li>--}}
                    {{--<li class="pay taobao selected"><img src="static/Home/images/zhifubao.jpg">支付宝<span></span></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="clear"></div>--}}

            <!--订单 -->
            <div class="concent">
                <div id="payTable">
                    <h3>确认订单信息</h3>
                    <div class="cart-table-th">
                        <div class="wp">

                            <div class="th th-item">
                                <div class="td-inner">商品信息</div>
                            </div>
                            <div class="th th-price">
                                <div class="td-inner">单价</div>
                            </div>
                            <div class="th th-amount">
                                <div class="td-inner">数量</div>
                            </div>
                            <div class="th th-sum">
                                <div class="td-inner">金额</div>
                            </div>
                            <div class="th th-oplist">
                                <div class="td-inner">配送方式</div>
                            </div>

                        </div>
                    </div>
                    <div class="clear"></div>
                    {{--订单商品信息--}}
                    <form action="/submitorder" method="post">
                            <input type="hidden" name="user_id" value="{{session('user')->user_id}}">
                            <input type="hidden" name="goods_id" value="{{$goods->id}}">
                            <input type="hidden" name="address" value="{{$default->id}}">
                            <input type="hidden" name="num" value="{{$data['num']}}">
                            <input type="hidden" name="taste" value="{{$data['taste']}}">

                        <div class="bundle  bundle-last">

                            <div class="bundle-main">
                                <ul class="item-content clearfix">
                                    <div class="pay-phone">
                                        <li class="td td-item">
                                            <div class="item-pic">
                                                <a href="/goodsdetail?id={{$goods->id}}" class="J_MakePoint">
                                                    <img src="{{$goods->photo}}"
                                                         class="itempic J_ItemImg"></a>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-basic-info">
                                                    <a href="/goodsdetail?id={{$goods->id}}" class="item-title J_MakePoint"
                                                       data-point="tbcart.8.11">{{$goods->name}}</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="td td-info">
                                            <div class="item-props">
                                                <span class="sku-line">口味：{{$data['taste']}}</span>
                                            </div>
                                        </li>
                                        <li class="td td-price">
                                            <div class="item-price price-promo-promo">
                                                <div class="price-content">
                                                    <em class="J_Price price-now">{{$goods->price}}</em>
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                    <li class="td td-amount">
                                        <div class="amount-wrapper ">
                                            <div class="item-amount ">
                                                <span class="phone-title">购买数量</span>
                                                <div class="sl" style="margin-top: 6px;">
                                                    <span>{{$data['num']}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-sum">
                                        <div class="td-inner">
                                            <em tabindex="0"
                                                class="J_ItemSum number"><?=sprintf("%.2f", $goods->price * $data['num'])?></em>
                                        </div>
                                    </li>
                                    <li class="td td-oplist">
                                        <div class="td-inner">
                                            <span class="phone-title">配送方式</span>
                                            <div class="pay-logis">
                                                包邮
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                                <div class="clear"></div>

                            </div>

                            <div class="clear"></div>
                        </div>
                        {{csrf_field()}}

                    {{--订单商品信息结束--}}
                    <div class="clear"></div>
                    <div class="pay-total">
                        <!--留言-->
                        <div class="order-extra">
                            <div class="order-user-info">
                                <div id="holyshit257" class="memo">
                                    <label>买家留言：</label>
                                    <input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）"
                                           placeholder="选填,建议填写和卖家达成一致的说明"
                                           class="memo-input J_MakePoint c2c-text-default memo-close" name="remarks">
                                    <div class="msg hidden J-msg">
                                        <p class="error">最多输入500个字符</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    </form>

                        <!--优惠券 -->
                        <div class="buy-agio">
                            <li class="td td-coupon">

                                <span class="coupon-title">优惠券</span>
                                <select data-am-selected="">
                                    <option value="a">




                                        【不使用优惠券】

                                    </option>
                                    <option value="b" data-am-selected="">

                                        ￥3


                                        【无使用门槛】

                                    </option>
                                </select>
                            </li>



                        </div>
                        <div class="clear"></div>
                    </div>
                    <!--含运费小计 -->
                    <div class="buy-point-discharge ">
                        <p class="price g_price ">
                            合计（含运费） <span>¥</span><em class="pay-sum">244.00</em>
                        </p>
                    </div>

                    <!--信息 -->
                    <div class="order-go clearfix">
                        <div class="pay-confirm clearfix">
                            <div class="box">
                                <div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
                                    <span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">244.00</em>
											</span>
                                </div>

                                <div id="holyshit268" class="pay-address">

                                    <p class="buy-footer-address">
                                        <span class="buy-line-title buy-line-title-type">寄送至：</span>
                                        <span class="buy--address-detail">
								   <span class="province">{{$default->address}}</span>
                                        </span>

                                    </p>
                                    <p class="buy-footer-address">
                                        <span class="buy-line-title">收货人：</span>
                                        <span class="buy-address-detail">
                                         <span class="buy-user">{{$default->name}} </span>
												<span class="buy-phone">{{$default->phone}}</span>
												</span>
                                    </p>
                                </div>
                            </div>

                            <div id="holyshit269" class="submitOrder">
                                <div class="go-btn-wrap">
                                    <a id="J_Go" class="btn-go" tabindex="0"
                                       title="点击此按钮，提交订单">提交订单</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </div>
    <script>
        $('.user-addresslist').click(function () {
            //点击更换地址
            $(this).addClass('defaultAddr');
            address = $(this).find('.province').html();
            name = $(this).find('.buy-user').html();
            phone = $(this).find('.buy-phone').html();
            $('#holyshit268').find('.province').html(address);
            $('#holyshit268').find('.buy-user').html(name);
            $('#holyshit268').find('.buy-phone').html(phone);
            address_id = $(this).find('input[name="address_id"]').val();
            $('input[name="address"]').val(address_id);
        })
        //计算总金额
        var price = 0;
        $('.bundle-last').each(function(){
            price += parseFloat($(this).find('.J_ItemSum').html());

        })
        $('.pay-sum').html(price.toFixed(2));
        $('#J_ActualFee').html(price.toFixed(2));

        //提交订单
        $('#J_Go').bind('click',function(){
            $('form').submit();
            //防止重复提交
            $(this).unbind('click');
        })
    </script>
@endsection