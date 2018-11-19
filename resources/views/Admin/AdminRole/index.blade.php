@extends("Admin.AdminPublic.index")
@section("search")
<div class="search-field d-none d-md-block">
	<form class="d-flex align-items-center h-100" action="">
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
<div class="row">
	<div class="col-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">管理列表</h4>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th> Id </th>
								<th> Name </th>
								<th> Status </th>
								<th> Operate </th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $val)
							<tr>
								<td>{{$val->id}}</td>
								<td>{{$val->name}}</td>
								<td> <a href=""><span class="badge @if($val->status == '启用') badge-gradient-success @else badge-danger   @endif start">{{$val->status}}</span></a></td>
								<td>
									
									<a href="/adminnode/{{$val->id}}/edit" class="text-warning">
										修改权限
									</a><form style="display: initial;" action="/adminrole/{{ $val->id }}" onsubmit="return confirm('你确定删除吗？')" method="post">
										{{csrf_field()}}
										{{method_field("DELETE")}}
										<button style="border: 0; background: #fff;" class="text-danger" type="submit">
										<a class="text-danger">
											删除
										</a>
										</button>
									</form>
									<a href="/adminrole/{{ $val->id }}/edit" class="text-warning">
										修改
									</a></td>
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
					{{$data->appends($request)->render()}}
				</div>
				<br />
			</center>
		</div>
	</div>
</div>
</div>
@endsection