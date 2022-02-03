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
                              action="{{ route('admin.resources.store') }} "
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="rssLink">Ссылка</label>
                                <input type="text" name="link" id="rssLink" class="form-control"
                                       value="{{ old('link') }}">


                            </div>
                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit"
                                       value="Добавить ресурс">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


