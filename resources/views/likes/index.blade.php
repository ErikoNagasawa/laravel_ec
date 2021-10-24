@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    
    <ul class="items">
        @forelse($like_items as $item)
            <li class="item like_item">
                <div class="item_content">
                    <div class="item_body">
                        <div class="item_body_main">
                            <div class="item_body_main_img">
                                @if($item->image !== '')
                                    <a href="{{ route('items.show', $item) }}"><img src="{{ \Storage::url($item->image) }}"></a>
                                @else
                                    <a href="{{ route('items.show', $item) }}"><img src="{{ asset('images/no_image.png') }}"></a>
                                @endif
                            
                                {{ $item->comment }}
                            </div>
                            <div class="item_body_info">
                                商品名：{{ $item->item_name }}
                                {{ $item->price }}円
                            </div>
                            <div class="item_body_category">
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
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <li>商品はありません。</li>
        @endforelse
    </ul>
    {{ $like_items->links() }}
@endsection