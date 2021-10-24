@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<h1>商品を出品</h1>
<h2>商品追加フォーム</h2>
    <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>
                商品名：<br>
                <input type="text" name="item_name">
            </label>
        </div>
        <div>
            <label>
                商品説明：<br>
                <textarea name="comment" rows="10" cols="40"></textarea>
            </label>
        </div>
        <div>
            <label>
                価格：<br>
                <input type="text" name="price">
            </label>
        </div>
        <div>
            <label>
                カテゴリー：<br>
                <select name="category_id" size="1">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    
                </select>
            </label>
        </div>
        <div>
            <label>
                画像を選択：
                <input type="file" name="image">
            </label>
        </div>
        <div>
            <input type="submit" value="出品">
        </div>
    </form>
@endsection