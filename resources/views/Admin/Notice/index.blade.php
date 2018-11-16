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

@section('admin')
<div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">公告列表</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            Id
                          </th>
                          <th>
                            Title
                          </th>                         
                          <th>
                            Status
                          </th>
                          <th>
                            Addtime
                          </th>
                          <th>
                             Content
                          </th>
                          <th>
                          	Operate
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $row)
                        <tr>
                          <td>
                            {{$row->id}}
                          </td>
                          <td>
                            {{$row->title}}
                          </td>
                          <td>
                          @if($row->status == "1")
                          <span class="badge badge-gradient-success status">启用</span>
                          @else
                          <span class="badge badge-danger status">禁用</span>
                          @endif
                          <input type="hidden" name="{{$row->status}}" class="starts" value="{{$row->id}}" />
                          </td>
                          <td>
                            {{$row->addtime}}
                          </td>
                          <td>
                            <a href="/adminnotice/{{$row->id}}">内容详情</a>
                          </td>
                          <td>
                            <a href="/adminnotice/{{$row->id}}/edit" class="mdi mdi-settings"></a> |
                            <a href="#" class="delete mdi mdi-delete" ></a>
                          </td>
                        </tr>
                        @endforeach
<!--ajax转换状态-->
<script>
    $(".status").click(function(){
    	obj = $(this);
      // alert('ss');
      id=$(this).parents("tr").find("td:first").html();
      // alert(id);
      $.get("/adminnotices",{id:id},function(data){
        if(data['status'] == 1){
         //alert(data['status']);
          if(obj.html() == "启用" ){
            obj.html("禁用").attr('class',"badge badge-danger start");
          }else{
            obj.html("启用").attr('class',"badge badge-gradient-success start");
            
          }
          
        }
      },"json");
    });


    $(".delete").click(function(){
      if(confirm('确定删除吗')){
          id = $(this).parents('tr').find('td:first').html();
          td = $(this);
          $.get('/adminnoticedel',{id:id},function(data){
              if(data == 1){
                  // alert("删除成功");
                  td.parents('tr').remove();
              }else{
                  alert("删除失败");
              }
          })
      }


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