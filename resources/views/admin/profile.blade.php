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
                        <h2>Профили</h2>
                        @forelse($profiles as $user)
                            <p> {{ $user->name }}
                                <br>
                                <a class="btn btn-dark" href="{{  route('admin.changeIsAdmin', $user)  }}">Назначить
                                    админом/убрать из админов</a>
                                @if ($user->is_admin == true)
                                    Админ
                                @else
                                    Не админ
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

    </div>
@endsection

