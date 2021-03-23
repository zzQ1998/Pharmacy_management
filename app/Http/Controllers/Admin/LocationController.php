<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function getClientIP()
        {
            if (isset($_SERVER)) {
                if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                    /* 取X-Forwarded-For中第一个非unknown的有效IP字符串 */
                    foreach ($arr AS $ip) {
                        $ip = trim($ip);
                            if ($ip != 'unknown') {
                            $realip = $ip;
                            break;
                            }
                    }
                    if(!isset($realip)){
                        $realip = "0.0.0.0";
                    }
                } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                    $realip = $_SERVER['HTTP_CLIENT_IP'];
                } else {
                    if (isset($_SERVER['REMOTE_ADDR'])) {
                    $realip = $_SERVER['REMOTE_ADDR'];
                } else {
                    $realip = '0.0.0.0';
                }
                }
                } else {
                    if (getenv('HTTP_X_FORWARDED_FOR')) {
                    $realip = getenv('HTTP_X_FORWARDED_FOR');
                } elseif (getenv('HTTP_CLIENT_IP')) {
                    $realip = getenv('HTTP_CLIENT_IP');
                } else {
                    $realip = getenv('REMOTE_ADDR');
                }
            }
            preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
            $realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
            return $realip;
        }

    public static function getCity(){
        // 获取当前位置所在城市
            // $getIp = getClientIP();
            $getIp = "36.18.111.187";
            // echo("IP地址：".$getIp."<br/>");

            $content = file_get_contents("http://api.map.baidu.com/location/ip?ak=hvRe8M6F610gV4X2NHpY9oIgAxBiPHMO&ip={$getIp}&coor=bd09ll");
            $json = json_decode($content);
        //  print_r($json);
            echo("<br/>");
            $address = $json->{'content'}->{'address'};//按层级关系提取address数据
            $point_x = $json->{'content'}->{'point'}->{'x'};
            $point_y = $json->{'content'}->{'point'}->{'y'};
            $data['address'] = $address;
            $return['province'] = mb_substr($data['address'],0,3,'utf-8');
            $return['city'] = mb_substr($data['address'],3,3,'utf-8');
            $return['x'] = mb_substr($point_x,0,12,'utf-8');
            $return['y'] = mb_substr($point_y,0,12,'utf-8');
            return $return;
    }


}
