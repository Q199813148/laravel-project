<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//修改收货信息校验类
use App\Http\Requests\Home\HomePersonaleditinsert;
use DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
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
        // 查询信息
        $data = DB::table('address')->where('id','=',$id)->first();
        // dd($address);
        //加载模板
        return view("Home.Personal.addressedit",['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomePersonaleditinsert $request, $id)
    {
        //获取数据
        $data = $request->only(['name','phone']);
        if($request->input('city') == "--请选择--"){
            return back()->with('error','修改失败');
        }else{
            $data['address'] = join(explode(',',$request->input('city')),' ').' '.$request->input('detailed');
            // dd($data);
            if(DB::table('address')->where('id','=',$id)->update($data)){
                return redirect('/personaladdress')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }
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
