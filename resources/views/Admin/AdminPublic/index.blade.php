<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>悦桔拉拉后台管理系统</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/static/Admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/static/Admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/static/Admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/static/Admin/images/favicon.png" />
  <script src="/static/js/jquery-1.8.3.min.js"></script>
  <script src="/static/Home/js/jquery-1.7.2.min.js"></script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="/admin"><img src="/static/Admin/images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="/admin"><img src="/static/Admin/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        
      @section('search')
       
      @show
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="/static/Admin/images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">@if(session('admin')->name) {{session('admin')->name}} @endif</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                 活动日志
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/admins/exit">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                 退出
              </a>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="/admins/exit">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-line-spacing"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        	<li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="/static/Admin/images/faces/face1.jpg" alt="轮廓">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{session('admin')->name}}</font><font style="vertical-align: inherit;"></font></font></span>
                <span class="text-secondary text-small"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                	@if(session('admin')->level == 1) 
                	超级管理员
                	@else
                	管理员
                	@endif
                </font></font></span>
              </div>
                	@if(session('admin')->status == 1)
             			<i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                	@else
              		<i class="mdi mdi-bookmark-remove text-danger nav-profile-badge"></i>
                	@endif
              
            </a>
          </li>
          <li class="nav-item suibian">
            <a class="nav-link" aria-expanded="false">
              <span class="menu-title">管理员</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/adminusers"> 管理列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="/adminusers/create"> 添加管理 </a></li>
                <li class="nav-item"> <a class="nav-link" href="/adminrole"> 角色列表</a></li>
                <li class="nav-item"> <a class="nav-link" href="/adminrole/create"> 添加角色 </a></li>
              </ul>
              </div>
          </li> 
          <li class="nav-item suibian">
            <a class="nav-link" aria-expanded="false" >
              <span class="menu-title">用户管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/adminuser"> 用户列表 </a></li>
              </ul>
              </div>
          </li>
          <li class="nav-item suibian">
            <a class="nav-link" aria-expanded="false" >
              <span class="menu-title">商品分类</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admintypes"> 分类列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="/admintypes/create"> 添加列表 </a></li>
              </ul>
              </div>
          </li>
          <li class="nav-item suibian">
            <a class="nav-link" aria-expanded="false" >
              <span class="menu-title">商品信息</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/adminshop"> 商品列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="/adminshop/create"> 添加商品 </a></li>
              </ul>
              </div>
          </li>
          <li class="nav-item suibian">
            <a class="nav-link" aria-expanded="false" >
              <span class="menu-title">订单管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/adminorders"> 订单列表 </a></li>
              </ul>
              </div>
          </li>
          <li class="nav-item suibian">
            <a class="nav-link" aria-expanded="false" >
              <span class="menu-title">轮播图管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/adminshows"> 轮播图列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="/adminshows/create"> 轮播图添加 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item suibian">
            <a class="nav-link" aria-expanded="false" >
              <span class="menu-title">公告管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/adminnotice"> 公告列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="/adminnotice/create"> 添加公告 </a></li>
              </ul>
              </div>
          </li>
          <li class="nav-item suibian">
            <a class="nav-link" aria-expanded="false" >
              <span class="menu-title">广告管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/adminadvertisement"> 广告列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="/adminadvertisement/create"> 添加广告 </a></li>
              </ul>
              </div>
          </li>
          <li class="nav-item suibian">
            <a class="nav-link" aria-expanded="false" >
              <span class="menu-title">友情链接管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/adminlinks"> 链接列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="/linkreq"> 链接申请列表 </a></li>
                <li class="nav-item"> <a class="nav-link" href="/adminlinks/create"> 添加链接 </a></li>
              </ul>
              </div>
          </li>
          <script>
            $('.suibian').click(function () {
              obj = $(this);
              bool = obj.find('a:first').attr('aria-expanded');
              if(bool == 'false'){
                obj.find('a:first').attr('aria-expanded',"true");
                obj.find('div:first').attr('class','collapse show');
              }else{
                obj.find('a:first').attr('aria-expanded',"false");
                obj.find('div:first').attr('class','collapse');
              }
            });
          </script>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
      @section('admin')
       
      @show
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="/static/Admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="/static/Admin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/static/Admin/js/off-canvas.js"></script>
  <script src="/static/Admin/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/static/Admin/js/dashboard.js"></script>
  <script src="/static/Admin/js/chart.js"></script>
  <!-- End custom js for this pageFE7C96-->
@if(session('error'))
<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list show baocuo" style="position: fixed; top: 12%; left: 35%; width: 30%; " >
	<h6 class="p-3 mb-0" style="text-align: center;">哔~~</h6>
	<div class="dropdown-divider"></div>	
	<br /><br />
	<h6 class="p-3 mb-0 text-center" style="color: #f00;">{{session('error')}}</h6>
	<br /><br />
</div>
@endif
<script type="text/javascript">
	$('.baocuo').click(function() {
		$(this).css('display','none');
	});
</script>
</body>

</html>
