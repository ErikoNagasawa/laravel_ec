<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'user_id', 'item_name', 'image', 'comment', 'price', 'category_id',
    ];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function likes() {
        return $this->hasMany('App\Like');
    }
    
    public function likedUsers() {
        return $this->belongsToMany('App\User', 'likes');
    }
    
    public function isLikedBy($user) {
        $liked_users_ids = $this->likedUsers->pluck('id');
        $result = $liked_users_ids->contains($user->id);
        return $result;
    }
    
    public function scopeRecommend($query, $self_id) {
        return $query->where('user_id', '!=', $self_id)->latest()->paginate(3);
    }
    public function isSoldOut() {
        $item = Order::where('item_id', $this->id)->get();
        return count($item) > 0;
    }
    
    public function category(){
      return $this->belongsTo('App\Category');
    }
}
