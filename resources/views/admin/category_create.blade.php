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

                        <form method="POST"
                              action="@if (!$category->id){{ route('admin.categories.store') }} @else {{ route('admin.categories.update', $category) }}@endif"
                              enctype="multipart/form-data">
                            @csrf
                            @if ($category->id) @method('PUT') @endif
                            <div class="form-group">
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('title') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                <label for="categoryTitle">Название категории</label>
                                <input type="text" name="title" id="categoryTitle" class="form-control"
                                       value="{{ old('title') ?? $category->title }}">

                                @if ($errors->has('slug'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('slug') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                <label for="categorySlug">slug категории</label>
                                <input type="text" name="slug" id="categorySlug" class="form-control"
                                       value="{{ old('slug') ?? $category->slug }}">

                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit"
                                       value="@if ($category->id){{__('Изменить')}}@else{{__('Добавить')}}@endif категорию">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

