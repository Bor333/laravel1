@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    @forelse($categories as $category)
        <a href="{{ route('news.category.show',  $category['slug']) }}"><h2>{{ $category['title'] }}</h2></a>
    @empty
        <p>Нет категорий</p>
    @endforelse
@endsection
