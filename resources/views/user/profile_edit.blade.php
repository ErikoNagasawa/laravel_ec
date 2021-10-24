@extends('layouts.logged_in')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <form method="POST" action="{{ route('profile.update', $user) }}">
        @csrf
        @method('patch')
        <div>
            <label>
                名前：</br>
                <input type="text" name="name" value="{{ $user->name }}">
            </label>
        </div>
        <div>
            <label>
                プロフィール：</br>
                <textarea name="profile" rows="10" cols="40">{{ $user->profile }}</textarea>
            </label>
        </div>
        <div>
            <input type="submit" value="更新">    
        </div>
    </form>
@endsection