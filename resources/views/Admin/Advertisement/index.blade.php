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
    <style>
        table{
            width:100px;
            table-layout:fixed;/* 只有定义了表格的布局算法为fixed，下面td的定义才能起作用。 */
        }
        td{
            width:100%;
            word-break:keep-all;/* 不换行 */
            white-space:nowrap;/* 不换行 */
            overflow:hidden;/* 内容超出宽度时隐藏超出部分的内容 */
            text-overflow:ellipsis;/* 当对象内文本溢出时显示省略标记(...) ；需与overflow:hidden;一起使用*/
        }
    </style>
<div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">广告列表</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Pic
                          </th>
                          <th>
                            Title
                          </th>
                          <th>
                            Descr
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
                      @if(!empty($data))
                        @foreach($data as $val)
                        <tr>
                          <td style="width: 2px;">{{$val->id}}</td>
                          <td>
                          <img src="{{$val->pic}}" alt="" style="width:100px; height:100px; ">
                          </td>
                          <td>
                            {{$val->title}}
                          </td>
                          <td>
                            {{$val->descr}}
                          </td>
                          <td>
                            {{$val->url}}
                          </td>
                          <td>
                            @if($val->status == "启用")
                            <span class="badge badge-gradient-success status" style="cursor:pointer;">{{$val->status}}</span>
                            @else
                            <span class="badge badge-danger status" style="cursor:pointer;">{{$val->status}}</span>
                            @endif
                          </td>
                          <td>
                            <a href="/adminadvertisement/{{$val->id}}/edit" class="mdi mdi-settings"></a> |
                            <a href="#" class="delete mdi mdi-delete" ></a>
                          </td>
                        </tr>
                        @endforeach
                        @endif
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
          @if(!empty($data))
					{{$data->appends($request)->render()}}
          @endif
					
                        </div>
		          	<br />
              	</center>
              </div>
            </div>
          </div>
        </div>
<script>
  $(".status").click(function(){
      // alert('ss');
      obj = $(this);
      id=$(this).parents("tr").find("td:first").html();
      // alert(id);
      $.get("/Advertisement/ajax",{id:id},function(data){
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
  $(".delete").click(function(){
    // alert(删除);
    if(confirm('确定删除吗？')){
    id = $(this).parents('tr').find('td:first').html();
    td = $(this);
    $.get('/Advertisementdel',{id:id},function(data){
      // alert(data);
      if(data == 1){
        //删除成功
        td.parents('tr').remove();
      }else{
        //删除失败
        alert("删除失败");
      }
    });
  }
  });
</script>
@endsection
@section('title','广告列表')

