<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Purchase;
use Carbon\Carbon;
use App\Model\User;
use Mail;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pur = Purchase::OrderBy('id','asc')
            ->paginate($request->input('num')!=0?$request->input('num'):6);//每次查询的数据条数

        return view('admin.entry.purlist',compact('pur','request'));//返回列表页面，并携带user

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Carbon::now());
        return view('admin.entry.addpur');
    }

    /**
     * Store a newly created resource in storage.
     *执行增加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $res = Purchase::create(['uid'=>session('user')->user_name,'ename'=>session('user')->user_rname,'price'=>$input['price'],'etime'=>strtotime($input['time']),'ctime'=> Carbon::now()->getPreciseTimestamp(0),'content'=>$input['content']]);
        if($res){//如果用户数据添加成功
            $data = [
                'status' =>0,
                'message' =>'申请提交成功!'
            ];
        }else{
            $data = [
                'status' => 1,
                'message' => '申请提交失败!'
            ];
        }
        return $data;
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

    public function purTable($id){
        $pur = Purchase::find($id);
        return view('admin.entry.table',compact('pur'));
    }

    public function purAgree($id){
        $pur = Purchase::find($id);
        $newNum = rand(1000,9999);
        $res = $pur->update(['aname'=>session('user')->user_rname,'stime'=> Carbon::now()->getPreciseTimestamp(0),'state'=>1,'exprice'=>'nicaiya','exprice'=>$newNum]);
        $user = User::where('user_name',$pur->uid)->first();
// dd($user->email);
        $a = array();
        $a[0] = $user->email;
        $a[1] = $newNum;
        Mail::send('email.exprice', ['user'=>$a], function ($m) use ($a) {
            $m->to($a[0], $a[1])->subject('申请码');//这是一个邮件发送给谁的方法
        });

        if($res){
            $data = [
                'status' =>0,
                'message' =>'您已同意该申请!'
            ];
        }else{
            $data = [
                'status' => 1,
                'message' => '提交失败!'
            ];
        }
        return $data;
    }
}
