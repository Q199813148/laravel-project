@extends("Admin.AdminPublic.index")
@section("search")
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
            	<input type="text" class="form-control bg-transparent border-0" name="keywords" value="{{$request['k'] or ''}}" placeholder="Search projects"> 
		      @if(session('error'))
          	  <span class="text-danger" style="font-size: 12px;">　　　　　　　{{session('error')}}</span>
		      @elseif(session('success'))
          	  <span class="text-success" style="font-size: 12px;">　　　　　　　{{session('success')}}</span>
		      @endif 
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
                  <h4 class="card-title">链接列表</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            Name
                          </th>
                          <th>
                          	Url
                          </th>
                          <th>
                            Status
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
                            {{$val->name}}
                          </td>
                          <td>
                          	{{$val->url}}
                          </td>
                          <td>
                          @if($val->status == "1")
                          <span class="badge badge-gradient-success status">启用</span>
                          @else
                          <span class="badge badge-danger status">禁用</span>
                          @endif
                          <input type="hidden" name="{{$val->status}}" class="starts" value="{{$val->id}}" />
                          </td>
                          
                          
                          <td>
                          	<form style="display: initial;" action="/adminlinks/{{$val->id}}" onsubmit="return confirm('你确定删除吗？')" method="post">
          {{csrf_field()}}
          {{method_field("DELETE")}}
          <button style="border: 0; background: #fff;" class="text-danger" type="submit"><a class="text-danger">删除</a></button>
        </form>
                          	<a href="/adminlinks/{{$val->id}}/edit" class="text-warning">修改</a>
                          </td>
                        </tr>
                      	@endforeach
          
<!--ajax转换状态-->     	
<script>
  	$(".status").click(function(){
    	obj = $(this);
       //alert(obj);
      id=$(this).next().val();
       //alert(id);
      $.get("/adminlinkss",{id:id},function(data){
        if(data['status'] == 1){
          if(obj.html() == "启用" ){
            obj.html("禁用").attr('class',"badge badge-danger start");
          }else{
            obj.html("启用").attr('class',"badge badge-gradient-success start");
            
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

                    </div>
		          	<br />
              	</center>
              </div>
            </div>
          </div>
        </div>
@endsection       

@section('title','后台首页')

