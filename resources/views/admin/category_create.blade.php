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
                                <label for="categoryTitle">Название категории</label>
                                <input type="text" name="title" id="categoryTitle" class="form-control" required="required"
                                       value="{{ old('title') ?? $category->title }}">

                                <label for="categorySlug">slug категории</label>
                                <input type="text" name="slug" id="categorySlug" class="form-control" required="required"
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

