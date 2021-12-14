@extends('layouts.app')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>CRUD ресурсов</h3>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            @forelse($resources as $resource)
                                <p>{{ $resource->rssLink }}</p>
                                <form action="{{ route('admin.resources.destroy',  $resource) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                            @empty
                                <p>Нет ресурсов</p>
                            @endforelse
                        </div>

                        <div class="form-group">
                            <a class="btn btn-primary" href="{{ route('admin.resources.create') }}">Новый
                                ресурс</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

