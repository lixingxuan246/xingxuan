<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regulate extends Model
{
    //
         protected $table = 'regulate'; //表名
    protected $primaryKey = 'r_id';  //id
    public $timestamps=false;   //时间
    protected $guarded = [];   //黑名单
}
