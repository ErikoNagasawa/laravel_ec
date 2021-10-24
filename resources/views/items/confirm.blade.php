@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <dl>
        <dt>商品名</dt>
        <dd>{{ $item->item_name }}</dd>
    </dl>
    <dl>
        <dt>画像</dt>
        <dd>
            @if($item->image !== '')
                <img src="{{ \Storage::url($item->image) }}">
            @else
                <img src="{{ asset('images/no_image.png') }}">
            @endif
        </dd>
    </dl>
    <dl>
        <dt>カテゴリ</dt>
        <dd>{{ $item->category->name }}</dd>
    </dl>
    <dl>
        <dt>価格</dt>
        <dd>{{ $item->price }}</dd>
    </dl>
    <dl>
        <dt>説明</dt>
        <dd>{{ $item->comment }}</dd>
    </dl>
    <form method="post" action="{{ route('items.finish', $item) }}">
        @csrf
        @method('patch')
        <input type="submit" value="内容を確認し、購入する">
    </form>
    
@endsection