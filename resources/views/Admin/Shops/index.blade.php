@extends("Admin.AdminPublic.index")
@section("search")
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects" name="keywords" value="{{$request['keywords'] or ''}}">
            </div>
          </form>
        </div>
@endsection
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
                            id
                          </th>
                          <th>
                            商品名
                          </th>
                          <th>
                            分类名
                          </th>
                          <th>
                            价格
                          </th>
                          <th>
                            库存
                          </th>
                          <th>
                            销售量
                          </th>
                          <th>
                            状态
                          </th>
                          <th>
                            operate
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($data as $val)
                        <tr>
                          <td>
                            {{$val->id}}
                          </td>
                          <td>
                            {{$val->name}}
                          </td>
                          <td>
                            {{$val->type_id}}
                          </td>
                          <td>
                            {{$val->price}}
                          </td>
                          <td>
                            {{$val->store}}
                          </td>
                          <td>
                            {{$val->sales}}
                          </td>
                          <td>
                            {{$val->status}}
                          </td>
                          <td>
                            <a href="/adminshop/{{$val->id}}/eidt" class="btn btn-gradient-primary btn-sm">编辑</a>
                          </td>
                        </tr>
                      	@endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
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

