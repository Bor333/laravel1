@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Новости</h2>
                <div class="card">
                    <div class="card-body">
                        @forelse($news as $item)
                            <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a><br>
                            <div class="card-img" style="background-image: url({{ $item->image ?? asset('storage/img/default.jpeg')}}); width: 300px"></div>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
