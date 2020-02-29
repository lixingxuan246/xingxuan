<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manage extends Model
{
    //
        protected $table = 'manage'; //表名
    protected $primaryKey = 'm_id';  //id
    public $timestamps=false;   //时间
    protected $guarded = [];   //黑名单
}
