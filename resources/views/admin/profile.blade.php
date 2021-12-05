@extends('layouts.app')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form class="card-body">
                        <h2>Профили</h2>
                        @forelse($profiles as $user)
                            <p> {{ $user->name }}

                                <a class="btn btn-dark" href="{{  route('admin.changeIsAdmin', $user)  }}">Назначить админом/убрать из админов</a>
                                @if ($user->is_admin == true)
                                    Админ
                                @else
                                    Не админ
                                @endif
                    </form>

                    </p>
                    @empty
                        <p>Нет зарегестрированных пользователей</p>
                        @endforelse
                        </form>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

