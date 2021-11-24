@extends('layouts.app')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @forelse($categories as $item)
                            <h3>{{ $item->title }}</h3>
                            <form action="{{ route('admin.categories.destroy',  $item) }}" method="post">
                                <a class="btn btn-success" href="{{  route('admin.categories.edit', $item) }}">edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        @empty
                            <p>Нет категорий</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
