<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PersonalController extends Controller
{
    /**
     * 个人中心
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Home.Personal.index');
    }
	
    /**
     * 个人资料
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
    	$fens = 0;
    	if(session('user')->email) {
    		$fens += 50;
    	}elseif(session('user')->phone){
    		$fens += 50;
    	}
        $data = DB::table('user_info')->where('user_id','=',session('user')->user_id)->first();	
		$data->fens = $fens;
		$data->dates = date('Y'); 
		$birthday = explode('-', $data->birthday);
		$data->years = empty($birthday[0])?'':$birthday[0];
		$data->month = empty($birthday[1])?'':$birthday[1];
		$data->day = empty($birthday[2])?'':$birthday[2];
        return view('Home.Personal.data',['data'=>$data]);
		dd($birthday);
    }
	
	
	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
