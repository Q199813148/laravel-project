@extends("Admin.AdminPublic.index")
@section("search")
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" name="seek" value="{{$req['seek'] or ''}}" placeholder="Search projects">
            </div>
          </form>
        </div>
@endsection
<!--列表-->
@section("admin")
<div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">管理列表</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            Name
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Phone
                          </th>
                          <th>
                            Level
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Operate
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($data as $val)
                        <tr>
                          <td>
                            <img src="/static/Admin/images/faces/face1.jpg" class="mr-2" alt="image">
                            {{$val->name}}
                          </td>
                          <td>
                            @if($val->status == 1)
                            <span class="badge badge-gradient-success start">启用</span>
                            @else
                            <span class="badge badge-danger start">禁用</span>
                            @endif
                            <input type="hidden" name="{{$val->status}}" class="starts" value="{{$val->id}}" />
                          </td>
                          
                          <td>
                          	{{$val->phone}}
                          </td>
                          <td>
                          	@if($val->level == 1)
                          		超级管理员
                            @else
                            	管理员
                            @endif
                          </td>
                          <td>
                            {{$val->email}}
                          </td>
                          <td>
                          	<a href="" class="text-danger">删除</a>
                          	<a href="" class="text-warning">修改</a>
                          </td>
                        </tr>
                      	@endforeach
          
<!--ajax转换状态-->     	
<script>
  	$(".start").click(function() {
  		id = $(this).next().val();
  		status = $(this).next().attr('name');
		obj = $(this);
  		$.get("/adminuser/ajax",{id:id,s:status},function(data) {
			if(data['msg'] == 1) {
				if(status == 0) {
  					obj.html("启用").attr('class',"badge badge-gradient-success start").next().attr('name',1);
				}else{
  					obj.html("禁用").attr('class',"badge badge-danger start").next().attr('name',0);
				}
			}
  		},"json");
  	});
</script>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!--分页-->
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
              	<center>
              		<br />
					<div class="btn-group" role="group" aria-label="Basic example">
					{{$data->appends($request)->render()}}
					<script type="text/javascript">
						$(".pagination>li>a").attr('class','btn btn-primary').css('margin-left','10px').css('color','#fff');
						$(".pagination>li>span").attr('class','btn btn-primary').css('margin-left','10px').css('color','#555');
					</script>
                    </div>
		          	<br />
              	</center>
              </div>
            </div>
          </div>
        </div>
@endsection       

@section('title','后台首页')

