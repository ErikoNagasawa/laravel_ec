@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $user->name }}の{{ $title }}</h1>
    <a href="{{ route('items.create') }}">新規出品</a>
    
    <ul class="items">
        @forelse($items as $item)
            <li class="item">
                <div>
                    @if($item->image !== '')
                        <a href="{{ route('items.show', $item) }}"><img src="{{ \Storage::url($item->image) }}"></a>
                    @else
                        <a href="{{ route('items.show', $item) }}"><img src="{{ asset('images/no_image.png') }}"></a>
                    @endif
                    {{ $item->comment }}
                </div>
                <div>
                    商品名：{{ $item->item_name }}
                    {{ $item->price }}円
                </div>
                <div>
                    カテゴリ：{{ $item->category->name }}
                    [{{ $item->created_at }}]
                </div>
                <ul>
                    @if($item->isSoldOut() === true)
                        <li class="sold_out">売り切れ</li>
                    @else
                        <li class="on_sale">出品中</li>
                    @endif
                </ul>
                <div>
                    <a href="{{ route('items.edit', $item) }}">[編集]</a>
                    <a href="{{ route('items.edit_image', $item) }}">[画像を変更]</a>
                </div>
                <form class="delete" method="post" action="{{ route('items.destroy', $item) }}">
                  @csrf
                  @method('delete')
                  <input type="submit" value="削除">
                </form>
            </li>
        
        @empty
            <li>出品している商品はありません。</li>
        @endforelse
        {{ $items->links() }}
@endsection