<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = "log";

    protected $fillable = ["admin_id","method","admin_name","url","params","ip","content","user_agent"];

}
