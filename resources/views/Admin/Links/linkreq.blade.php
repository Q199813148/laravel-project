@extends("Admin.AdminPublic.index")

@section("search")
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" name="keywords" value="{{$request['k'] or ''}}" placeholder="Search projects">
            </div>
          </form>
        </div>
@endsection

@section('admin')
<div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">链接申请列表</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            Id
                          </th>
                          <th>
                            Username
                          </th>                         
                          <th>
                            Status
                          </th>
                          <th>
                            Addtime
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                          	Url
                          </th>
                          <th>
                          	Phone
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
                            {{$row->username}}
                          </td>
                          <td>
                          <form action="/dolinkreq?id={{$row->id}}" method="post">
                          	<button class="btn btn-info">同意</button>
                          	{{csrf_field()}}
                          </form>
                          <input type="hidden" name="{{$row->status}}" class="starts" value="{{$row->id}}" />
                          </td>
                          <td>
                            {{$row->addtime}}
                          </td>
                          <td>
                          	{{$row->name}}
                          </td>
                          <td>
                          	{{$row->url}}
                          </td>
                          <td>
                          	{{$row->phone}}
                          </td>
                          <td>
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
      $.get("/adminlinks/linkreq",{id:id},function(data){
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
          $.get('/adminlinkreqdel',{id:id},function(data){
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