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
@section("admin")
<div class="card-body">
                  <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公告内容</font></font></h4>
                  <form class="form-sample">
                    
                    <div class="form-group">
                      
                      {!! $data->content !!}
                    </div>
                    </form>
                          </div>
@endsection
@section('title','后台首页')