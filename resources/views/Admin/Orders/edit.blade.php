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
                    <h4 class="card-title">修改快递</h4>
                    <br>
                    <form class="forms-sample" action="/adminorders/{{$data->id}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>快递公司</h5></label>
                            <select name="company" class="form-control" id="exampleFormControlSelect2">
                                <option value="shentong">申通</option>
                                <option value="ems">EMS</option>
                                <option value="shunfeng">顺丰</option>
                                <option value="yuantong">圆通</option>
                                <option value="zhongtong">中通</option>
                                <option value="yunda">韵达</option>
                                <option value="tiantian">天天</option>
                                <option value="huitong">汇通</option>
                                <option value="quanfeng">全峰</option>
                                <option value="debangwuliu">德邦</option>
                                <option value="zhaijisong">宅急送</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1"><h5>快递单号</h5></label>
                            <input type="text" class="form-control" id="exampleInputName1" name="express" value="{{$data->express}}" required>
                        </div>
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <br>
                        <input type="hidden" name="status" value="{{$data->status}}">
                        <input type="submit" value="提交" class="btn btn-info">
                        <input type="reset" value="重置" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title','修改快递')