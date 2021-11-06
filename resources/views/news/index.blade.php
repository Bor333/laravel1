@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <h2>Новости</h2>
                @forelse($news as $item)
                    <a href="{{ route('news.one', $item['id']) }}">{{ $item['title'] }}</a><br>
                @empty
                    <p>Нет новостей</p>
                @endforelse
        </div>
    </div>
</div>
@endsection
