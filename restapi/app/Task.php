<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title','started_at','end_at','dated','is_whole_day','is_completed','description','user_id'];
    protected $table = 'tasks';
}
