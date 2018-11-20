@extends("Home.HomePublic.Personal")
@section('title','地址管理-零食么')
@section('static')
<link href="/static/Home/css/addstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">
					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
							@if(!empty($data))
							@foreach($data as $row)
							@if($row->default == 0)
							<li class="user-addresslist defaultAddr"  style="margin-bottom:20px;">
							@else
							<li class="user-addresslist" style="margin-bottom:20px;">
							@endif


							@if($row->default == 0)
								<span class="new-option-r defaults"  style="cursor:default;"><i class="am-icon-check-circle"></i>默认地址</span>
							@else
								<span class="new-option-r default"><i class="am-icon-check-circle"></i>默认地址</span>

							@endif

								<input type="hidden" value="{{$row->id}}">
								<p class="new-tit new-p-re">
									<span class="new-txt">{{$row->name}}</span>
									<span class="new-txt-rd2">{{$row->phone}}</span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="street">{{$row->address}}</span></p>
								</div>
								<div class="new-addr-btn">
									<a href="/addressedit/{{$row->id}}/edit"><i class="am-icon-edit"></i>编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);" onclick="delClick(this);" class="del"><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>
							@endforeach
							@endif
						</ul>
						<script>
							$(".default").click(function(){
								// alert('111');
								// 查询id
								obj = $(this);
								id = $(this).parents("li").find("input:first").val();
								// alert(id);
								$.get("/personaladdress/default",{id:id},function(data){
									// alert(data['default']);
								},"json");
							});
							$('.del').click(function(){
								// alert(111);
								if(confirm('确定删除吗')){
								obj = $(this);
								id=$(this).parents("li").find("input:first").val();
								// alert(id);
								$.get("/personaladdress/del",{id:id},function(data){
									// alert(data);
									if(data == 1){
							        //删除成功
							        obj.parents('li').remove();
							      	}else if(data == 3){
							      		alert("至少保留一个收货地址")
							      	}else{
								        //删除失败
								        alert("删除失败");
							      	}
								},'json');

								}
							});
						</script>
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" action="/personal" method="post">

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="user-name" placeholder="收货人" name="name">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" placeholder="手机号必填" type="text" name="phone">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<div class="am-form-content address">
												<select name="province" id="sid" style="margin-bottom:20px;">
													<option class="ss" >--请选择--</option>
												</select>
												<input type="hidden" name="city">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name="detailed"></textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>
										
                        				{{csrf_field()}}
										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<input class="am-btn am-btn-danger" type="submit" style="width:200px;" value="保存">
											</div>
										</div>
									</form>
								</div>
								<script src="/static/Home/js/jquery-1.7.2.min.js"></script>
								<script>
									$.get("/personaladdress/district",{upid:0},function(data){
										// console.log(data);
										// 禁用请选择选中
										$('.ss').attr('disabled','true');
										//得到数据数组内容 遍历得到每个对象
										for(var i=0;i<data.data.length;i++){
											// console.log(data.data[i].name);
											// 将得到的地址名称写入option标签中
											var info =$('<option value="'+data.data[i].id+'">'+data.data[i].name+'</option>');
											// console.log(info);
											// 将得到的option标签放入select对象中
											$('#sid').append(info);
										}
									},'json');

									//其他级别内容
									//live 事件委派
									$('select').live('change',function(){
										//将当前对象存储起来
										obj = $(this);
										//通过id来查找下一个
										id = $(this).val();
										// 清除所有其他的select
										obj.nextAll('select').remove();
										// alert(id);
										$.getJSON('/personaladdress/district',{upid:id},function(data)
										{
											// console.log(data);
											if(data.data.length != 0){
												//创建一个select标签对象
												var select = $('<select style="margin-bottom:20px;"></select>');
												//防止当前城市没办法选择所以先写上一个请选择option标签
												var op=$('<option class="mm">--请选择--</option>');
												select.append(op);

												//循环得到的数组里面的option标签添加到select
												for(var i = 0;i<data.data.length;i++){
													var info = $('<option value="'+data.data[i].id+'">'+data.data[i].name+'</option>');
													// console.log(info);
													//将option标签添加到select标签中
													select.append(info);

												}
												//将select标签添加到当前的后面
												obj.after(select);
												//禁用其他级别和请选择
												$('.mm').attr('disabled','true');
											}
										});
									});
									//获取选中的数据提交到操作页面
									$('.am-btn').click(function(){
										arr = [];
										$('select').each(function(){
											// 获取当前select被选中的option标签里面的中文文本
											opdata = $(this).find('option:selected').html();
											//将得到的值放置到数组中 push()
											arr.push(opdata);
										});
										//将得到的数组直接赋值给隐藏域value
										$('input[name=city]').val(arr);

									});
								</script>

							</div>

						</div>

					</div>

					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>

					<div class="clear"></div>

				</div>
@endsection

