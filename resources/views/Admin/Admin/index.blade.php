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
<div class="page-header">
	<h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"> <i class="mdi mdi-home"></i> </span> 首页 </h3>
	<nav aria-label="breadcrumb">
		<ul class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">
				<span></span>总结 <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
			</li>
		</ul>
	</nav>
</div>
<div class="row">
	<div class="col-md-4 stretch-card grid-margin">
		<div class="card bg-gradient-danger card-img-holder text-white">
			<div class="card-body">
				<img src="/static/Admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
				<h4 class="font-weight-normal mb-3">一周销售 <i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
				<h2 class="mb-5">￥ {{$num}}</h2>
				<h6 class="card-text">同上周@if($numer > 0)增长 @else减少 @endif　{{abs($numer)}}%</h6>
			</div>
		</div>
	</div>
	<div class="col-md-4 stretch-card grid-margin">
		<div class="card bg-gradient-info card-img-holder text-white">
			<div class="card-body">
				<img src="/static/Admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
				<h4 class="font-weight-normal mb-3">一周订单 <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i></h4>
				<h2 class="mb-5">{{$orders}}</h2>
				<h6 class="card-text">同上周@if($orderer > 0)增长 @else减少 @endif　{{abs($orderer)}}%</h6>
			</div>
		</div>
	</div>
	<div class="col-md-4 stretch-card grid-margin">
		<div class="card bg-gradient-success card-img-holder text-white">
			<div class="card-body">
				<img src="/static/Admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
				<h4 class="font-weight-normal mb-3">一周完成订单 <i class="mdi mdi-diamond mdi-24px float-right"></i></h4>
				<h2 class="mb-5">{{$endorders}}</h2>
				<h6 class="card-text">同上周@if($endorderer > 0)增长 @else减少 @endif　{{abs($endorderer)}}%</h6>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4 stretch-card grid-margin">
		<div class="card bg-gradient-warning card-img-holder text-white">
			<div class="card-body">
				<img src="/static/Admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
				<h4 class="font-weight-normal mb-3">月销售 <i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
				<h2 class="mb-5">￥ {{$numy}}</h2>
				<h6 class="card-text"></h6>
			</div>
		</div>
	</div>
	<div class="col-md-4 stretch-card grid-margin">
		<div class="card bg-gradient-primary card-img-holder text-white">
			<div class="card-body">
				<img src="/static/Admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
				<h4 class="font-weight-normal mb-3">月订单 <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i></h4>
				<h2 class="mb-5">{{$ordersy}}</h2>
				<h6 class="card-text"></h6>
			</div>
		</div>
	</div>
	<div class="col-md-4 stretch-card grid-margin">
		<div class="card bg-gradient-dark card-img-holder text-white">
			<div class="card-body">
				<img src="/static/Admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
				<h4 class="font-weight-normal mb-3">月完成订单 <i class="mdi mdi-diamond mdi-24px float-right"></i></h4>
				<h2 class="mb-5">{{$endordersy}}</h2>
				<h6 class="card-text"></h6>
			</div>
		</div>
	</div>
</div>
@endsection