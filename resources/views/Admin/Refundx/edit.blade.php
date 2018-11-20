@extends("Admin.AdminPublic.index")
@section("search")
@endsection

@section('admin')
<div class="col-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">退款订单信息</h4>
			<br />
			<br />
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">商品名</label>
							<div class="col-sm-9">
								<input type="text" disabled value="{{$data->g_name}}" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">退款人</label>
							<div class="col-sm-9">
								<input type="text" disabled value="{{$data->name}}" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">退款商品口味</label>
							<div class="col-sm-9">
								<input type="text" disabled value="{{$data->taste}}" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">退款商品数量</label>
							<div class="col-sm-9">
								<input type="text" disabled value="{{$data->num}}" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">退款申请时间</label>
							<div class="col-sm-9">
								<input type="text" disabled value="{{$data->time}}" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">退款总价</label>
							<div class="col-sm-9">
								<input type="text" disabled value="{{$data->price}}" class="form-control">
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>

<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">退款审批</h4>
			<br />
			<form class="forms-sample" action="/adminrefundx/{{$data->id}}" method="post">
				<div class="form-group">
					<label for="exampleSelectGender">退款类型</label>
					<select disabled class="form-control" id="exampleSelectGender">
						@if($data->type == 0)
						<option>仅退款</option>
						@else
						<option>退款/退货</option>
						@endif
					</select>
				</div>
				<div class="form-group">
					<label for="exampleSelectGender">退款原因</label>
					<select disabled class="form-control" id="exampleSelectGender">
						@if($data->name == 0)
						<option>不要了</option>
						@elseif($data->name == 1)
						<option>买错了</option>
						@elseif($data->name == 2)
						<option>没收到货</option>
						@elseif($data->name == 3)
						<option>与说明不符</option>
						@endif
					</select>
				</div>
				<div class="form-group">
					<label for="exampleTextarea1">退款说明</label>
					<textarea class="form-control" disabled id="exampleTextarea1" rows="4">{{$data->content}}</textarea>
				</div>
				<div class="form-group">
					<label for="exampleSelectGender">是否通过</label>
					<select name="bool" class="form-control" id="exampleSelectGender">
						<option value="0">拒绝退款</option>
						<option value="1">同意退款</option>
					</select>
				</div>
				{{csrf_field()}}
          		{{method_field("PUT")}}
				<div class="form-group">
					<label for="exampleTextarea1">退款回复</label>
					<textarea name="content" class="form-control"placeholder="回复审批" id="exampleTextarea1" rows="4"></textarea>
				</div>
				<button type="submit" class="btn btn-gradient-primary mr-2">
					提交审核
				</button>
			</form>
		</div>
	</div>
</div>
@endsection