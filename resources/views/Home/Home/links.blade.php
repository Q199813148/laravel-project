@extends("Home.HomePublic.index")
<link href="/static/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
<link href="/static/Home/css/personal.css" rel="stylesheet" type="text/css">
@section('title','零食么-友情链接申请')
@section('goods')
<form class="am-form am-form-horizontal" action="/dorelinks" method="post">

  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">申请人</label>
    <div class="am-u-sm-10">
      <input type="text" name="username" id="doc-ipt-3" placeholder="输入您的姓名">
    </div>
  </div>
  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">联系电话</label>
    <div class="am-u-sm-10">
      <input type="text" name="phone" id="doc-ipt-3" placeholder="输入您的电话">
    </div>
  </div>
  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">链接名称</label>
    <div class="am-u-sm-10">
      <input type="text" name="name" id="doc-ipt-3" placeholder="输入您需要申请的链接名称">
    </div>
  </div>
  <div class="am-form-group">
    <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">链接地址</label>
    <div class="am-u-sm-10">
      <input type="text" name="url" id="doc-ipt-3" placeholder="输入您申请的链接地址">
    </div>
  </div>


  <div class="am-form-group">
    <div class="am-u-sm-10 am-u-sm-offset-2">
      <button type="submit" class="am-btn am-btn-default">提交申请</button>
    </div>
  </div>
  {{csrf_field()}}
</form>

<script type="text/javascript">
$(".slideall").css('height',"0px");
</script>
@endsection