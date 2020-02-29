<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    //
    protected $table = 'study'; //表名
    protected $primaryKey = 's_id';  //id
    public $timestamps=false;   //时间
    protected $guarded = [];   //黑名单
}
