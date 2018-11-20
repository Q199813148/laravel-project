@extends("Admin.AdminPublic.index")
@section("search")
        
@endsection
@section("admin")
<div class="card-body">
                  <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">订单详情</font></font></h4>
                  @if(!empty($data))
                  @foreach($data as $row)
                  <form class="form-sample">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <a href="/goodsdetail?id={{$row->good_id}}"><img src="{{$row->photo}}" alt="" style="width:150px; height:150px;"></a>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品名称</font></font></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" disabled="disabled" value="{{$row->good_name}}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">收件人</font></font></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" type="" disabled="disabled" value="{{$row->name}}">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">手机</font></font></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" disabled="disabled" value="{{$row->phone}}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" disabled="disabled" value="{{$row->address}}">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">价格</font></font></label>
                          <div class="col-sm-9">
                            <input class="form-control" disabled="disabled" value="{{$row->price}}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">数量</font></font></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" disabled="disabled" value="{{$row->num}}">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">口味</font></font></label>
                          <div class="col-sm-9">
                            <input class="form-control" disabled="disabled" value="{{$row->taste}}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">订单备注</font></font></label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" disabled="disabled">{{$row->remarks}}</textarea>
                    </div>
                    </form>
                    @endforeach
                    @endif
                    <center>{{$data->render()}}</center>

                          </div>
@endsection
@section('title','后台首页')