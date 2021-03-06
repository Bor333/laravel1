@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>{{ $news->title }}</h2>
                <div class="card">
                    <div class="card-body">
                        @if ($news)
                            <div class="card-img-big" style="background-image: url({{ $news->image ?? asset('storage/img/default.jpeg') }});"></div>
                            @if (!$news->isPrivate || Auth::id())
                                <p>{!! $news->text !!}</p>
                            @else
                                Зарегестрируйтесь для просмотра
                            @endif

                        @else
                            Нет новости с таким id
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
