<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $fillable = ['book_name', 'isbn_no', 'book_price'];

}
