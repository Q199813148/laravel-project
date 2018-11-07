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
                  <h4 class="card-title">商品列表</h4>
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
                          <td style="width: 2px;">{{$val->id}}</td>
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
                            <a href="/adminshop/{{$val->id}}/edit" class="mdi mdi-settings"></a> |
                            <a href="#" class="delete mdi mdi-delete" ></a>
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
						$(".pagination>li>a").attr('class','badge badge-danger').css('margin-left','10px').css('color','#fff');
						
						
						$(".pagination>li>span").attr('class','badge badge-danger').css('margin-left','10px').css('color','#555');
					</script>
                        </div>
		          	<br />
              	</center>
              </div>
            </div>
          </div>
        </div>
<script>
  $(".delete").click(function(){
      if(confirm('确定删除吗')){
          id = $(this).parents('tr').find('td:first').html();
          td = $(this);
          $.get('/adminshopdel',{id:id},function(data){
              if(data == 1){
                  // alert("删除成功");
                  td.parents('tr').remove();
              }else{
                  alert("删除失败");
              }
          })
      }


  })
</script>
@endsection
@section('title','商品列表')

