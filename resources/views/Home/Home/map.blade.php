<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<link rel="icon" href="/static/Home/images/logo22.png" type="image/x-icon"/>
	<style type="text/css">
		body, html {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
		#allmap{width:100%;height:500px;}
		p{margin-left:5px; font-size:14px;}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Bplx0RcnGrDR62vaNXZyqKM4f3Men5t4"></script>
	<title>公司地址</title>
</head>
<body>
<div id="allmap"></div>
<p>点击标注点，可查看信息窗口</p>
</body>
</html>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(113.409539,23.119852);
    var marker = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker);              // 将标注添加到地图中
    map.centerAndZoom(point, 20);
    var opts = {
        width : 200,     // 信息窗口宽度
        height: 100,     // 信息窗口高度
        title : "兄弟连教育(广州校区)" , // 信息窗口标题
        enableMessage:true,//设置允许信息窗发送短息
        message:"电话：4007001307"
    }
    var infoWindow = new BMap.InfoWindow("地址：天河区宦溪西路20-12号万富商业大厦三层312室(单身狗聚集地)", opts);  // 创建信息窗口对象
    marker.addEventListener("click", function(){
        map.openInfoWindow(infoWindow,point); //开启信息窗口
        map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    });
</script>
