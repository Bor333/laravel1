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
                        <p>Добро пожаловать, {{ Auth::user()->name }}!</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
