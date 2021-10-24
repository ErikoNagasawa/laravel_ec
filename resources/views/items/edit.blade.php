@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <h2>商品追加フォーム</h2>
    <form method="POST" action="{{ route('items.update', $item) }}">
        @csrf
        @method('patch')
        <div>
            <label>
                商品名：<br>
                <input type="text" name="item_name" value="{{ $item->item_name }}">
            </label>
        </div>
        <div>
            <label>
                商品説明：<br>
                <textarea name="comment" rows="10" cols="40">{{ $item->comment }}</textarea>
            </label>
        </div>
        <div>
            <label>
                価格：<br>
                <input type="text" name="price" value="{{ $item->price }}">
            </label>
        </div>
        <div>
            <label>
                カテゴリー：<br>
                 <select name="category_id" size="1" >
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id === $item->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                    
                </select>
            </label>
        </div>
        <div>
            <input type="submit" value="更新">
        </div>
@endsection