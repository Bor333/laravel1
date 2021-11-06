@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($categories as $category)
                    <a href="{{ route('news.category.show',  $category['slug']) }}"><h2>{{ $category['title'] }}</h2></a>
                @empty
                    <p>Нет категорий</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection


