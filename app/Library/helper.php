<?php
function curlGet($url, $method, $post_data = 0)
{
    //初始化curl
        $ch=curl_init();
    //设置传输选项
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        if($method=='post'){
    // CURLOPT_POST 模拟post请求
            curl_setopt($ch,CURLOPT_POST,1);
    //传递参数 CURLOPT_POSTFIELDS
            curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);
        }elseif($method=="get"){
    // CURLOPT_HEADER 在请求头部添加信息
            curl_setopt($ch,CURLOPT_HEADER,0);
        }
    //执行curl
    $res=curl_exec($ch);
    //关闭curl
    curl_close($ch);
    return $res;
}

?>