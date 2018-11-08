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
				<h4 class="font-weight-normal mb-3">每周销售 <i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
				<h2 class="mb-5">$ 15,0000</h2>
				<h6 class="card-text">增长60%</h6>
			</div>
		</div>
	</div>
	<div class="col-md-4 stretch-card grid-margin">
		<div class="card bg-gradient-info card-img-holder text-white">
			<div class="card-body">
				<img src="/static/Admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
				<h4 class="font-weight-normal mb-3">每周订单 <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i></h4>
				<h2 class="mb-5">45,6334</h2>
				<h6 class="card-text">Decreased by 10%</h6>
			</div>
		</div>
	</div>
	<div class="col-md-4 stretch-card grid-margin">
		<div class="card bg-gradient-success card-img-holder text-white">
			<div class="card-body">
				<img src="/static/Admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
				<h4 class="font-weight-normal mb-3">每周访客 <i class="mdi mdi-diamond mdi-24px float-right"></i></h4>
				<h2 class="mb-5">95,5741</h2>
				<h6 class="card-text">Increased by 5%</h6>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
					<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
						<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
					</div>
					<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
						<div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
					</div>
				</div>
				<h4 class="card-title">Area chart</h4>
				<canvas id="areaChart" style="height: 247px; display: block; width: 494px;" width="617" height="308" class="chartjs-render-monitor"></canvas>
			</div>
		</div>
	</div>
	<div class="col-lg-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
					<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
						<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
					</div>
					<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
						<div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
					</div>
				</div>
				<h4 class="card-title">Doughnut chart</h4>
				<canvas id="doughnutChart" style="height: 247px; display: block; width: 494px;" width="617" height="308" class="chartjs-render-monitor"></canvas>
			</div>
		</div>
	</div>
</div>
@endsection