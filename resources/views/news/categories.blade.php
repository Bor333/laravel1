@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Категории</h2>
                <div class="card">
                    <div class="card-body">

                        @forelse($categories as $category)
                            <a href="{{ route('news.category.show',  $category->slug) }}">
                                <p>{{ $category->title }}</p></a>
                        @empty
                            <p>Нет категорий</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


