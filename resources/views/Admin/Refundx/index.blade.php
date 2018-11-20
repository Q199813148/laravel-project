@extends("Admin.AdminPublic.index")
@section("search")
@endsection
<!--列表-->
@section("admin")
<div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">管理列表</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            Id
                          </th>
                          <th>
                            DetailsId
                          </th>
                          <th>
                            RefundxType
                          </th>
                          <th>
                            RefundxName
                          </th>
                          <th>
                            Price
                          </th>
                          <th>
                            Content
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Operate
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($data as $val)
                        <tr>
                          <td>
                            {{$val->id}}
                          </td>
                          <td>
                         	{{$val->details_id}}
                          </td>
                          <td>
                            @if($val->refundx_type == 0)
                            	仅退款
                            @else
                            	退款/退货
                            @endif
                          </td>
                          <td>
                          	@if($val->refundx_name == 0)
                          		不想要了
                          	@elseif($val->refundx_name == 1)
                          		买错了
                          	@elseif($val->refundx_name == 2)
                          		没收到货
                          	@elseif($val->refundx_name == 3)
                          		与说明不符
                          	@endif
                          </td>
                          <td>
                          	{{$val->price}}
                          </td>
                          <td>
                          	{{$val->content}}
                          </td>
                          <td>
                            @if($val->status == 1)
                            	申请退款
                            @elseif($val->status == 2)
                            	退款完成
                            @endif
                          </td>
                          <td>
                          	<a href="/adminrefundx/{{$val->id}}/edit" class="text-warning">审批</a>
                          </td>
                        </tr>
                      	@endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!--分页-->
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
              	<center>
              		<br />
					<div class="btn-group" role="group" aria-label="Basic example">
					{{$data->render()}}
                    </div>
		          	<br />
              	</center>
              </div>
            </div>
          </div>
        </div>
@endsection       

@section('title','后台首页')

