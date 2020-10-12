@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('tweet') }}" method="post">
            @csrf
            <div class="form-group">
                <textarea name="text" id="text" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">ツイートする</button>
        </form>

        <form action="{{ route('delete') }}" method="post" class="mt-5">
            @csrf
            <div class="form-group">
                <label for="user_name">ユーザー名</label>
                <input type="text" name="user_name" id="user_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="count">ツイート数</label>
                <input type="number" name="count" id="count" class="form-control">
                <small>最新のツイートから入力された分までのツイートを確認し、メディアが含まれていた場合削除します</small>
            </div>
            <button type="submit" class="btn btn-primary">削除する</button>
        </form>
    </div>
@endsection