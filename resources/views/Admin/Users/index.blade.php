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
                            User_id
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Level
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Addtime
                          </th>
                          <th>
                              Operate
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @if(!empty($data))
                      @foreach($data as $row)
                        <tr>
                          <td>
                            {{$row->user_id}}
                          </td>
                          <td>
                            {{$row->name}}
                          </td>
                          <td>
                          @if($row->level == "非会员")
                          <span class="badge badge-gradient-success level" style="cursor:pointer;">{{$row->level}}</span>
                          @else
                          <span class="badge badge-danger level" style="cursor:pointer;">{{$row->level}}</span>
                          @endif
                          </td>
                          <td>
                            {{$row->email}}
                          </td>
                          <td>
                          @if($row->status == "启用")
                          <span class="badge badge-gradient-success status" style="cursor:pointer;">{{$row->status}}</span>
                          @else
                          <span class="badge badge-danger status" style="cursor:pointer;">{{$row->status}}</span>
                          @endif
                          <input type="hidden" name="{{$row->status}}" class="starts" value="{{$row->user_id}}" />
                          </td>
                          <td>
                            {{$row->addtime}}
                          </td>
                          <td>
                            <a href="/adminuser/{{$row->user_id}}">用户详情</a>
                          </td>
                        </tr>
                        @endforeach
                        @endif
<!--ajax转换状态-->
<script>
    $(".status").click(function(){
      // alert('ss');
      obj = $(this);
      id=$(this).parents("tr").find("td:first").html();
      // alert(id);
      $.get("/adminuse/ajax",{id:id},function(data){
        // alert(data['status']);
        if(data['status'] == 1){
          if(obj.html() == "启用" ){
            obj.html("禁用").attr('class',"badge badge-danger start");
          }else{
            obj.html("启用").attr('class',"badge badge-gradient-success start");
            
          }
          
        }
      },"json");
    });

    $(".level").click(function(){
      // alert('ss');
      obj = $(this);
      id=$(this).parents("tr").find("td:first").html();
      // alert(id);
      $.get("/adminuserss",{id:id},function(data){
        // alert(data['level']);
        if(data['level'] == 1){
          if(obj.html() == "会员" ){
            obj.html("非会员").attr('class',"badge badge-gradient-success level");
          }else{
            obj.html("会员").attr('class',"badge badge-danger level");
            
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

