<?php
/*
 * @Descripttion:
 * @version: 请写项目版本
 * @Author: @周泽钦
 * @Date: 2020-11-16 17:13:09
 * @LastEditors: @周泽钦
 * @LastEditTime: 2020-11-16 17:27:01
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //1、用户模型关联数据表
    public $table = 'pharmacy_permission';
    //2、关联表的主键
    public $primaryKey = 'id';
    //3、允许被批量操作的字段
    // protected $fillable = [
    //     'user_name','user_pass'
    // ];
    protected $guarded = [];    //这个方法为不允许操作的字段，这里如果为空的话就是指数据库的字段都可以进行操作

    //4、禁用一下模型的时间戳，是否维护crated_at和update_at字段
    public $timestamps =false;

}
