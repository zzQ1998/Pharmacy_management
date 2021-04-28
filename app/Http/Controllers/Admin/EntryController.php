<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *进库表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //多表联合查询
        $meds = \DB::select('select a.id,small_pic,medicines_name,cate_name,user_rname,a.num,total_price,trade_state,create_time from pharmacy_medicines_entry_sell a,pharmacy_medicines b,pharmacy_category c,pharmacy_user d where a.medicines_id=b.medicines_id and b.cate_id = c.cate_id and a.user_id=d.user_id and trade_state=? order by create_time desc',[1]);
        //返回一个添加页面
        // dd($meds);
        $a = 1;
        return view('admin.entry.list',compact('meds','a'));
    }

    //出库表
    public function indexOut()
    {
        //多表联合查询
        $meds = \DB::select('select a.id,small_pic,medicines_name,cate_name,user_rname,a.num,total_price,trade_state,create_time from pharmacy_medicines_entry_sell a,pharmacy_medicines b,pharmacy_category c,pharmacy_user d where a.medicines_id=b.medicines_id and b.cate_id = c.cate_id and a.user_id=d.user_id and trade_state=? order by create_time desc',[0]);
        //返回一个添加页面
        $a = 0;
        return view('admin.entry.list',compact('meds','a'));
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
