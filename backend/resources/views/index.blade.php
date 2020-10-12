@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('tweet') }}" method="post">
            @csrf
            <div class="form-group">
                <textarea name="text" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">ツイートする</button>
        </form>
    </div>
@endsection