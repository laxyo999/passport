<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
     protected $fillable = ['users_id','posts_id','body'];
}
