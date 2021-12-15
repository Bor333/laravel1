@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>CRUD категорий</h2>
                @forelse($categories as $item)
                    <div class="card">
                        <div class="card-body">

                            <p>{{ $item->title }}</p>
                            <form action="{{ route('admin.categories.destroy',  $item) }}" method="post">
                                <a class="btn btn-success" href="{{  route('admin.categories.edit', $item) }}">edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>

                        </div>
                    </div>

                @empty
                    <p>Нет категорий</p>
                @endforelse

            </div>
        </div>
    </div>
@endsection
