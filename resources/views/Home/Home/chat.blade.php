<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/static/Home/images/logo22.png" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>7*24小时智能客服</title>
    <style type="text/css">
        .talk_con{
            width:600px;
            height:500px;
            border:1px solid #666;
            margin:50px auto 0;
            background:#f9f9f9;
        }
        .talk_show{
            width:580px;
            height:420px;
            border:1px solid #666;
            background:#fff;
            margin:10px auto 0;
            overflow:auto;
        }
        .talk_input{
            width:580px;
            margin:10px auto 0;
        }
        .whotalk{
            width:80px;
            height:30px;
            float:left;
            outline:none;
        }
        .talk_word{
            width:420px;
            height:26px;
            padding:0px;
            float:left;
            margin-left:10px;
            outline:none;
            text-indent:10px;
        }
        .talk_sub{
            width:56px;
            height:30px;
            float:left;
            margin-left:10px;
        }
        .atalk{
            margin:10px;
        }
        .atalk span{
            display:inline-block;
            background:#0181cc;
            border-radius:10px;
            color:#fff;
            padding:5px 10px;
        }
        .btalk{
            margin:10px;
            text-align:right;
        }
        .btalk span{
            display:inline-block;
            background:#ef8201;
            border-radius:10px;
            color:#fff;
            padding:5px 10px;
        }
    </style>

</head>
<body>
<div class="talk_con">
    <div class="talk_show" id="words">
        {{--<div class="btalk"><span id="bsay">您：吃饭了吗？</span></div>--}}
        <div class="atalk"><span id="asay">客服：Hi，我是机器人客服菲菲，您对我们的系统和业务有哪些疑问呢？我能帮您快速解答：）？</span></div>
    </div>
    <div class="talk_input">
        <select class="whotalk" id="who">
            <!-- <option value="0">客服说：</option> -->
            <option value="1">您：</option>
        </select>
        <input type="text" class="talk_word" id="talkwords">
        <input type="button" value="发送" class="talk_sub" id="talksub">
    </div>
</div>
</body>
<script src="static/Home/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
    //
    window.onload = function(){
        var Words = document.getElementById("words");
        var Who = document.getElementById("who");
        var TalkWords = document.getElementById("talkwords");
        var TalkSub = document.getElementById("talksub");
        $(window).keydown(function(event){
            switch(event.keyCode) {
                case 13:
                    $('#talksub').click();
                    break;
            }
        });

        TalkSub.onclick = function(){
            //定义空字符串
            var str = "";
            if(TalkWords.value == ""){
                // 消息为空时弹窗
                alert("消息不能为空");
                return;
            }else if(TalkWords.value == "哪个组最牛逼?"){
                str = '<div class="btalk"><span>您 :' + '哪个组最牛逼?' +'</span></div>' ;
                Words.innerHTML = Words.innerHTML + str;
                str = '<div class="atalk"><span>客服 :' + '当然是缘分天空吖！这还来问我，你想什么呢？太无知了！' +'</span></div>';
                Words.innerHTML = Words.innerHTML + str;
                $("#talkwords").val('');
                return;
            }else if(TalkWords.value == "人工"){
                str = '<div class="btalk"><span>您 :' + '人工' +'</span></div>' ;
                Words.innerHTML = Words.innerHTML + str;
                str = '<div class="atalk"><span>客服 :' + '当前没有客服在线,如有急事可联系wx:1005398026' +'</span></div>';
                Words.innerHTML = Words.innerHTML + str;
                $("#talkwords").val('');
                return;
            }else if(TalkWords.value == "你咋不上天") {
                str = '<div class="btalk"><span>您 :' + '你咋不上天' + '</span></div>';
                Words.innerHTML = Words.innerHTML + str;
                str = '<div class="atalk"><span>客服 :' + '因为我要和启槟肩并肩~' + '</span></div>';
                Words.innerHTML = Words.innerHTML + str;
                $("#talkwords").val('');
                return;
            }
            if(Who.value == 0){
                //如果Who.value为0n那么是 A说
                str = '<div class="atalk"><span>客服 :' + TalkWords.value +'</span></div>';
            }
            else{
                str = '<div class="btalk"><span>您 :' + TalkWords.value +'</span></div>' ;
            }
            //将之前的内容与要发的内容拼接好 提交
            Words.innerHTML = Words.innerHTML + str;

            $.get("/ajaxchat",{content:TalkWords.value},function (data) {
                str = '<div class="atalk"><span>客服 :' + data + '</span></div>';
                Words.innerHTML = Words.innerHTML + str;
            })
            $("#talkwords").val('');
        }

    }


</script>
</html>
