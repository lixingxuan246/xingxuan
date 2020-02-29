<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    //
         protected $table = 'cargo'; //表名
    protected $primaryKey = 'c_id';  //id
    public $timestamps=false;   //时间
    protected $guarded = [];   //黑名单
}
