<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
         protected $table = 'goods'; //表名
    protected $primaryKey = 'g_id';  //id
    public $timestamps=false;   //时间
    protected $guarded = [];   //黑名单
}
