@extends("Home.HomePublic.personal")
@section('content')
    <link rel="stylesheet"  type="text/css" href="static/home/AmazeUI-2.4.2/assets/css/amazeui.css"/>

    <link href="static/home/basic/css/demo.css" rel="stylesheet" type="text/css" />

    <link href="static/home/css/sustyle.css" rel="stylesheet" type="text/css" />

    <div class="take-delivery">
        <div class="status">
            <h2>您已成功付款</h2>
            <div class="successInfo">
                <ul>
                    <li>付款金额<em>¥{{$data->goods_money}}</em></li>
                    <div class="user-info">
                        <p>收货人：{{$data->name}}</p>
                        <p>联系电话：{{$data->phone}}</p>
                        <p>收货地址：{{$data->address}}</p>
                    </div>
                    请认真核对您的收货信息，如有错误请联系客服

                </ul>
                <div class="option">
                    <span class="info">您可以</span>
                    <a href="/order_management" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
                    <a href="/order_management" class="J_MakePoint">查看<span>交易详情</span></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('list')
@endsection
