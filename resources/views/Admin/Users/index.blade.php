@extends("Admin.AdminPublic.index")
@section("search")
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" name="keywords" value="{{$request['keywords'] or ''}}" placeholder="Search projects">
            </div>
          </form>
        </div>
@endsection
@section("admin")
<div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">用户列表</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            USER_ID
                          </th>
                          <th>
                            NAME
                          </th>
                          <th>
                            PASSWORD
                          </th>
                          <th>
                            EMAIL
                          </th>
                          <th>
                            STATUS
                          </th>
                          <th>
                            ADDTIME
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $row)
                        <tr>
                          <td>
                            {{$row->user_id}}
                          </td>
                          <td>
                            {{$row->name}}
                          </td>
                          <td>
                            {{$row->password}}
                          </td>
                          <td>
                            {{$row->email}}
                          </td>
                          <td>
                          <label class="badge badge-gradient-success">{{$row->status}}</label>
                            
                          </td>
                          <td>
                            {{$row->addtime}}
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
          {{$data->render()}}
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

