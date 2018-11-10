@extends("Home.HomePublic.index")
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
                    <span class="fl">松子</span>
                    <span class="total fl">搜索到<strong class="num">997</strong>件相关商品</span>
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
                <li class="first"><a title="综合">综合排序</a></li>
                <li><a title="销量">销量排序</a></li>
                <li><a title="价格">价格优先</a></li>
                <li class="big"><a title="评价" href="#">评价为主</a></li>
            </div>
            <div class="clear"></div>

            <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                <li>
                    <div class="i-pic limit">
                        <img src="/static/Home/images/imgsearch1.jpg">
                        <p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
                        <p class="price fl">
                            <b>¥</b>
                            <strong>56.90</strong>
                        </p>
                        <p class="number fl">
                            销量<span>1110</span>
                        </p>
                    </div>
                </li>

            </ul>
        </div>
        <div class="search-side">

            <div class="side-title">
                经典搭配
            </div>

            <li>
                <div class="i-pic check">
                    <img src="/static/Home/images/cp.jpg">
                    <p class="check-title">萨拉米 1+1小鸡腿</p>
                    <p class="price fl">
                        <b>¥</b>
                        <strong>29.90</strong>
                    </p>
                    <p class="number fl">
                        销量<span>1110</span>
                    </p>
                </div>
            </li>
            <li>
                <div class="i-pic check">
                    <img src="/static/Home/images/cp2.jpg">
                    <p class="check-title">ZEK 原味海苔</p>
                    <p class="price fl">
                        <b>¥</b>
                        <strong>8.90</strong>
                    </p>
                    <p class="number fl">
                        销量<span>1110</span>
                    </p>
                </div>
            </li>
            <li>
                <div class="i-pic check">
                    <img src="/static/Home/images/cp.jpg">
                    <p class="check-title">萨拉米 1+1小鸡腿</p>
                    <p class="price fl">
                        <b>¥</b>
                        <strong>29.90</strong>
                    </p>
                    <p class="number fl">
                        销量<span>1110</span>
                    </p>
                </div>
            </li>

        </div>
        <div class="clear"></div>
        <!--分页 -->
        <ul class="am-pagination am-pagination-right">
            <li class="am-disabled"><a href="#">«</a></li>
            <li class="am-active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">»</a></li>
        </ul>

    </div>
</div>
@endsection
