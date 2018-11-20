@extends("Home.HomePublic.personal")
@section('title','发表评论-零食么')
@section('static')
	<link href="/static/Home/css/colstyle.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>发表评论</title>

		<link href="/static/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/static/Home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/static/Home/css/appstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/static/Home/js/jquery-1.7.2.min.js"></script>
@endsection
@section('content')
<div class="main-wrap">

					<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
						</div>
						<hr>

						<div class="comment-main">
							{{--评价开始--}}
							<form action="/comment" method="post" id="form" enctype="multipart/form-data">
								<input type="hidden" name="order_id" value="{{$order_id}}">
							@foreach($info as $value)
									<input type="hidden" value="{{$value->id}}" name="comment{{$i}}[detail_id]">
							<div class="comment-list">
								<div class="item-pic">
									<a href="/goodsdetail?id={{$value->good_id}}" class="J_MakePoint">
										<img src="{{$value->photo}}" class="itempic">
									</a>
								</div>

								<div class="item-title">

									<div class="item-name">
										<a href="#">
											<p class="item-basic-info">{{$value->name}}</p>
										</a>
									</div>
									<div class="item-info">
										<div class="info-little">
											<span>口味：{{$value->taste}}</span>
										</div>
										<div class="item-price">
											价格：<strong>{{$value->price}}元</strong>
										</div>										
									</div>
								</div>
								<div class="clear"></div>
								<div class="item-comment">
									<textarea placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！" name="comment{{$i}}[content]"></textarea>
								</div>
								<div style="position: relative;left: 200px;bottom: 40px;">
									<div class="am-form-group am-form-file">
										<button type="button" class="am-btn am-btn-default am-btn-sm">
											<i class="am-icon-cloud-upload"></i> 选择要上传的图片</button>
										<input id="dofile" type="file" multiple="multiple" name="comment{{$i}}[pic][]">
									</div>
									<div id="file-list"></div>
								</div>
									<script>
                                        $(function() {
                                            $(':file').on('change', function() {
                                                var fileNames = '';
                                                $.each(this.files, function() {
                                                    fileNames += '<span class="am-badge">' + this.name + '</span> ';
                                                });
                                                $(this).parent().parent().find("#file-list").html(fileNames);
                                            });
                                        });
									</script>

								<div class="item-opinion">
									<input type="hidden"  name="comment{{$i++}}[level]" value="0">
									<li class="0"><i class="op1 active"></i>好评</li>
									<li class="1"><i class="op2"></i>中评</li>
									<li class="2"><i class="op3"></i>差评</li>
								</div>
							</div>
									<script>
                                        $(".item-opinion li").click(function () {
                                            level = $(this).attr('class');
                                            $(this).parent('div').find(":hidden").val(level);
                                        })
									</script>
							@endforeach

								{{csrf_field()}}
							</form>
							{{--评价结束--}}
								<div class="info-btn" id="submit">
									<div class="am-btn am-btn-danger">发表评论</div>
								</div>							
					<script type="text/javascript">
						$(document).ready(function() {
							$(".comment-list .item-opinion li").click(function() {	
								$(this).prevAll().children('i').removeClass("active");
								$(this).nextAll().children('i').removeClass("active");
								$(this).children('i').addClass("active");
								
							});
				     })
					</script>					
					
												
							
						</div>

					</div>
				</div>
<script>
	$("#submit").click(function () {
		$('#form').submit();
    })
</script>


@endsection


