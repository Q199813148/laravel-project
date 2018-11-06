
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
                  <h4 class="card-title">分类添加</h4>
                  <br>
                  <form class="forms-sample" action="/admintypes" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1"><h5>类别</h5></label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1"><h5>父类</h5></label>
                      <select class="" name="pid">
                      	<option value="0">--请选择--</option>
                      	@foreach($types as $value)
                      	<option value="{{$value->id}}">{{$value->name}}</option>
                      	@endforeach
                      </select><select class="" name="status">
                      	<option value="0">--关闭--</option>
                      	<option value="1">--开启--</option>
                      	
                      </select>
                    </div>
                    {{csrf_field()}}
                    <input type="submit" value="Submit" class="btn btn-info">
                    <input type="reset" value="Reset" class="btn" >
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection
@section('title','分类列表')                