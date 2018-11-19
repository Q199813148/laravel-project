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
                    <h4 class="card-title">广告修改</h4>
                    <br>
                    <form class="forms-sample" action="/adminadvertisement/{{$advertisement->id}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>广告标题</h5></label>
                            <input type="text" class="form-control" id="exampleInputName1" name="title" value="{{$advertisement->title}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>广告简介</h5></label>
                            <input type="text"  class="form-control" id="exampleInputName1" name="descr" value="{{$advertisement->descr}}" required/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>广告路径</h5></label>
                            <input type="text"  class="form-control" id="exampleInputName1" name="url" value="{{$advertisement->url}}" required/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>广告图片</h5></label>
                            <i class="mdi mdi-arrow-right-bold"></i>
                                    <i class="mdi mdi-file-image"></i>
                                    <a href="{{$advertisement->pic}}" target="_blank" class="card-title text-danger" style="font-size: 14px;">查看原图</a>
                            <input type="file" class="form-control" id="exampleInputName1" name="pic" value="{{$advertisement->pic}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>是否上架广告</h5></label><br>
                            <div class="form-check">
                                <label class="form-check-label"><input class="form-check-input" id="optionsRadios1" type="radio" name="status" value="{{$advertisement->status}}" @if($advertisement->status==0) checked @endif>
                                    <span class="input-helper">禁用</span></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" id="optionsRadios1" type="radio" name="status" value="{{$advertisement->status}}" @if($advertisement->status==1) checked @endif>
                                    <span class="input-helper">启用</span></label>
                            </div>
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
@section('title','修改广告')