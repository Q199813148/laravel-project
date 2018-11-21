<?php

namespace App\Http\Controllers\Email;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class EmailController extends Controller
{
//	发送邮箱
	public function sendemail(Request $request)
	{
		$email = $request->input('email');
		$code = rand(1,9999);
		\Cookie::queue("emcode",$code,122);
		\Cookie::queue("email",$email,212);
        $ddis = $this->emails($email,$code);
		if($ddis) {
			echo 1;
		}else{
			echo 2;
		}
	}
	public function emails($email,$code)
	{
    	Mail::send('Home.Personal.sendemail', ['code'=>$code], function($message)use($email) {
		//发送主题
		$message->subject('[悦桔拉拉]你正在修改邮箱绑定');
		//接收方
		$message->to($email);
		$message->cc('fate_silver@163.com');
		});
		return true;
	}
}
