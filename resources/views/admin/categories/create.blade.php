@extends('layouts.app')

@section('menu')
    @include('admin.menu')
@endsection
@dd($categories)
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form method="POST"
                              action="@if (!$categories->id){{ route('admin.news.store') }} @else {{ route('admin.news.update', $news) }}@endif"
                              enctype="multipart/form-data">
                            @csrf
                            @if ($categories->id) @method('PUT') @endif
                            <div class="form-group">
                                <label for="CategoryTitle">Название категории</label>
                                <input type="text" name="title" id="categoryTitle" class="form-control" required="required"
                                       value="{{ old('title') ?? $categories->title }}">


                                <label for="CategorySlug">slug категории</label>
                                <textarea name="text" id="newsText" class="form-control"
                                          required="required">{{ old('text') ?? $categories->text }}</textarea>

                            </div>


                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit"
                                       value="@if ($categories->id){{__('Изменить')}}@else{{__('Добавить')}}@endif категорию">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

