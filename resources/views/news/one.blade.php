@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($news)
                    <h2>{{ $news['title'] }}</h2>
                    @if (!$news['isPrivate'])
                        <p>{{ $news['text'] }}</p>
                    @else
                        Заререгестрируйтесь для просмотра
                    @endif
                @else
                    Нет новости с таким id
                @endif
            </div>
        </div>
    </div>
@endsection
