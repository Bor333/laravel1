@extends('layouts.app')

@section('title', 'Юзеры')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Пользователи</h2>
                @forelse($users as $user)
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $user->name }}</h5>

                            <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-outline-secondary">Назначить/Снять
                                админа</a>

                                @if ($user->is_admin == true)
                                    Админ
                                @else
                                    Не админ
                                @endif

                        </div>
                    </div>
                @empty
                    <p>Нет пользователей</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
