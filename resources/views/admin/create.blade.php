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

                        <form method="POST" action="{{ route('admin.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="newTitle">Заголовок новости</label>
                                <input type="text" name="title" id="newsTitle" class="form-control" required="required" value="{{ old('title') }}">

                                <label for="NewsCategory">Категория новости</label>
                                <select name="category_id" id="newsCategory" class="form-control">
                                    @foreach($categories as $item)
                                        <option
                                            @if ($item['id'] == old('category')) selected @endif
                                            value="{{ $item['id'] }}">{{ $item['title'] }}
                                        </option>
                                    @endforeach
                                </select>


                                <label for="NewsText">Текст новости</label>
                                <textarea name="text" id="newsText" class="form-control" required="required">{{ old('text') }}</textarea>
                                <div class="form-check">

                                    <input
                                        @if (old('isPrivate')) checked @endif
                                        name="isPrivate" type="checkbox" value="1">
                                    <label for="newsPrivate">Приватная</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit" value="Добавить новость">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
