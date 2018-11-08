@extends("Admin.AdminPublic.index")
@section("search")
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" name="keywords" value="{{$request['keywords'] or ''}}" placeholder="Search projects">
            </div>
          </form>
        </div>
@endsection
@section("admin")
<div class="card-body">
                  <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">个人信息</font></font></h4>
                  <form class="form-sample">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">姓名</font></font></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" type="" disabled="disabled" value="{{$data->u_name}}">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">年龄</font></font></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" disabled="disabled" value="{{$data->age}}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">性别</font></font></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" disabled="disabled" value="{{$data->sex}}">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">出生日期</font></font></label>
                          <div class="col-sm-9">
                            <input class="form-control" disabled="disabled" value="{{$data->birthday}}">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">手机</font></font></label>
                          <div class="col-sm-9">
                            <input class="form-control" disabled="disabled" value="{{$data->phone}}">
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">简介</font></font></label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" disabled="disabled">{{$data->summary}}</textarea>
                    </div>
                    </form>
                          </div>
@endsection
@section('title','后台首页')