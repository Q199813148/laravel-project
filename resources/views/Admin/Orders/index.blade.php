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
                  <h4 class="card-title">订单列表</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            Id
                          </th>
                          <th>
                            User_id
                          </th>
                          <th>
                            Orderno
                          </th>
                          <th>
                            Company
                          </th>
                          <th>
                            Express
                          </th>
                          <th>
                            Time
                          </th>
                          <th>
                            Endtime
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Refund
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
                            {{$row->id}}
                          </td>
                          <td>
                            {{$row->user_id}}
                          </td>
                          <td>
                            {{$row->orderno}}
                          </td>
                          <td>
                            {{$row->company}}
                          </td>
                          <td>
                            {{$row->express}}
                          </td>
                          <td>
                            {{$row->time}}
                          </td>
                          <td>
                            {{$row->endtime}}
                          </td>
                          <td>
                          <span class="badge badge-gradient-success status" style="cursor:pointer;"><a href="adminorders/{{$row->id}}/edit" style="color:#ffffff;">{{$row->status}}</a></span>
                          </td>
                          <td>
                          <span class="badge badge-danger refund" style="cursor:pointer;">{{$row->refund}}</span>
                          </td>
                          <td>
                            <a href="/adminorders/{{$row->id}}">订单&emsp;详情</a>
                          </td>
                        </tr>
                        @endforeach
                        @endif
<!-- ajax转换状态 -->
<script>
       $(".status").click(function(){
          // alert('111');
          // 查询id
          id = $(this).parents('tr').find('td:first').html();
          // alert(id);
          obj = $(this); 
          $.get("/adminordersstatus",{id:id},function(data) {
            // alert(data['status']);
            // 判断 修改
            if(data['status'] == 1){
              obj.html("已发货");
            }
          },'json');
       });

       $(".refund").click(function() {
            // alert('111');
            //查询id
            id = $(this).parents('tr').find('td:first').html();
            //alert(id)
            obj = $(this);
            $.get("/adminordersrefund",{id:id},function(data) {
              // alert(data['refund']);
              //判断 修改
              if(data['refund'] == 1){
                obj.html("退款中");
              }else if(data['refund'] == 2){
                obj.html("完成退款");
              }
            },'json');
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

