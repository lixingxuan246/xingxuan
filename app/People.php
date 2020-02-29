<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    //
    protected $table = 'people'; //表名
    protected $primaryKey = 'p_id';  //id
    public $timestamps=false;   //时间
    protected $guarded = [];   //黑名单



}
