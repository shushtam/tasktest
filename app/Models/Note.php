<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Note extends Model
{
    //
      protected $fillable = [
        'name','category','text','user_id','active'
          
    ];
      
       public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
