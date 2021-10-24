<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    public function index() {
        $like_items = \Auth::user()->likeItems()->paginate(3);
        return view('likes.index', [
           'title' => 'お気に入り一覧',
           'like_items' => $like_items,
        ]);
    }
    
}
