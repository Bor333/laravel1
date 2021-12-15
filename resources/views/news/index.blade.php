@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Новости</h2>

                @forelse($news as $item)
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('news.show', $item->id) }}"><div class="card-title">{{ $item->title }}</div></a>
                            <div class="card-img"
                                 style="background-image: url({{ $item->image ?? asset('storage/img/default.jpeg')}}); width: 300px"></div>
                        </div>
                    </div>
                @empty
                    <p>Нет новостей</p>
                @endforelse
                {{ $news->links() }}

            </div>
        </div>
    </div>
@endsection
