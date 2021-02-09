<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewUsers extends Model
{
    protected $fillable = ['id','user_name','email','password','is_active'];
    protected $table = 'new_users';
}
