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
                        <h1>Новости</h1>
                        @forelse($news as $item)
                            <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a><br>
                            <div class="card-img" style="background-image: url({{ $item->image ?? asset('storage/img/default.jpeg')}})"></div>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                        {{ $news->links() }}
                       s
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
