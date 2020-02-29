<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
         protected $table = 'brand'; //表名
    protected $primaryKey = 'b_id';  //id
    public $timestamps=false;   //时间
    protected $guarded = [];   //黑名单
}
