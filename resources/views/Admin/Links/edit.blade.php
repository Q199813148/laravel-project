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
                    <h4 class="card-title">链接编辑</h4>
                    <br>
                    <form class="forms-sample" action="/adminlinks/{{$links->id}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>链接名</h5></label>
                            <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{$links->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>链接名</h5></label>
                            <input type="text" class="form-control" id="exampleInputName1" name="url" value="{{$links->url}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>是否显示链接</h5></label><br>
                            <div class="form-check">
                                <label class="form-check-label"><input class="form-check-input" id="optionsRadios1" type="radio" name="status" value="0" @if($links->status==0) checked @endif>
                                    <span class="input-helper">禁用</span></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" id="optionsRadios1" type="radio" name="status" value="1" @if($links->status==1) checked @endif>
                                    <span class="input-helper">启用</span></label>
                            </div>
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
@section('title','添加商品')