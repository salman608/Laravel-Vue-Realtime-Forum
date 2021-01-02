<?php

namespace App\Model;
use App\User;
use App\Model\Replay;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected static function boot(){
    parent::boot();
     static::creating(function($question){
       $question->slug=str_slug($question->title);
     });
  }
  public function getRouteKeyName(){
    return 'slug';
  }
  protected $fillable=['title','slug','body','category_id','user_id'];


    public function user(){
      return $this->belongsTo(user::class);
    }

    public function replays(){
        return $this->hasMany(Replay::class);
    }
    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function like(){
      return $this->hasMany(Like::class);
    }

    public function getPathAttribute(){
       return "/question/$this->slug";
    }
}
