<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',  'content', 'cate_id',"pic"
    ];	


    //按时间排序
    public function scopeWithOrder($query, $flag){
        return $query->orderBy($flag,"desc");
    }

    //反向关联用户
    public function user(){
    	return $this->belongsTo(User::class);
    }


    //反向关联分类
    public function cate(){

    	return $this->belongsTo(Cate::class);
    }

}


