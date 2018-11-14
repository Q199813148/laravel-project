@extends("Home.HomePublic.index")

@section('goods')
    <link href="static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css"/>
    <link href="static/Home/basic/css/demo.css" rel="stylesheet" type="text/css"/>
    <link href="static/Home/css/cartstyle.css" rel="stylesheet" type="text/css"/>
    <link href="static/Home/css/optstyle.css" rel="stylesheet" type="text/css"/>

    <div class="concent">
        <div id="cartTable">
            <div class="cart-table-th">
                <div class="wp">
                    <div class="th th-chk">
                        <div id="J_SelectAll1" class="select-all J_SelectAll">

                        </div>
                    </div>
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
                    <div class="th th-op">
                        <div class="td-inner">操作</div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>


            <div class="bundle  bundle-last ">
                <div class="bundle-hd">
                    <div class="bd-promos">
                        <div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥19.50</span>&nbsp;&nbsp;
                        </div>
                        <div class="act-promo">
                            <a href="#" target="_blank">第二支半价，第三支免费<span class="gt">&gt;&gt;</span></a>
                        </div>
                        <span class="list-change theme-login">编辑</span>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="bundle-main">
                    @foreach($data as $v)
                        <ul class="item-content clearfix">
                            <li class="td td-chk">
                                <div class="cart-checkbox ">
                                    <input class="check" id="J_CheckBox_170037950254" name="items[]"
                                           value="170037950254"
                                           type="checkbox">
                                    <label for="J_CheckBox_170037950254"></label>
                                </div>
                            </li>
                            <li class="td td-item">
                                <div class="item-pic">
                                    <a href="/goodsdetail?id={{$v->goods_id}}" target="_blank" data-title="{{$v->name}}"
                                       class="J_MakePoint" data-point="tbcart.8.12">
                                        <img src="{{$v->photo}}" class="itempic J_ItemImg"></a>
                                </div>
                                <div class="item-info">
                                    <div class="item-basic-info">
                                        <a href="/goodsdetail?id={{$v->goods_id}}" target="_blank" title="{{$v->name}}"
                                           class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v->name}}</a>
                                    </div>
                                </div>
                            </li>
                            <li class="td td-info">
                                <div class="item-props item-props-can">
                                    <span class="sku-line">口味：{{$v->taste}}</span>
                                    <span tabindex="0" class="btn-edit-sku theme-login">修改</span>
                                    <i class="theme-login am-icon-sort-desc"></i>
                                </div>
                            </li>
                            <li class="td td-price">
                                <div class="item-price price-promo-promo">
                                    <div class="price-content">
                                        <div class="price-line">
                                            <em class="price-original"><?=sprintf("%.2f", $v->price + 10)?></em>
                                        </div>
                                        <div class="price-line">
                                            <em class="J_Price price-now" tabindex="0">{{$v->price}}</em>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="td td-amount">
                                <div class="amount-wrapper ">
                                    <div class="item-amount">
                                        <div class="sl">
                                            <input type="hidden" value="{{$v->id}}" name="cart_id">
                                            <input class="min am-btn" name="" type="button" value="-">
                                            <input class="text_box" name="" type="text" value="{{$v->num}}"
                                                   style="width:30px;">
                                            <input class="add am-btn" name="" type="button" value="+">
                                            <input type="hidden" value="{{$v->store}}" name="store">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="td td-sum">
                                <div class="td-inner">
                                    <em tabindex="0"
                                        class="J_ItemSum number"><?=sprintf("%.2f", $v->price * $v->num)?></em>
                                </div>
                            </li>
                            <li class="td td-op">
                                <div class="td-inner">
                                    <a title="移入收藏夹" class="btn-fav" href="#">
                                        移入收藏夹</a>
                                    <a data-point-url="#" class="delete">
                                        删除</a>
                                    <input type="hidden" value="{{$v->id}}" name="cart_id">
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>

            <div class="clear"></div>
        </div>
        <div class="clear"></div>

        <div class="float-bar-wrapper">
            <div id="J_SelectAll2" class="select-all J_SelectAll">
                <div class="cart-checkbox">
                    <input class="check-all check" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox">
                    <label for="J_SelectAllCbx2"></label>
                </div>
                <span>全选</span>
            </div>
            <div class="operations">
                <a href="#" hidefocus="true" class="deleteAll">删除</a>
                <a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
            </div>
            <div class="float-bar-right">
                <div class="amount-sum">
                    <span class="txt">已选商品</span>
                    <em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
                    <div class="arrow-box">
                        <span class="selected-items-arrow"></span>
                        <span class="arrow"></span>
                    </div>
                </div>
                <div class="price-sum">
                    <span class="txt">合计:</span>
                    <strong class="price">¥<em id="J_Total">0.00</em></strong>
                </div>
                <div class="btn-area">
                    <a href="pay.html" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
                        <span>结&nbsp;算</span></a>
                </div>
            </div>

        </div>


    </div>
    <script src="/static/Home/cart/cart.js"></script>
@endsection
