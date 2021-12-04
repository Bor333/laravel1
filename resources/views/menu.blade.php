<li class="nav-item {{ request()->routeIs('home')?'active':'' }}">
    <a class="nav-link" href="{{ route('home') }}">Главная</a>
</li>

<li class="nav-item {{ request()->routeIs('news.index')?'active':'' }}">
    <a class="nav-link"  href="{{ route('news.index') }}">Новости</a>
</li>

<li class="nav-item {{ request()->routeIs('news.category.index')?'active':'' }}">
    <a class="nav-link"  href="{{ route('news.category.index') }}">Категории</a>
</li>

<li class="nav-item {{ request()->routeIs('about')?'active':'' }}">
    <a class="nav-link"  href="{{ route('about') }}">О нас</a>
</li>

<li class="nav-item {{ request()->routeIs('updateProfile')?'active':'' }}">
    <a class="nav-link"  href="{{ route('updateProfile') }}">Profile</a>
</li>


@auth()
<li class="nav-item {{ request()->routeIs('admin.index')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.index') }}">Админка</a>
</li>
@endauth
<br>
