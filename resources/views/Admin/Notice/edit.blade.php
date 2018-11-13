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
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">编辑公告</font></font></h4>
                  <p class="card-description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  </font></font></p>
                  <form class="forms-sample" action="/adminnotice/{{$data->id}}" method="post">
                    <div class="form-group"> 
                      <label for="exampleInputName1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标题<span class="text-danger" style="font-size: 12px;"></span></font></font></label>
                      <input type="text" name="title" value="{{$data->title}}{{old('title')}}" class="form-control" id="exampleInputName1" placeholder="Title">
                    </div>
                    
                    <div class="form-group">
                            <label for="exampleInputName1"><h5>是否启用公告</h5></label><br>
                            <div class="form-check">
                                <label class="form-check-label"><input class="form-check-input" id="optionsRadios1" type="radio" name="status" value="0" @if($data->status==0) checked @endif>
                                    <span class="input-helper">禁用</span></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" id="optionsRadios1" type="radio" name="status" value="1" @if($data->status==1) checked @endif>
                                    <span class="input-helper">启用</span></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>公告内容</h5></label>


                        <!-- 加载编辑器的容器 -->
                        <script id="container" name="content" type="text/plain">{!! $data->content !!}</script>
                        <!-- 配置文件 -->
                        <script type="text/javascript" src="/ueditor-mz/ueditor.config.js"></script>
                        <!-- 编辑器源码文件 -->
                        <script type="text/javascript" src="/ueditor-mz/ueditor.all.js"></script>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                            ue.ready(function(){
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
                            });
                        </script>
                        </div>
               		{{csrf_field()}}
               		{{ method_field('PUT') }}
                    <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
                    <button type="reset" class="btn btn-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">重置</font></font></button>
                  </form>
                </div>
              </div>
            </div>
@endsection