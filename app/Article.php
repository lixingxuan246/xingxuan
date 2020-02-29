<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
     protected $table = 'article'; //表名
    protected $primaryKey = 'a_id';  //id
    public $timestamps=false;   //时间
    protected $guarded = [];   //黑名单
}
