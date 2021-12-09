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
                            <form method="POST" action="{{ route('admin.toggleAdmin') }}">
                                @csrf
                                <label for="toggleAdmin">Админ/не админ</label>
                                <input hidden type="text" name="toggleAdmin" value="{{ $user->id }}">
                                <input class="btn btn-outline-primary" type="submit" value="Назначить">
                            </form>
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
