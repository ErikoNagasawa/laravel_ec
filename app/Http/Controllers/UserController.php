<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserImageRequest;
use App\Services\FileUploadService;

class UserController extends Controller
{
    public function show($id) {
        $user = User::find($id);
        $user_items = Item::where('user_id', $id)->count();
        
        return view('user.profile', [
            'title' => 'プロフィール',
            'user' => $user,
            'user_items' => $user_items,
        ]);
    }
    
    public function edit() {
        $user = \Auth::user();
        return view('user.profile_edit', [
           'title' => 'プロフィール編集',
           'user' => $user,
        ]);
    }
    
    public function update(UserRequest $request) {
        $user = \Auth::user();
        $user->update($request->only(['name','profile']));
        session()->flash('success', 'プロフィールを更新しました。');
        return redirect()->route('users.show', $user);
    }
    
    public function editImage() {
        $user = \Auth::user();
        return view('user.profile_edit_image', [
           'title' => 'プロフィール画像編集',
           'user' => $user,
        ]);
    }
    
    public function updateImage(UserImageRequest $request, FileUploadService $service) {
        
        $path = $service->saveImage($request->file('image'));
        
        $user = \Auth::user();
        
        if($user->image !== ''){
            \Storage::disk('public')->delete(\Storage::url($user->image));
        }
        
        $user->update([
           'image' => $path, 
        ]);
        
        session()->flash('success', '画像を変更しました。');
        return redirect()->route('users.show', $user);
    }
    
    public function exhibitions($id) {
        $user = User::find($id);
        $items = $user->items()->latest()->paginate(3);
        return view('user.exhibitions', [
           'title' => '出品商品一覧',
           'user' => $user,
           'items' => $items,
        ]);
        
    }
    
    public function  __construct() {
        $this->middleware('auth');
    }
}
