@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($category)

                    <h1>Новости категории {{ $category }}</h1>

                    @forelse($news as $item)
                        <a href="{{ route('news.one', $item['id']) }}">{{ $item['title'] }}</a><br>
                    @empty
                        <p>Нет новостей</p>
                    @endforelse
                @else
                    Нет такой категории
                @endif
            </div>
        </div>
    </div>


@endsection
