@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
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

@endsection
