@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <div>
        @if($user->image !== '')
            <img src="{{ Storage::url($user->image) }}">
        @else
            <img src="{{ asset('images/no_image.png') }}">
        @endif
        
        <a href="{{ route('profile.edit_image') }}">画像を変更</a>
    </div>
    <div>
        {{ $user->name }}さん
        <a href="{{ route('profile.edit') }}">プロフィール編集</a>
    </div>
    <br>
    <div>
        <dl>
            <dt>プロフィール</dt>
            @if($user->profile !== '')
                <dd>{{ $user->profile }}</dd>
            @else
                <dd>プロフィールが設定されていません。</dd>
            @endif
        </dl>
    </div>
    <br>
    <div>
        出品数：{{ $user_items }}
    </div>
    <div>
        <h2>購入履歴</h2>
        @forelse($user->orders as $order)
            <p>{{ $order->item->item_name }} : {{ $order->item->price }}円　出品者：{{ $order->item->user->name }}さん</p>
        @empty
            <p>購入履歴はありません</p>
        @endforelse
    </div>
@endsection