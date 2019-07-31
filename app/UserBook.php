<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{

    protected $primaryKey = 'user_id';
    protected $table='user_books';

    protected $fillable = ['user_id','book_id'];



}
