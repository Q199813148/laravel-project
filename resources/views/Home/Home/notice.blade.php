@extends("Home.HomePublic.index")
<link href="/static/Home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/static/Home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
<link href="/static/Home/css/personal.css" rel="stylesheet" type="text/css">
@section('title','零食么-公告列表')
@section('goods')
<div class="am-g am-g-fixed blog-g-fixed bloglist">
  <div class="am-u-md-9">
    <article class="blog-main">
    @foreach ($data as $vel)
      <h3 class="am-article-title blog-title">
        <a href="#">{{$vel->title}}</a>
      </h3>
      <h4 class="am-article-meta blog-meta">{{$vel->addtime}}</h4>

      <div class="am-g blog-content">
        <div class="am-u-sm-12">
                   
          
           <p>{!! $vel->content !!}</p>
          

        </div>
  	@endforeach
      </div>

    </article>


    <hr class="am-article-divider blog-hr">
    
  </div>

  <div class="am-u-md-3 blog-sidebar">
    <div class="am-panel-group">

      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">热门话题</div>
        <ul class="am-list blog-list">
       @foreach ($info as $row)
        	<li><a href="/notice?id={{$row->id}}"><p>[公告]{{$row->title}}</p></a></li>  
       @endforeach 	
        </ul>
      </section>

    </div>
  </div>

</div>

<script type="text/javascript">
$(".slideall").css('height',"0px");
</script>
@endsection