<?php

namespace App\Model;
use App\User;
use App\Model\Like;

use Illuminate\Database\Eloquent\Model;

class Replay extends Model
{
    protected $guarded=[];

    public function question(){
      return $this->belongsTo(Question::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function like(){
      return $this->hasMany(Like::class);
    }
}
