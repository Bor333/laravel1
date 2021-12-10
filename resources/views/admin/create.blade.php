@extends('layouts.app')

@section('title', 'Админка')

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
                              action="@if (!$news->id){{ route('admin.news.store') }} @else {{ route('admin.news.update', $news) }}@endif"
                              enctype="multipart/form-data">
                            @csrf
                            @if ($news->id) @method('PUT') @endif
                            <div class="form-group">
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('title') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                <label for="newTitle">Заголовок новости</label>
                                <input type="text" name="title" id="newsTitle" class="form-control"
                                       value="{{ old('title') ?? $news->title }}">

                                <label for="NewsCategory">Категория новости</label>
                                @if ($errors->has('slug'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('slug') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                @if ($errors->has('category_id'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('category_id') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                <select name="category_id" id="newsCategory" class="form-control">
                                    @foreach($categories as $item)
                                        <option
                                            @if ($item->id == old('category_id')) selected
                                            @elseif ($item->id == $news->category_id) selected
                                            @endif
                                            value="{{ $item->id }}">{{ $item->title }}

                                        </option>
                                    @endforeach


                                </select>


                                <label for="textEdit">Текст новости</label>
                                @if ($errors->has('text'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('text') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                <textarea name="text" id="textEdit"
                                          class="form-control">{!! old('text') ?? $news->text !!}</textarea>
                                <div class="form-check">

                                    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                                    <script>
                                        var options = {
                                            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                                        };
                                    </script>
                                    <script>
                                        CKEDITOR.replace('textEdit', options);
                                    </script>

                                    <input
                                        @if ($news->isPrivate == 1 ||old('isPrivate')) checked @endif
                                    name="isPrivate" type="checkbox" value="1">
                                    <label for="newsPrivate">Приватная</label>
                                </div>
                            </div>


                            <div class="form-group">
                                @if ($errors->has('image'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('image') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit"
                                       value="@if ($news->id){{__('Изменить')}}@else{{__('Добавить')}}@endif  новость">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
