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
                        <form method="POST" action="{{ route('admin.profile') }}">
                            @csrf
                            <div class="form-group">
                                @forelse($profiles as $user)
                                    {{ $user->name }}
                                    <br>
                                    <input type="submit" class="btn-dark" value="Изменить">
                                    <label for="UserIsAdmin"></label>
                                    @if ($user->is_admin == true)
                                        Админ
                                    @else
                                        Не админ
                                    @endif
                                    <input type="text" name="isAdmin" id="UserIsAdmin" class="form-control"
                                           value="{{ old('$user->is_admin') ?? $user->is_admin }}">
                                    <input type="submit" class="btn-dark" value="Изменить">
                                    <br>
                                @empty
                                    <p>Нет зарегестрированных пользователей</p>
                                @endforelse
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

