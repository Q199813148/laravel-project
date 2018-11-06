
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
                  <h4 class="card-title">分类修改</h4>
                  <br>
                  <form class="forms-sample" action="/admintypes/{{$types->id}}" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1"><h5>类名</h5></label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{$types->name}}">
                    </div>
         
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <input type="submit" value="Submit" class="btn btn-info">
                    <input type="reset" value="Reset" class="btn" >
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection
@section('title','分类列表')                