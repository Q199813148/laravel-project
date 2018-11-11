<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Help\scws\PSCWS4;

class WordCutController extends Controller
{
    //
    public $pscws;
    /*
    * pscws4分词 实例
    */
    public function scwsCut($str){
        $this->pscws = new PSCWS4('utf8');
        $this->pscws->set_charset('utf-8');
        $this->pscws->set_dict(public_path().'/dict.utf8.xdb');
        $this->pscws->set_rule(public_path().'/rules.ini');
        //忽略标点符号
        $this->pscws->set_ignore(true);
        //传递字符串
        $this->pscws->send_text($str);
        //获取全部的分词结果
        $data=$this->pscws->get_result();
        //打印
         echo "<pre>";
         var_dump($ret);
        //关闭
        $cws->close();


//        //使用：
//        $this->pscws->send_text("Dragon Boat Festival is one the very classic traditional festivals, which has been celebrated since the old China. Firstly, it is to in honor of the great poet Qu Yuan, who jumped into the water and ended his life for loving the country. Nowadays, different places have different ways to celebrate.
//    端午节是一个非常经典的传统节日，自古以来就一商品列表直被人们所庆祝。首先，是为了纪念伟大的诗人屈原，屈原跳入水自杀，以此来表达了对这个国家的爱。如今，不同的地方有不同的庆祝方式。");
//        while ($some = $this->pscws->get_result())
//        {
//            foreach ($some as $word)
//            {
//                $article[] = $word['word'];
//            }
//        }
//        dd($article);

    }

}
