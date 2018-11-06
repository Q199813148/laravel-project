<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>登录</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/static/Admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/static/Admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/static/Admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/static/Admin/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="/static/Admin/images/logo.svg">
              </div>
              <h4>你好，让我们开始吧！</h4>
              <h6 class="font-weight-light">登录以继续</h6>
              <form class="pt-3" action="/admins/dologin" method="post">
                <div class="form-group">
                  <input type="name" name="name" value="{{old('name')}}" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <img  title="点击刷新" src="/static/Admin/yzm/captcha.php" align="absbottom" onclick="this.src='/static/Admin/yzm/captcha.php?'+Math.random();"></img> 
						      @if(session('error'))
						      <span class="text-danger">{{session('error')}}</span>
						      @endif 
                  <br /><br />
                  <input type="password" name="code" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Code">
                </div>
                {{csrf_field()}}
                <div class="mt-3">
                	<button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">登录</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="keep" class="form-check-input">
                      	自动登录
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">忘记密码</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/static/Admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="/static/Admin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="/static/Admin/js/off-canvas.js"></script>
  <script src="/static/Admin/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
