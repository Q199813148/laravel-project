
@extends("AdminPublic.index")
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
                  <h4 class="card-title">Recent Tickets</h4>
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
                      @foreach ($type as $value)
                      	
                      
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
                          	<a href="">删除</a>|<a href="">修改</a>
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
@endsection
@section('title','分类列表')                