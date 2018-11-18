@extends("Home.HomePublic.Personal")
@section('title','悦桔拉拉')
@section('static')
<link href="/static/Home/css/addstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="main-wrap">
					<div class="user-address">
						<div class="" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改地址</strong> / <small>Edit&nbsp;address</small></div>
								</div>
								<hr>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" action="/personal/{{$data->id}}" method="post">

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="user-name" value="{{$data->name}}" name="name">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" value="{{$data->phone}}" type="text" name="phone">
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
												<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name="detailed">{{$data->address}}</textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>
										
                        				{{csrf_field()}}
                        				{{ method_field('PUT') }}
										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<input class="am-btn am-btn-danger" type="submit" style="width:100px;" value="保存">
												<a href="/personaladdress" class="am-btn am-btn-danger" style="width:100px;">返回</a>
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

