<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cate;
use App\Model\Medicines;

class DataController extends Controller
{

    //药品采购量折线图
    public function echarts1(){
        $data=$this->selectMES(1);
        $text = "药品采购量折线图";
        $cateName = "[";
        $cate =Cate::where('cate_pid',0)->get();
        foreach ($cate as $value) {
            $cateName = $cateName."`".$value->cate_name."`,";
        }
        $cateName.="]";
        return view('admin.charts.echarts1',compact('text','cateName','data'));
    }

    //药品销售量折线图
    public function echarts2(){
        $data=$this->selectMES(0);
        $text = "药品销售量折线图";
        $cateName = "[";
        $cate =Cate::where('cate_pid',0)->get();
        foreach ($cate as $value) {
            $cateName = $cateName."`".$value->cate_name."`,";
        }
        $cateName.="]";
        return view('admin.charts.echarts1',compact('text','cateName','data'));
    }

    //员工销售额统计图
    public function echarts3(){
        $text = "员工销售额统计图";
        $reData=$this->selectMUS(0);
        $data = $reData[0];
        $userName = $reData[1];
        return view('admin.charts.echarts3',compact('text','data','userName'));
    }

    //收支情况统计图
    public function echarts4(){
        $text = "收支情况统计图";
        $data = $this->inAndpay();
        return view('admin.charts.echarts4',compact('text','data'));
    }

    //药品销售总量饼状图
    public function echarts5(){
        $text = "各类药品销售金额饼状图";
        $data = $this->medsTotal(0);
        return view('admin.charts.echarts5',compact('text',"data"));
    }

    //得到药品的不同月份销售量或者进货量的方法
    public function selectMES($state){
        $cate =Cate::where('cate_pid',0)->get();
        $mes = \DB::select('select cate_name,cate_pid,a.num,trade_state,create_time from pharmacy_medicines_entry_sell a,pharmacy_medicines b,pharmacy_category c where a.medicines_id=b.medicines_id and b.cate_id = c.cate_id and trade_state= ?', [$state]);
        $mod = array();
        //mod数组用来存放一种药品的不同月份的销售量后者进货量
        foreach ($cate as $key =>$cv) {
            foreach ($mes as $mv) {
                if($cv->cate_id==$mv->cate_pid){
                    if(empty($mod[$cv->cate_name][date('m',$mv->create_time)])){
                        $mod[$cv->cate_name][date('m',$mv->create_time)] =$mv->num;
                    }else{
                        $mod[$cv->cate_name][date('m',$mv->create_time)] +=$mv->num;
                    }
                }
            }
        }
        //构造data数据的json结构
        $data = "[";
        foreach ($mod as $key=>$v) {
            $tem = array();
            for($i=1;$i<=12;$i++){
                if(!empty($v["0".$i])){
                    $tem[$i]=$v["0".$i];
                }else{
                    $tem[$i]=0;
                }
            }
            $data .="{
                name: `".$key."`,
                type: `line`,
                stack: `总量`,
                data: [".$tem[1].",".$tem[2].",".$tem[3].",".$tem[4].",".$tem[5].",".$tem[6].",".$tem[7].",".$tem[8].",".$tem[9].",".$tem[10].",".$tem[11].",".$tem[12]."]
            },";

        }
        $data .= "]";

        return $data;
    }

    //得到不同月份员工销售额的方法
    public function selectMUS($state){
        $mes = \DB::select('select user_rname,total_price,create_time from pharmacy_medicines_entry_sell a,pharmacy_user b where a.user_id=b.user_id and trade_state=?', [$state]);
        $mod = array();//mod数组用来存放一种药品的不同月份的销售额
        foreach ($mes as $mv) {
            if(empty($mod[$mv->user_rname][date('m',$mv->create_time)])){
                $mod[$mv->user_rname][date('m',$mv->create_time)] =$mv->total_price;
            }else{
                $mod[$mv->user_rname][date('m',$mv->create_time)] +=$mv->total_price;
            }
        }
        //构造data数据的json结构
        $data = "[";
        $userName = "[";
        foreach ($mod as $key=>$v) {
            $tem = array();
            for($i=1;$i<=12;$i++){
                if(!empty($v["0".$i])){
                    $tem[$i]=$v["0".$i];
                }else{
                    $tem[$i]=0;
                }
            }
            $userName .= "`".$key."`,";
            $data .="{
                name: `".$key."`,
                type: `bar`,
                barGap: 0,
                label: labelOption,
                emphasis: {
                    focus: `series`
                },
                data: [".$tem[1].",".$tem[2].",".$tem[3].",".$tem[4].",".$tem[5].",".$tem[6].",".$tem[7].",".$tem[8].",".$tem[9].",".$tem[10].",".$tem[11].",".$tem[12]."]
            },";

        }
        $data .= "]";
        $userName.="]";
        $reData = array();//存放返回数组
        $reData[0] = $data;
        $reData[1] = $data;
        return $reData;
    }

    //获得收入支出的数值
    public function inAndpay(){
        $mes = \DB::select('select trade_state,total_price,create_time from pharmacy_medicines_entry_sell');
        // dd($mes);
        $mod = array();//mod数组用来存放一种药品的不同月份的销售额
        foreach ($mes as $mv) {
            if(empty($mod[$mv->trade_state][date('m',$mv->create_time)])){
                $mod[$mv->trade_state][date('m',$mv->create_time)] =$mv->total_price;
            }else{
                $mod[$mv->trade_state][date('m',$mv->create_time)] +=$mv->total_price;
            }
        }
        $tem1 = array();
        //构造data数据的json结构
        $data = "[";
        foreach ($mod as $key=>$v) {
            $tem = array();
            for($i=1;$i<=12;$i++){
                if(!empty($v["0".$i])){
                    if($key==0){
                        $tem[$i]=$v["0".$i];
                    }else{
                        $tem[$i]=-$v["0".$i];
                    }

                }else{
                    $tem[$i]=0;
                }
            }
            $tem1[$key] =$tem;
            $name=$key==0?"收入":"支出";
            $data .="{
                name: `".$name."`,
                type: `bar`,
                stack: `总量`,
                label: {
                    show: true
                },
                emphasis: {
                    focus: `series`
                },
                data: [".$tem[1].",".$tem[2].",".$tem[3].",".$tem[4].",".$tem[5].",".$tem[6].",".$tem[7].",".$tem[8].",".$tem[9].",".$tem[10].",".$tem[11].",".$tem[12]."]
            },";
        }
        $data .="{
            name: `盈利`,
            type: `bar`,
            stack: `总量`,
            label: {
                show: true
            },
            emphasis: {
                focus: `series`
            },
            data: [".intval($tem1[0][1]+$tem1[1][1]).",".intval($tem1[0][2]+$tem1[1][2]).",".intval($tem1[0][3]+$tem1[1][3]).",".intval($tem1[0][4]+$tem1[1][4]).",".intval($tem1[0][5]+$tem1[1][5]).",".intval($tem1[0][6]+$tem1[1][6]).",".intval($tem1[0][7]+$tem1[1][7]).",".intval($tem1[0][8]+$tem1[1][8]).",".intval($tem1[0][9]+$tem1[1][9]).",".intval($tem1[0][10]+$tem1[1][10]).",".intval($tem1[0][11]+$tem1[1][11]).",".intval($tem1[0][12]+$tem1[1][12])."]
        },";
        $data .= "]";

        return $data;
    }

    //获得各药品销售总数的方法
    public function medsTotal($state){
        $mes = \DB::select('select cate_name,sum(total_price) total from pharmacy_medicines_entry_sell a,pharmacy_medicines b,pharmacy_category c where a.medicines_id=b.medicines_id and b.cate_id = c.cate_id  and trade_state=? GROUP BY cate_name',[$state]);
        $mes = $this->bubbleSort($mes);//引用冒泡排序方法
        $data = "[";
        foreach ($mes as $key => $value) {
            $data .= "{value:". $value->total.", name: `".$value->cate_name."`},";
        }
        $data .= "]";
        return $data;
    }

    //冒泡排序：N^2
    public function bubbleSort($arr)
    {
        $n = count($arr);
        for($i=1;$i<$n;$i++) { //冒泡的轮数(最多$n-1轮)
            for($j=0;$j<$n-1;$j++) { //每一轮冒泡(两两比较，大者后移)
                if($arr[$j]->total<$arr[$j+1]->total){
                    $tem = $arr[$j];
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $tem;
                }
            }
        }
        return $arr;
    }
}
