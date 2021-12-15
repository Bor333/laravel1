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
                            {{ $user->name }} -
                            @if ($user->is_admin == true)
                                админ
                            @else
                                не админ
                            @endif
                            <div class="form-group">
                                <form method="POST" action="{{ route('admin.toggleAdmin') }}">
                                    @csrf
                                    <label for="isAdmin"></label>
                                    <input hidden type="text" name="isAdmin" value="{{ $user->id }}">
                                    <input class="btn btn-secondary" type="submit" value="Снять/Назначить">
                                </form>


                            </div>

                        </div>
                    </div>
                @empty
                    <p>Нет пользователей</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
