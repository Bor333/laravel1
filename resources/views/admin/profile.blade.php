@extends('layouts.app')

@section('menu')
    @include('admin.menu')
@endsection
@dump($profiles)
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Профили</h2>
                        @forelse($profiles as $user)
                            <p> {{ $user->name }}

                                @if ($user->is_admin == true)
                                    <button type="submit" class="btn btn-dark">Админ</button>
                                @else
                                    <a class="btn btn-success" href="{{  route('admin.changeIsAdmin', $user)  }}">Назначить админом</a>
                                @endif

                            </p>
                        @empty
                            <p>Нет зарегестрированных пользователей</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
