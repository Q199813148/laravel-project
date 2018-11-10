
@extends("Admin.AdminPublic.index")
@section("search")
    <div class="search-field d-none d-md-block">
        <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                    <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
        </form>
    </div>
@endsection
@section("admin")
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">商品添加</h4>
                    <br>
                    <form class="forms-sample" action="/adminshop" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>商品名称</h5></label>
                            <input type="text" class=" form-control names" id="exampleInputName1" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1"><h5>分词数据</h5></label>
                            <input type="text" class="fenci form-control" id="exampleInputName1" name="fenci">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1"><h5>商品价格</h5></label>
                            <input type="number" step="0.01"  class="form-control" id="exampleInputName1" name="price" placeholder="最多保留两位小数" required/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>商品分类</h5></label>
                            <select class="form-control form-control-sm" name="type_id" id="exampleFormControlSelect3">
                                <option value="0">--顶级分类--</option>
                                @foreach($types as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>商品库存</h5></label>
                            <input type="text" class="form-control" id="exampleInputName1" name="store" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>商品厂家</h5></label>
                            <input type="text" class="form-control" id="exampleInputName1" name="company" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>商品介绍</h5></label>
                            <input type="text" class="form-control" id="exampleInputName1" name="descr" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1"><h5>商品主图</h5></label>
                            <input type="file" class="form-control" id="exampleInputName1" name="photo" required>

                            {{--文件:<input type="file" name="pic"><br>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>是否上架商品</h5></label><br>
                            <div class="form-check">
                                <label class="form-check-label"><input class="form-check-input" id="optionsRadios1" type="radio" name="status" value="0" checked>
                                    <span class="input-helper">上架</span></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" id="optionsRadios1" type="radio" name="status" value="1">
                                    <span class="input-helper">下架</span></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>商品口味</h5></label>
                            <input type="text" class="form-control" id="exampleInputName1" name="taste" placeholder="多种口味请用英文逗号分隔(,)" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>商品详情</h5></label>


                        <!-- 加载编辑器的容器 -->
                        <script id="container" name="pic" type="text/plain">商品详情</script>
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
                        <br>
                        <input type="submit" value="提交" class="btn btn-info">
                        <input type="reset" value="重置" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".names").blur(function(){
            name = $(this).val();
            obj = $(this);
            $.get('/adminshopajax',{name:name},function(data){

                $('.fenci').val(data);
            })
        })
    </script>
@endsection
@section('title','添加商品')