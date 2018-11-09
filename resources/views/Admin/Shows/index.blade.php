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
                  <h4 class="card-title">轮播图列表</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            id
                          </th>
                          <th>
                            名称
                          </th>
                          <th>
                            展示图
                          </th>
                          <th>
                            跳转地址
                          </th>
                          <th>
                            是否展示
                          </th>
                          <th>
                            operate
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($data as $val)
                        <tr>
                          <td>{{$val->id}}</td>
                          <td>
                            {{$val->name}}
                          </td>
                          <td>
                            {{$val->pic}}
                          </td>
                          <td>
                              <a href="{{$val->url}}" target="_blank">{{$val->url}}</a>
                          </td>
                          <td>
                              @if($val->status=='展示')
                              <span class="status badge badge-gradient-success" href="">{{$val->status}}</span>
                              @else
                              <span class="status badge badge-gradient-danger" href="">{{$val->status}}</span>
                              @endif
                                  <input type="hidden" value="{{$val->id}}" name="{{$val->status}}">
                          </td>
                            <form action="/adminshows/{{$val->id}}" method="post">
                          <td>
                            <a href="/adminshows/{{$val->id}}/edit" class="mdi mdi-settings btn btn-gradient-primary btn-sm"></a> |

                            <button class="mdi mdi-delete btn btn-gradient-danger btn-sm" onclick="return confirm('确定删除吗,数据无价,谨慎操作!')"></button>
                                {{csrf_field()}}
                                {{method_field('DELETE')}}

                          </td>
                            </form>
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
        $(".status").click(function () {
            id = $(this).next('input').val();
            status = $(this).next().attr('name');
            obj = $(this);
            $.get("/adminshowsajax",{id:id,status:status},function (data) {
                if(data['msg'] == '1'){
                    console.log(status);
                    if(status == '隐藏') {
                        obj.html("展示").attr('class',"status badge badge-gradient-success").next().attr('name','展示');
                    }else{
                        obj.html("隐藏").attr('class',"status badge badge-gradient-danger").next().attr('name','隐藏');
                    }
                }
            },'json')
        })
    </script>
@endsection
@section('title','轮播图列表')

