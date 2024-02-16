<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h4 class="mr-5 mt-2">Laravel</h4>
    <a class="navbar-brand {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Users
                </a>
                <div class="dropdown-menu" aria-labelledby="usersDropdown">
                    <a class="dropdown-item {{ Request::is('users/index') ? 'active' : '' }}" href="{{ route('users.index') }}">Users List</a>
                    <a class="dropdown-item {{ Request::is('users/create') ? 'active' : '' }}" href="{{ route('users.create') }}">New User</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="postsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Posts
                </a>
                <div class="dropdown-menu" aria-labelledby="postsDropdown">
                    <a class="dropdown-item {{ Request::is('posts/index') ? 'active' : '' }}" href="{{ route('posts.index') }}">Posts List</a>
                    <a class="dropdown-item {{ Request::is('posts/create') ? 'active' : '' }}" href="{{ route('posts.create') }}">New Post</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
