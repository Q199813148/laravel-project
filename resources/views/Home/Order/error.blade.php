
@extends("Home.HomePublic.personal")
@section('content')
    <link rel="stylesheet"  type="text/css" href="static/home/AmazeUI-2.4.2/assets/css/amazeui.css"/>

    <link href="static/home/basic/css/demo.css" rel="stylesheet" type="text/css" />

    <link href="static/home/css/sustyle.css" rel="stylesheet" type="text/css" />

    <style>
        .error{
            padding: 27px 0 27px 60px;
            color: #333;
            width: 100%;
            max-width: 1000px;
            margin: 0px auto;
            margin-top: 50px;
        }
    </style>
    <div class="error">
        <div class="status">
            <img src="/static/home/images/19B58PICXF5.png" alt="付款失败" style="display: inline;">
            <h2>付款失败</h2>

        </div>
    </div>
@endsection