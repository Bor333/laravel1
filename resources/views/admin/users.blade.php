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
                            {{ $user->name }}
                            <form action="{{ }}" method="post">
                                @csrf

                                <button type="submit" name="swap" id="swapIsAdmin" class="form-control" value="{$user->id}">Назначить админом/убрать из админов</button>

                                @if ($user->is_admin == true)
                                    Админ
                                @else
                                    Не админ
                                @endif
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Нет пользователей</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
