@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<a href="{{ route('items.create') }}">新規商品</a>
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
                <a class="like_button">{{ $item->isLikedBy(Auth::user()) ? '★' : '☆' }}</a>
                <form method="post" class="like" action="{{ route('items.toggle_like',$item) }}">
                    @csrf
                    @method('patch')
                </form>
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
        </li>
        
    @empty
        <li>商品はありません。</li>
    @endforelse
        
</ul>
{{ $items->links() }}
  <script>
    /* global $ */
    $('.like_button').on('click', (event) => {
        $(event.currentTarget).next().submit();
    })
  </script>

@endsection