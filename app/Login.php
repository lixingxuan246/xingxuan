<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //
    protected $table = 'login'; //表名
    protected $primaryKey = 'l_id';  //id
    public $timestamps=false;   //时间
    protected $guarded = [];   //黑名单
}
