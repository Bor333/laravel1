@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Главная</h2>
                <div class="card">
                    <div class="card-body">
                        @guest<p>Добро пожаловать, в агрегатор новостей!</p>@endguest
                        @auth<p>Добро пожаловать, {{ Auth::user()->name }}!</p>@endauth
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
