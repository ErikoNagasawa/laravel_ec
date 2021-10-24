<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\User;
use App\Like;
use App\Order;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ItemImageRequest;
use App\Http\Requests\ItemInformationRequest;
use App\Services\FileUploadService;

class ItemController extends Controller
{
    public function index() {
        $user = \Auth::user();
        $items = Item::recommend($user->id);
        
        return view('items.top', [
           'title' => 'トップページ',
           'items' => $items,
        ]);
    }
    
    public function create() {
        
        return view('items.create', [
           'title' => '新規出品', 
           'categories' => Category::all()
        ]);
    }
    
    public function store(ItemRequest $request, FileUploadService $service) {
        
        $path = $service->saveImage($request->file('image'));
        
        Item::create([
           'user_id' => \Auth::user()->id,
           'item_name' => $request->item_name,
           'comment' => $request->comment,
           'price' => $request->price,
           'category_id' => $request->category_id,
           'image' => $path,
        ]);
        session()->flash('success', '投稿を追加しました');
        return redirect()->route('users.exhibitions', \Auth::user()->id);
    }
    
    public function show($id) {
        $item = Item::find($id);
        return view('items.show', [
           'title' => '商品詳細', 
           'item' => $item,
        ]);
    }
    
    public function edit($id) {
        $item = Item::find($id);
        return view('items.edit', [
           'title' => '商品情報の編集', 
           'item' => $item,
           'categories' => Category::all()
        ]);
    }
    
    public function update($id, ItemInformationRequest $request) {
        $item = Item::find($id);
        $item->update($request->only(['item_name','comment', 'price', 'category_id']));
        session()->flash('success', '商品情報を更新しました。');
        return redirect()->route('items.show', $item);
    }
    
    public function editImage($id) {
        $item = Item::find($id);
        return view('items.edit_image',[
           'title' => '商品画像の変更',
           'item' => $item,
        ]);
    }
    
    public function updateImage($id, ItemImageRequest $request, FileUploadService $service) {
        $path = $service->saveImage($request->file('image'));
        
        $item = Item::find($id);
        
        if($item->image !== '') {
            \Storage::disk('public')->delete(\Storage::url($item->image));
        }
        
        $item->update([
           'image' => $path,
        ]);
        session()->flash('success', '画像を変更しました。');
        return redirect()->route('items.show', $item); 
    }
    
    public function destroy($id) {
        $item = Item::find($id);
        
        if($item->image !== '') {
            \Storage::disk('public')->delete(\Storage::url($item->image));
        }
        
        $item->delete();
        session()->flash('success', '出品を削除しました。');
        return redirect()->route('users.exhibitions', \Auth::user()->id);
    }
    
    public function confirm($id) {
        $item = Item::find($id);
        return view('items.confirm', [
           'title' => '購入確認画面',
           'item' => $item,
        ]);
    }
    
    public function finish($id) {
        Order::create([
           'user_id' => \Auth::user()->id,
           'item_id' => $id,
        ]);
        return view('items.finish', [
           'title' => '購入完了画面',
           'item' => Item::find($id),
        ]);
    }
    
    public function toggleLike($id) {
        $user = \Auth::user();
        $item = Item::find($id);
        
        if($item->isLikedBy($user)) {
            $item->likes->where('user_id', $user->id)->first()->delete();
            session()->flash('success', 'いいねを取り消しました。');
        } else {
            Like::create([
               'user_id' => $user->id,
               'item_id' => $item->id,
            ]);
            session()->flash('success', 'いいねしました。');
        }
        return redirect()->route('top');
    }
    
    public function  __construct() {
        $this->middleware('auth');
    }
}
