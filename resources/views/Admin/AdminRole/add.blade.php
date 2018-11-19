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
                  <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加角色</font></font></h4>
                  <p class="card-description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                  </font></font></p>
                  <form class="forms-sample" action="/adminrole" method="post">
                    <div class="form-group"> 
                      <label for="exampleInputName1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">名称<span class="text-danger" style="font-size: 12px;">{{$errors->first('name')}}</span></font></font></label>
                      <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
               		{{csrf_field()}}
                    <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
                    <button type="reset" class="btn btn-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">重置</font></font></button>
                  </form>
                </div>
              </div>
            </div>
@endsection