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
                    <h4 class="card-title">轮播图编辑</h4>
                    <br>
                    <form class="forms-sample" action="/adminshows/{{$data->id}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>轮播图名称</h5></label>
                            <input type="text" value="{{$data->name}}" class="form-control" id="exampleInputName1" name="name" />
                        </div>

                        <div class="form-group">

                            <label for="exampleInputName1"><h5>轮播图图片</h5></label>
                                    <i class="mdi mdi-arrow-right-bold"></i>
                                    <i class="mdi mdi-file-image"></i>
                                    <a href="{{$data->pic}}" target="_blank" class="card-title text-danger" style="font-size: 14px;">查看原图</a>

                            <input type="file" class="form-control" id="exampleInputName1" name="pic" value="{{$data->pic}}">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>跳转地址</h5></label>
                            <input type="text" value="{{$data->url}}" class="form-control" id="exampleInputName1" name="url" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>轮播图是否展示</h5></label><br>
                            <div class="form-check">
                                <label class="form-check-label"><input class="form-check-input" id="optionsRadios1" type="radio" name="status" value="0" @if($data->status==0) checked @endif>
                                    <span class="input-helper">隐藏</span></label>
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" id="optionsRadios1" type="radio" name="status" value="1" @if($data->status==1) checked @endif>
                                <span class="input-helper">展示</span></label>
                        </div>


                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <br>
                        <input type="submit" value="提交" class="btn btn-info">
                        <input type="reset" value="重置" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title','添加商品')