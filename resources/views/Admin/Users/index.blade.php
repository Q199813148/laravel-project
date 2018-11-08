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
                            level
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
                          <th>
                            操作
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
                          @if($row->level == "非会员")
                          <span class="badge badge-gradient-success level">{{$row->level}}</span>
                          @else
                          <span class="badge badge-danger level">{{$row->level}}</span>
                          @endif
                          </td>
                          <td>
                            {{$row->email}}
                          </td>
                          <td>
                          @if($row->status == 1)
                          <span class="badge badge-gradient-success start">启用</span>
                          @else
                          <span class="badge badge-danger start">禁用</span>
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
<!--ajax转换状态-->
<script>
    $(".start").click(function() {
      id = $(this).next().val();
      status = $(this).next().attr('name');
    obj = $(this);
      $.get("/adminuse/ajax",{id:id,s:status},function(data) {
        if(data['msg'] == 1) {
          if(status == 0) {
              obj.html("启用").attr('class',"badge badge-gradient-success start").next().attr('name',1);
          }else{
              obj.html("禁用").attr('class',"badge badge-danger start").next().attr('name',0);
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
            obj.html("非会员").attr('class',"badge badge-gradient-success start");
          }else{
            obj.html("会员").attr('class',"badge badge-danger start");
            
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

