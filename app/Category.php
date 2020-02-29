<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
     protected $table = 'category'; //表名
    protected $primaryKey = 'c_id';  //id
    public $timestamps=false;   //时间
    protected $guarded = [];   //黑名单
}
