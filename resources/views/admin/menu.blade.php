<li class="nav-item {{ request()->routeIs('home')?'active':'' }}">
    <a class="nav-link" href="{{ route('home') }}">Главная сайта</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.index') }}">Админка главная</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.test1')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.test1') }}">test1</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.test2')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.test2') }}">test2</a>
</li>

<br>
