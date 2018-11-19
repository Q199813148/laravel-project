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
<div class="card-body">
	<p class="card-description">
		权限管理
	</p>
		<div class="row">
			<div class="col-md-6">
				<form action="/adminnode/{{$id}}" method="post">
				<div class="form-group" style="width: 200%;">
					@foreach($data as $val)
					<div class="form-check form-check-info" style="float: left; width: 50%;">
						<label class="form-check-label">
						<input type="checkbox" name="node[]" value="{{$val->id}}" class="form-check-input checkbox" @foreach($user as $value) @if($val->id == $value->node_id) checked @endif @endforeach>
						Name: <i class="input-helper" style=" width: 140px; display: inline-block;">{{$val->name}}</i> <i class="input-helper" style="width: 180px; display: inline-block;">模块:{{$val->m_name}}</i> <i class="input-helper" style="width: 150px; display: inline-block;">方法:{{$val->a_name}}</i></label>
					</div>
					@endforeach
					<div style="clear: both;"></div>
				</div>


				<div class="form-group" style="width: 200%;">
					<div class="form-check form-check-info" style="width: 8%; float: left;">
						<label class="form-check-label">
						<input type="checkbox" id="cheall" class="form-check-input">
						全选
						<i class="input-helper"></i></label>
					</div>
					<div class="form-check form-check-info" style="width:100%;float: left;">
                        <button type="button"id="btn1" class="btn btn-gradient-info btn-sm">反选</button>	
					</div>
					<div style="clear: both;"></div>
				</div>
               	{{csrf_field()}}
				{{method_field("PUT")}}
				<div class="form-group" style="width: 200%;">
					<div class="form-check form-check-info">
					<input class="btn btn-gradient-info btn-sm" type="submit" value="确定更改"/>
					</div>
				</div>
				</form>
			</div>

		</div>
</div>
<script type="text/javascript">
	box = document.getElementsByClassName('checkbox');
	cheall.onclick = function(){
		for(i = 0; i<box.length;i++){
			box[i].checked = cheall.checked;
		}
	}
	btn1.onclick = function(){
		for(i = 0; i<box.length; i++){
			box[i].checked = !box[i].checked;
		}
		if(cheall.checked == true) {
			cheall.checked = !cheall.checked;
		}
	}
</script>
@endsection