<li class="nav-item {{ request()->routeIs('admin.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.index') }}">Админка главная</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.news.index')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.news.index') }}">Новости</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.news.create')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.news.create') }}">Добавить новость</a>
</li>


<li class="nav-item {{ request()->routeIs('admin.categories.index')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.categories.index') }}">Категории</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.categories.create')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.categories.create') }}">Добавить категорию</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.updateUsers')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.updateUsers') }}">Users</a>
</li>


<li class="nav-item {{ request()->routeIs('admin.ajax')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.ajax') }}">Ajax Test</a>
</li>


<br>
