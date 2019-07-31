<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Book extends Model
{

    protected $fillable = ['quantity','name','author','release_date','featured_book','image','description'];

    public function getReleaseYear(){
        return Carbon::parse($this->release_date)->format('M d, Y');
    }


}


