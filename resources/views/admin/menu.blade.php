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
    <a class="nav-link"  href="{{ route('admin.updateUsers') }}">Пользователи</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.resources.index')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.resources.index') }}">Ресурсы</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.parser')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.parser') }}">Парсер</a>
</li>


<br>
