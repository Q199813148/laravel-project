
@extends("Admin.AdminPublic.index")
@section("search")
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
          </form>
        </div>
@endsection
@section("admin")
<div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">分类列表</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            分类
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Pid
                          </th>
                          <th>
                            Path
                          </th>
                          <th>
                          	操作
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($types as $value)
                      	
                      
                        <tr>
                          <td>
                            {{$value->id}}
                          </td>
                          <td>
                            {{$value->name}}
                          </td>
                          <td>
                            {{$value->status}}
                          </td>
                          <td>
                           {{$value->pid}}
                          </td>
                          <td>
                            {{$value->path}}
                          </td>
                          <td>
                          <form action="/admintypes/{{$value->id}}" method="post">
                          {{csrf_field()}}
                          {{method_field("DELETE")}}
                          	<button class="btn btn-danger" onclick="return confirm('确定删除吗')">删除</button>|<a href="/admintypes/{{$value->id}}/edit" class="btn btn-success">修改</a>                         	
                          </form>
                          </td>
                        </tr>
                        <tr>
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
          {{$types->render()}}
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
@section('title','分类列表')                