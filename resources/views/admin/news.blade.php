@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>CRUD Новостей</h2>
                @forelse($news as $item)
                    <div class="card">
                        <div class="card-body">
                            <p>{{ $item->title }}</p>
                            <form action="{{ route('admin.news.destroy',  $item) }}" method="post">
                                <a class="btn btn-success" href="{{  route('admin.news.edit', $item) }}">edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Нет новостей</p>
                @endforelse

            </div>
        </div>
        {{ $news->links() }}
    </div>
@endsection
