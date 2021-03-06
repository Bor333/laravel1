@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($category)

                            <h1>Новости категории {{ $category }}</h1>

                            @forelse($news as $item)
                                <a href="{{ route('news.show', $item['id']) }}">{{ $item['title'] }}</a><br>
                            @empty
                                <p>Нет новостей</p>
                            @endforelse
                        @else
                            Нет такой категории
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
